<?php
/*
Plugin Name: WP Categories Widget
Plugin URI: http://wp-experts.in
Description: Very simple plugin to display categories as list under website widget sidebar and you have an option to choose any type custom taxonomy to display their categories.
Author: WP-EXPERTS.IN TEAM
Author URI: https://wp-experts.in
Plugin URI: https://www.wp-experts.in/products/wp-categories-widget-addon/
Version: 2.1
*/

/*  Copyright 2018-21  wp-categories-widget  (email : raghunath.0087@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**************************************************************
                START CLASSS WpCategoriesWidget 
**************************************************************/
class WpCategoriesWidget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'wpcategorieswidget', // Base ID
			__( 'WP Categories Widget', 'wp-experts' ), // Name
			array( 'description' => esc_html__( 'Display categories list of all taxonomy post type - by WP-Experts.In Team', 'wp-experts' ), ) // Args
		);
		if(!is_admin())
		add_action('wcw_style',array($this,'wcw_style_func'));
		add_filter( "plugin_action_links_".plugin_basename( __FILE__ ), array(&$this,'wcw_add_settings_link') );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo isset($args['before_widget']) ? $args['before_widget'] :'';
		//init categories widget
		$title = '';
		$orderby      = !empty($instance['wcw_orderby']) ? $instance['wcw_orderby'] : 'name'; 
		$order        = !empty($instance['wcw_order']) ? $instance['wcw_order'] : 'ASC'; 
		$hide_empty   = !empty($instance['wcw_show_empty']) ? false : true;
		$depth        = !empty($instance['wcw_hide_child']) ? 1 : 0;
		$show_count   = !empty( $instance['wcw_hide_count']) ? false : true;
		$pad_counts   = false;
		$hierarchical = true;
		if ( ! empty( $instance['wcw_title'] ) && !$instance['wcw_hide_title']) {
			$title = '<h2 class="widget-title">' . __( $instance['wcw_title'], 'wp-experts.in' ) . '</h2>';
		}
		// add css 		
		do_action('wcw_style','wcw_style_func');
		do_action('wcw_script','wcw_script_func');
		if(!$depth){add_action('wp_footer',array($this,'wcw_script_func_js'));}
		/** return category list */
		if($instance['wcw_taxonomy_type']){
				$taxonomy     = $instance['wcw_taxonomy_type'];
				$excludeCat   = $instance['wcw_selected_categories'] ? $instance['wcw_selected_categories'] : '';
				$wcw_action_on_cat= $instance['wcw_action_on_cat'] ? $instance['wcw_action_on_cat'] : '';
				$queryargs = array(
				  'echo' => false,
				  'taxonomy'     => $taxonomy,
				  'hide_empty'   => $hide_empty,
				  'orderby'      => $orderby,
				  'order'        => $order,
				  'show_count'   => $show_count,
				  'pad_counts'   => $pad_counts,
				  'hierarchical' => $hierarchical,
				  'depth' => $depth,
				  'hide_title_if_empty' => true,
				  'title_li'     => $title,
				);
				
				if($excludeCat && $wcw_action_on_cat!='')
                $queryargs[$wcw_action_on_cat] = $excludeCat;
				//print_r($queryargs);			
				$categories = wp_list_categories($queryargs);
				$cat_html = preg_replace( '~\((\d+)\)(?=\s*+<)~', '<span class="post-count">$1</span>', $categories );
				
				if ( $categories ) {
					printf( '<ul class="%s">%s</ul>', $args['widget_id'],$cat_html );
				 }
			
			}	
		echo isset($args['after_widget']) ? $args['after_widget'] :'';
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$wcw_title 					= ! empty( $instance['wcw_title'] ) ? $instance['wcw_title'] : esc_html__( 'WP Categories', 'wp-experts.in' );
		$wcw_hide_title 			= ! empty( $instance['wcw_hide_title'] ) ? $instance['wcw_hide_title'] : esc_html__( '', 'wp-experts.in' );
		$wcw_show_empty 		 	= ! empty( $instance['wcw_show_empty'] ) ? $instance['wcw_show_empty'] : esc_html__( '', 'wp-experts.in' );
		$wcw_hide_child 		    = ! empty( $instance['wcw_hide_child'] ) ? $instance['wcw_hide_child'] : esc_html__( '', 'wp-experts.in' );
		$wcw_taxonomy_type 			= ! empty( $instance['wcw_orderby'] ) ? $instance['wcw_orderby'] : esc_html__( 'order by', 'wp-experts.in' );
		$wcw_taxonomy_type 			= ! empty( $instance['wcw_order'] ) ? $instance['wcw_order'] : esc_html__( 'order', 'wp-experts.in' );
		$wcw_taxonomy_type 			= ! empty( $instance['wcw_taxonomy_type'] ) ? $instance['wcw_taxonomy_type'] : esc_html__( 'category', 'wp-experts.in' );
		$wcw_selected_categories 	= (! empty( $instance['wcw_selected_categories'] ) && ! empty( $instance['wcw_action_on_cat'] ) ) ? $instance['wcw_selected_categories'] : esc_html__( '', 'wp-experts.in' );
		$wcw_action_on_cat 			= ! empty( $instance['wcw_action_on_cat'] ) ? $instance['wcw_action_on_cat'] : esc_html__( '', 'wp-experts.in' );
		$wcw_hide_count 			= ! empty( $instance['wcw_hide_count'] ) ? $instance['wcw_hide_count'] : esc_html__( '', 'wp-experts.in' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'wcw_title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'wcw_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'wcw_title' ) ); ?>" type="text" value="<?php echo esc_attr( $wcw_title ); ?>">
		</p>
		<p><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'wcw_hide_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'wcw_hide_title' ) ); ?>" type="checkbox" value="1" <?php checked( $wcw_hide_title, 1 ); ?>>
		<label for="<?php echo esc_attr( $this->get_field_id( 'wcw_hide_title' ) ); ?>"><?php _e( esc_attr( 'Hide Title' ) ); ?> </label> 
		</p>
		<hr>
		<div class="taxonomysec">
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'wcw_taxonomy_type' ) ); ?>"><?php _e( esc_attr( 'Taxonomy Type:' ) ); ?></label> 
		<select class="widefat wcwtaxtype" id="<?php echo esc_attr( $this->get_field_id( 'wcw_taxonomy_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'wcw_taxonomy_type' ) ); ?>">
					<?php 
					$args = array(
					  'public'   => true,
					  '_builtin' => false
					  
					); 
					$output = 'names'; // or objects
					$operator = 'and'; // 'and' or 'or'
					$taxonomies = get_taxonomies( $args, $output, $operator ); 
					array_push($taxonomies,'category');
					if ( $taxonomies ) {
					foreach ( $taxonomies as $taxonomy ) {

						echo '<option value="'.$taxonomy.'" '.selected($taxonomy,$wcw_taxonomy_type).'>'.$taxonomy.'</option>';
					}
					}

				?>    
		</select>
		</p>
		<div class="wcwmultiselect" style=" background: rgb(0 124 186 / 10%); padding: 10px; color: #fff; ">
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'wcw_action_on_cat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'wcw_action_on_cat' ) ); ?>">
           <option value="include" <?php selected($wcw_action_on_cat,'include' )?> >Show Only Selected Categories</option>       
           <option value="exclude" <?php selected($wcw_action_on_cat,'exclude' )?> >Hide Only Selected Categories</option>
           <option value="" <?php selected($wcw_action_on_cat,'' )?> >Show All Selected Categories</option>
		</select>
			<div class="wcwcheckboxes" id="wcwcb-<?php echo esc_attr( $this->get_field_id( 'wcw_action_on_cat' ) ); ?>">
			<?php 			
			$i=0;
					if($wcw_taxonomy_type){
					$terms = get_terms( array(
											'taxonomy' => $wcw_taxonomy_type,
											'hide_empty' => false,
										) );
					if ( $terms ) {
					foreach ( $terms as $term ) {
						echo '<label for="'.esc_attr( $this->get_field_id( 'wcw_action_on_cat' ) ).'-'.$i.'"><input type="checkbox" id="'.esc_attr( $this->get_field_id( 'wcw_action_on_cat' ) ).'-'.$i.'"  '.checked(true, ($wcw_selected_categories!='' ? in_array($term->term_id,$wcw_selected_categories) : ($wcw_selected_categories=='' ? true : '')), false).' name="'.esc_attr( $this->get_field_name( 'wcw_selected_categories' ) ).'[]" value="'.$term->term_id.'"/>'.$term->name.'</label>';
						$i++;
					}
				    	
					}
				}

				?>   
			  
			 
			</div>
		  </div>
		</div>
		<p>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'wcw_hide_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'wcw_hide_count' ) ); ?>" type="checkbox" value="1" <?php checked( $wcw_hide_count, 1 ); ?>>
		<label for="<?php echo esc_attr( $this->get_field_id( 'wcw_hide_count' ) ); ?>"><?php _e( esc_attr( 'Hide count' ) ); ?> </label> 
		</p>
		<p>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'wcw_hide_child' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'wcw_hide_child' ) ); ?>" type="checkbox" value="1" <?php checked( $wcw_hide_child, 1 ); ?>>
		<label for="<?php echo esc_attr( $this->get_field_id( 'wcw_hide_child' ) ); ?>"><?php _e( esc_attr( 'Hide Child Categories' ) ); ?> </label> 
		</p>
		<p><input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'wcw_show_empty' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'wcw_show_empty' ) ); ?>" type="checkbox" value="1" <?php checked( $wcw_show_empty, 1 ); ?>>
		<label for="<?php echo esc_attr( $this->get_field_id( 'wcw_show_empty' ) ); ?>"><?php _e( esc_attr( 'Show empty categories' ) ); ?> </label> 
		</p>
		<hr>
		<h3>Need Support?</h3>
		<p><a href="https://www.wp-experts.in/contact-us/">Contact us</a> | <a href="https://wordpress.org/support/plugin/wp-categories-widget/reviews/?filter=5" target="_blank">I love it :) leave feedback here </a></p>
		<hr>
		<h4>Want to improve the speed of your site ?</h4>
		<p>Our experts will help you to improve the speed of your website. <a href="http://www.wp-experts.in/contact-us/">GET STARTED</a></strong></p>
		<style>.wcwmultiselect { width: 100%; } .wcwselectBox { position: relative; } .wcwmultiselect select { font-weight: bold; } .wcwoverSelect { position: absolute; left: 0; right: 0; top: 0; bottom: 0; } .wcwcheckboxes { border: 1px #7e8993 solid; display: block; border-top: none; padding: 5px; } .wcwcheckboxes label { display: block; } .wcwcheckboxes label:hover { background-color: #1e90ff; } .wcwcheckboxes label { padding-bottom: 5px; }</style>

<script type="text/javascript">
jQuery(document).ready( function() {

jQuery("#<?php echo esc_attr( $this->get_field_id( 'wcw_taxonomy_type' ) ); ?>").change( function() {
	var val = jQuery(this).val();
	var cbid = "<?php echo esc_attr( $this->get_field_id( 'wcw_action_on_cat' ) );?>";
	var cbname = "<?php echo esc_attr( $this->get_field_name( 'wcw_selected_categories' ) )?>[]";
	var ajxurl = "<?php echo home_url('/wp-admin/admin-ajax.php');?>";
	jQuery("#wcwcb-<?php echo esc_attr( $this->get_field_id( 'wcw_action_on_cat' ) ); ?>").html("<i>updating...</i>");
	jQuery.ajax({
		type: "GET",
		dataType: "html",
		url: ajxurl,
		data: {
			"action": 'wcw_terms',
			"wcwtaxo": val,
			"cbname": cbname,
			"cbid": cbid
		},
		success: function (data) {
			jQuery("#wcwcb-<?php echo esc_attr( $this->get_field_id( 'wcw_action_on_cat' ) ); ?>").html(data);
		}
	});
});

		});
		</script>		
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		//print_r($new_instance);exit;
		$instance = array();
		$instance['wcw_title'] 					= ( ! empty( $new_instance['wcw_title'] ) ) ? strip_tags( $new_instance['wcw_title'] ) : '';
		$instance['wcw_hide_title'] 			= ( ! empty( $new_instance['wcw_hide_title'] ) ) ? strip_tags( $new_instance['wcw_hide_title'] ) : '';
		$instance['wcw_show_empty'] 			= ( ! empty( $new_instance['wcw_show_empty'] ) ) ? strip_tags( $new_instance['wcw_show_empty'] ) : '';
		$instance['wcw_hide_child'] 		    = ( ! empty( $new_instance['wcw_hide_child'] ) ) ? strip_tags( $new_instance['wcw_hide_child'] ) : '';
		$instance['wcw_taxonomy_type'] 			= ( ! empty( $new_instance['wcw_taxonomy_type'] ) ) ? strip_tags( $new_instance['wcw_taxonomy_type'] ) : '';
		$instance['wcw_selected_categories'] 	= ( ! empty( $new_instance['wcw_selected_categories'] ) ) ? $new_instance['wcw_selected_categories'] : '';
		$instance['wcw_action_on_cat'] 			= ( ! empty( $new_instance['wcw_action_on_cat'] ) ) ? $new_instance['wcw_action_on_cat'] : '';
		$instance['wcw_hide_count'] 			= ( ! empty( $new_instance['wcw_hide_count'] ) ) ? strip_tags( $new_instance['wcw_hide_count'] ) : '';
		return $instance;
	}
	/** plugin CSS **/
	public function wcw_style_func_css()
	{
		$style='<style type="text/css">/* start wp categories widget CSS */.widget_wp_categories_widget{background:#fff; position:relative;}.widget_wp_categories_widget h2,.widget_wpcategorieswidget h2{color:#4a5f6d;font-size:20px;font-weight:400;margin:0 0 25px;line-height:24px;text-transform:uppercase}.widget_wp_categories_widget ul li,.widget_wpcategorieswidget ul li{font-size: 16px; margin: 0px; border-bottom: 1px dashed #f0f0f0; position: relative; list-style-type: none; line-height: 35px;}.widget_wp_categories_widget ul li:last-child,.widget_wpcategorieswidget ul li:last-child{border:none;}.widget_wp_categories_widget ul li a,.widget_wpcategorieswidget ul li a{display:inline-block;color:#007acc;transition:all .5s ease;-webkit-transition:all .5s ease;-ms-transition:all .5s ease;-moz-transition:all .5s ease;text-decoration:none;}.widget_wp_categories_widget ul li a:hover,.widget_wp_categories_widget ul li.active-cat a,.widget_wp_categories_widget ul li.active-cat span.post-count,.widget_wpcategorieswidget ul li a:hover,.widget_wpcategorieswidget ul li.active-cat a,.widget_wpcategorieswidget ul li.active-cat span.post-count{color:#ee546c}.widget_wp_categories_widget ul li span.post-count,.widget_wpcategorieswidget ul li span.post-count{height: 30px; min-width: 35px; text-align: center; background: #fff; color: #605f5f; border-radius: 5px; box-shadow: inset 2px 1px 3px rgba(0, 122, 204,.1); top: 0px; float: right; margin-top: 2px;}li.cat-item.cat-have-child > span.post-count{float:inherit;}li.cat-item.cat-item-7.cat-have-child { background: #f8f9fa; }li.cat-item.cat-have-child > span.post-count:before { content: "("; }li.cat-item.cat-have-child > span.post-count:after { content: ")"; }.cat-have-child.open-m-menu ul.children li { border-top: 1px solid #d8d8d8;border-bottom:none;}li.cat-item.cat-have-child:after{ position: absolute; right: 8px; top: 8px; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAABmJLR0QA/wD/AP+gvaeTAAAAoklEQVQ4je3PzQpBURSG4WfknztxGS6BKOIaDQwkSXJTnI7J2rXbhSND3lqTtb/19m3+NGWANVof3LTiZpAWXVxQY4t2A0k7snXcdmGMKpY1dui8kHQik/JVOMAC9+zxlFfO6GFfSDZlaI5bFjpjWEgOhWT9rHYpu2CEPo7Z/v5KklgW37zG5JLlO0liVjTLJaumkmeyj5qUTEP2lSQxiflVHtR5PTMAQTkfAAAAAElFTkSuQmCC); content: ""; width: 18px; height: 18px;transform: rotate(270deg);}ul.children li.cat-item.cat-have-child:after{content:"";background-image: none;}.cat-have-child ul.children {display: none; z-index: 9; width: auto; position: relative; margin: 0px; padding: 0px; margin-top: 0px; padding-top: 10px; padding-bottom: 10px; list-style: none; text-align: left; background:  #f8f9fa; padding-left: 5px;}.widget_wp_categories_widget ul li ul.children li,.widget_wpcategorieswidget ul li ul.children li { border-bottom: 1px solid #fff; padding-right: 5px; }.cat-have-child.open-m-menu ul.children{display:block;}li.cat-item.cat-have-child.open-m-menu:after{transform: rotate(0deg);}.widget_wp_categories_widget > li.product_cat,.widget_wpcategorieswidget > li.product_cat {list-style: none;}.widget_wp_categories_widget > ul,.widget_wpcategorieswidget > ul {padding: 0px;}.widget_wp_categories_widget > ul li ul ,.widget_wpcategorieswidget > ul li ul {padding-left: 15px;}/* End category widget CSS*/</style>';
	    echo $style;
	}
	/** plugin CSS **/
	public function wcw_script_func_js()
	{
		echo "<script>jQuery(document).ready(function($){jQuery('li.cat-item:has(ul.children)').addClass('cat-have-child'); jQuery('.cat-have-child').removeClass('open-m-menu');jQuery('li.cat-have-child > a').click(function(){window.location.href=jQuery(this).attr('href');return false;});jQuery('li.cat-have-child').click(function(){

		var li_parentdiv = jQuery(this).parent().parent().parent().attr('class');
		//alert(li_parentdiv);
			if(jQuery(this).hasClass('open-m-menu')){jQuery('.cat-have-child').removeClass('open-m-menu');}else{jQuery('.cat-have-child').removeClass('open-m-menu');jQuery(this).addClass('open-m-menu');}});});</script>";
	}
	//add css
	public function wcw_style_func()
	{
		add_action('wp_footer',array($this,'wcw_style_func_css'));
	}
	/** updtate plugins links using hooks**/
	// Add settings link to plugin list page in admin
	public function wcw_add_settings_link( $links ) {
		$settings_link = '<a href="widgets.php">' . __( 'Settings Widget', 'wp-experts' ) . '</a> | <a href="mailto:raghunath.0087@gmail.com">' . __( 'Contact to Author', 'wp-experts' ) . '</a>';
		array_unshift( $links, $settings_link );
		return $links;
	}
}// class WpCategoriesWidget

