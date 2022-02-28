<?php /* Template Name: general Page */ 
$url = get_assets_url();
?>
<?php get_header('home'); ?>

    <main class="container">
		<div class="hero_single version_3" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-9 col-lg-10 col-md-8">
							<h1><?php echo the_title(); ?></h1>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
		</div>
		<div class="bg_gray">
	        <div class="container margin_60_40">
            		<div class="main_title center">
            		    
            		</div>
            
            		<div class="row">
            			<?php 
            			$my_postid = get_the_ID();
                        $content_post = get_post($my_postid);
                        echo $content = $content_post->post_content;
            			?>
            		</div>
        	</div>
        </div>
	</main>

<?php get_footer('home'); ?>