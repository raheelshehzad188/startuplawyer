<?php
/* old verion < 1.8
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**************************************************************
                START CLASSS WpCategoriesWidget 
**************************************************************/
class WpCategoriesWidgetOld extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'wp_categories_widget', // Base ID
			__( 'Old- WP Categories Widget', 'wp-experts' ), // Name
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
		echo $args['before_widget'];
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
		if(!$depth){remove_action('wp_footer',array($this,'wcw_script_func_js'));}
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
		echo $args['after_widget'];
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
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'wcw_taxonomy_type' ) ); ?>"><?php _e( esc_attr( 'Taxonomy Type:' ) ); ?></label> 
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'wcw_taxonomy_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'wcw_taxonomy_type' ) ); ?>">
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
		<p>
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'wcw_action_on_cat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'wcw_action_on_cat' ) ); ?>">
           <option value="" <?php selected($wcw_action_on_cat,'' )?> >Show All Category:</option>       
           <option value="include" <?php selected($wcw_action_on_cat,'include' )?> >Include Selected Category:</option>       
           <option value="exclude" <?php selected($wcw_action_on_cat,'exclude' )?> >Exclude Selected Category:</option>
		</select> 
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'wcw_selected_categories' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'wcw_selected_categories' ) ); ?>[]" multiple>
					<?php 			
					if($wcw_taxonomy_type){
					$args = array( 'hide_empty=0' );
					$terms = get_terms( $wcw_taxonomy_type, $args );
			        echo '<option value="" '.selected(true, ($wcw_selected_categories!='' ? in_array('',$wcw_selected_categories) : ''), false).'>None</option>';
					if ( $terms ) {
					foreach ( $terms as $term ) {
						echo '<option value="'.$term->term_id.'" '.selected(true, ($wcw_selected_categories!='' ? in_array($term->term_id,$wcw_selected_categories) : ''), false).'>'.$term->name.'</option>';
					}
				    	
					}
				}

				?>    
		</select>
		</p>
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
		<p><a href="http://www.wp-experts.in/contact-us/">Contact us</a> | <a href="https://wordpress.org/support/plugin/wp-categories-widget/reviews/?filter=5" target="_blank">I love it :) leave feedback here </a></p>
		<hr>
		<h4>Do you have any website related works?</h4>
		<p><a href="http://www.wp-experts.in/contact-us/">Share with our Experts Team</a></strong></p>
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
		$style='<style type="text/css">/* start wp categories widget CSS */.widget_wp_categories_widget{background:#fff; position:relative;}.widget_wp_categories_widget h2{color:#4a5f6d;font-size:20px;font-weight:400;margin:0 0 25px;line-height:24px;text-transform:uppercase}.widget_wp_categories_widget ul li{font-size: 16px; margin: 0px; border-bottom: 1px dashed #f0f0f0; position: relative; list-style-type: none; line-height: 35px;}.widget_wp_categories_widget ul li:last-child{border:none;}.widget_wp_categories_widget ul li a{display:inline-block;color:#007acc;transition:all .5s ease;-webkit-transition:all .5s ease;-ms-transition:all .5s ease;-moz-transition:all .5s ease}.widget_wp_categories_widget ul li a:hover,.widget_wp_categories_widget ul li.active-cat a,.widget_wp_categories_widget ul li.active-cat span.post-count{color:#ee546c}.widget_wp_categories_widget ul li span.post-count{height: 30px; min-width: 35px; text-align: center; background: #fff; color: #605f5f; border-radius: 5px; box-shadow: inset 2px 1px 3px rgba(0, 122, 204,.1); top: 0px; float: right; margin-top: 2px;}li.cat-item.cat-have-child > span.post-count{float:inherit;}li.cat-item.cat-item-7.cat-have-child { background: #f8f9fa; }li.cat-item.cat-have-child > span.post-count:before { content: "("; }li.cat-item.cat-have-child > span.post-count:after { content: ")"; }.cat-have-child.open-m-menu ul.children li { border-top: 1px solid #d8d8d8;border-bottom:none;}li.cat-item.cat-have-child:after{ position: absolute; right: 8px; top: 8px; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAABmJLR0QA/wD/AP+gvaeTAAAAoklEQVQ4je3PzQpBURSG4WfknztxGS6BKOIaDQwkSXJTnI7J2rXbhSND3lqTtb/19m3+NGWANVof3LTiZpAWXVxQY4t2A0k7snXcdmGMKpY1dui8kHQik/JVOMAC9+zxlFfO6GFfSDZlaI5bFjpjWEgOhWT9rHYpu2CEPo7Z/v5KklgW37zG5JLlO0liVjTLJaumkmeyj5qUTEP2lSQxiflVHtR5PTMAQTkfAAAAAElFTkSuQmCC); content: ""; width: 18px; height: 18px;transform: rotate(270deg);}ul.children li.cat-item.cat-have-child:after{content:"";background-image: none;}.cat-have-child ul.children {display: none; z-index: 9; width: auto; position: relative; margin: 0px; padding: 0px; margin-top: 0px; padding-top: 10px; padding-bottom: 10px; list-style: none; text-align: left; background:  #f8f9fa; padding-left: 5px;}.widget_wp_categories_widget ul li ul.children li { border-bottom: 1px solid #fff; padding-right: 5px; }.cat-have-child.open-m-menu ul.children{display:block;}li.cat-item.cat-have-child.open-m-menu:after{transform: rotate(0deg);}.widget_wp_categories_widget > li.product_cat {list-style: none;}.widget_wp_categories_widget > ul {padding: 0px;}.widget_wp_categories_widget > ul li ul {padding-left: 15px;}/* End category widget CSS*/</style>';
	    echo $style;
	}
	/** plugin CSS **/
	public function wcw_script_func_js()
	{
		echo "<script>jQuery(document).ready(function($){jQuery('li.cat-item:has(ul.children)').addClass('cat-have-child'); jQuery('.cat-have-child').removeClass('open-m-menu');jQuery('li.cat-have-child > a').click(function(){window.location.href=jQuery(this).attr('href');return false;});jQuery('li.cat-have-child').click(function(){   if(jQuery(this).hasClass('open-m-menu')){jQuery('.cat-have-child').removeClass('open-m-menu');}else{jQuery('.cat-have-child').removeClass('open-m-menu');jQuery(this).addClass('open-m-menu');}});});</script>";
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
}// class WpCategoriesWidgetOld

// register WpCategoriesWidgetOld widget
function old_register_wp_categories_widget() {
    register_widget( 'WpCategoriesWidgetOld' );
}
add_action( 'widgets_init', 'old_register_wp_categories_widget'); 
/**************************************************************
                END CLASSS WpCategoriesWidget 
**************************************************************/