// register WpCategoriesWidget widget
function register_wp_categories_widget() {
    register_widget( 'WpCategoriesWidget' );
}
add_action( 'widgets_init', 'register_wp_categories_widget'); 
/**************************************************************
                END CLASSS WpCategoriesWidget 
**************************************************************/
if ( is_admin() ) {
    add_action( 'wp_ajax_wcw_terms', 'wcw_terms_list' );
    // Add other back-end action hooks here
} 
function wcw_terms_list()
{
	$taxonomy = isset($_REQUEST['wcwtaxo']) ? $_REQUEST['wcwtaxo'] : '';
	if($taxonomy=='') return;
	
	 ob_clean();
	 $html = '';$i=0;
	 $terms = get_terms(array(
						  'taxonomy' => $taxonomy,
						  'hide_empty' => false,
						 ) 
						);	
					if ( $terms ) {
					foreach ( $terms as $term ) {
						$html .='<label for="'.$_REQUEST['cbid'].'-'.$i.'"><input type="checkbox" id="'.$_REQUEST['cbid'].'-'.$i.'"  name="'.$_REQUEST['cbname'].'" value="'.$term->term_id.'"/>'.$term->name.'</label>';
						$i++;
					}
				    	
					}
				echo $html;
	wp_die();
}
//require dirname(__FILE__).'/old/wcw-old.php';
/*
* WPCategoryOption Page
* @hooks
* @backend
*/

