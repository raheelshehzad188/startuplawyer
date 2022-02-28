<div class="wrap">
    <h2>WP Categories Widget </h2>
	<div id="wcw-tab-menu"><a id="wcw-general" class="wcw-tab-links active" >General</a> <a  id="wcw-support" class="wcw-tab-links">Support</a> <a  id="wcw-other" class="wcw-tab-links">Other Plugins</a></div>
    <form method="post" action="options.php"> 
       <?php settings_fields('wcw-group'); ?>
        <div class="wcw-setting">
			<!-- General Setting -->	
			<div class="first wcw-tab" id="div-wcw-general">
				<table class="form-table">  
					<tr valign="top">
						<th scope="row"><label for="wcw_disable_block_editor">Disable Widget Block Editor </label></th>
						<td><input type="checkbox" value="1" name="wcw_disable_block_editor" id="wcw_disable_block_editor" <?php checked(get_option('wcw_disable_block_editor'),1); ?> /></td>
					</tr>
				</table>
			</div>
			<div class="wcw-tab" id="div-wcw-support"> <h2>Support</h2> 
			<p><a href="mailto:raghunath.0087@gmail.com" target="_blank" class="contact-author">Contact Author</a></p>
				<p><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=ZEMSYQUZRUK6A" target="_blank" style="font-size: 17px; font-weight: bold;"><img src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" title="Donate for this plugin"></a></p>
				
			</div>
			<div class="last wcw-tab" id="div-wcw-other">
				<h2>Other plugins</h2>
				<p><strong>Our Other Plugins:</strong><br>
				<ol>
                                        <li><a href="https://wordpress.org/plugins/custom-share-buttons-with-floating-sidebar" target="_blank">Custom Share Buttons With Floating Sidebar</a></li>
                                        <li><a href="https://wordpress.org/plugins/seo-manager/" target="_blank">SEO Manager</a></li>
                                        <li><a href="https://wordpress.org/plugins/protect-wp-admin/" target="_blank">Protect WP-Admin</a></li>
                                        <li><a href="https://wordpress.org/plugins/wp-sales-notifier/" target="_blank">WP Sales Notifier</a></li>
                                        <li><a href="https://wordpress.org/plugins/wp-tracking-manager/" target="_blank">WP Tracking Manager</a></li>
                                        <li><a href="https://wordpress.org/plugins/wp-categories-widget/" target="_blank">WP Categories Widget</a></li>
                                        <li><a href="https://wordpress.org/plugins/wp-protect-content/" target="_blank">WP Protect Content</a></li>
                                        <li><a href="https://wordpress.org/plugins/wp-version-remover/" target="_blank">WP Version Remover</a></li>
                                        <li><a href="https://wordpress.org/plugins/wp-posts-widget/" target="_blank">WP Post Widget</a></li>
                                        <li><a href="https://wordpress.org/plugins/wp-importer" target="_blank">WP Importer</a></li>
                                        <li><a href="https://wordpress.org/plugins/optimizer-wp-website/" target="_blank">Optimize WP Website</a></li>
                                        <li><a href="https://wordpress.org/plugins/wp-testimonial/" target="_blank">WP Testimonial</a></li>
                                        <li><a href="https://wordpress.org/plugins/wc-sales-count-manager/" target="_blank">WooCommerce Sales Count Manager</a></li>
                                        <li><a href="https://wordpress.org/plugins/wp-social-buttons/" target="_blank">WP Social Buttons</a></li>
                                        <li><a href="https://wordpress.org/plugins/wp-youtube-gallery/" target="_blank">WP Youtube Gallery</a></li>
                                        <li><a href="https://wordpress.org/plugins/rg-responsive-gallery/" target="_blank">RG Responsive Slider</a></li>
                                        <li><a href="https://wordpress.org/plugins/cf7-advance-security" target="_blank">Contact Form 7 Advance Security WP-Admin</a></li>
                                        <li><a href="https://wordpress.org/plugins/wp-easy-recipe/" target="_blank">WP Easy Recipe</a></li>
                         </ol>
				</p>
			</div>
		</div>
        <?php @submit_button(); ?>
    </form>
</div>