if(!class_exists('WpcEditor'))
{
    class WpcEditor
    {
        /**
         * Construct the plugin object
         */
        public function __construct() {
            // register actions
			add_action('admin_init', array(&$this, 'wcw_admin_init'));
			add_action('admin_menu', array(&$this, 'wcw_add_menu'));
			
			add_filter("plugin_action_links_".plugin_basename(__FILE__), array(&$this, 'wcw_settings_link'));
			
			$wcw_disable_block_editor = get_option('wcw_disable_block_editor');
		    
		    if( $wcw_disable_block_editor ) {
		        
		        add_action( 'after_setup_theme', array(&$this,'disable_widget_block_editor') );
		        
		    }
			
			
        } // END public function __construct
		
		/**
		 * hook into WP's admin_init action hook
		 */
		public function wcw_admin_init() {
		    
		    
			// Set up the settings for this plugin
			$this->wcw_init_settings();
			// Possibly do additional admin_init tasks
		} // END public static function activate
		
	    public function disable_widget_block_editor() {
             remove_theme_support( 'widgets-block-editor' );
             // Disables the block editor from managing widgets in the Gutenberg plugin.
	            add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
            // Disables the block editor from managing widgets.
                add_filter( 'use_widgets_block_editor', '__return_false' );
            }
		/**
		 * Initialize some custom settings
		 */     
		public function wcw_init_settings() {
			// register the settings for this plugin
			register_setting('wcw-group', 'wcw_disable_block_editor');
		} // END public function init_custom_settings()
		/**
		 * add a menu
		 */     
		public function wcw_add_menu() {
			add_options_page('WP Category Settings', 'WP Category Widget', 'manage_options', 'wcw-page', array(&$this, 'wcw_settings_page'));
		} // END public function add_menu()
		/**
		 * Menu Callback
		 */     
		public function wcw_settings_page()	{
		    
			if(!current_user_can('manage_options'))
			{
				wp_die(__('You do not have sufficient permissions to access this page.'));
			}

			// Render the settings template
			include(sprintf("%s/lib/settings.php", dirname(__FILE__)));
			// Style Files
			wp_register_style( 'wcw_admin_style', plugins_url( '/assets/wcw-admin.css',__FILE__ ) );
			wp_enqueue_style( 'wcw_admin_style' );
			// JS files
			wp_register_script('wcw_admin_script', plugins_url('/assets/wcw-admin.js',__FILE__ ), array('jquery'));
            wp_enqueue_script('wcw_admin_script');
		} // END public function plugin_settings_page()
		// Add the settings link to the plugins page
		function wcw_settings_link($links) { 
			$settings_link = '<a href="options-general.php?page=wcw-page">Settings</a>'; 
			array_unshift($links, $settings_link); 
			return $links; 
		}
    } // END class WpcEditor
} // END if(!class_exists('WpcEditor'))

if( class_exists('WpcEditor') )
{
    if( is_admin() ) {
    // instantiate the plugin class
    $wcw_plugin_template = new WpcEditor();

    }
}


