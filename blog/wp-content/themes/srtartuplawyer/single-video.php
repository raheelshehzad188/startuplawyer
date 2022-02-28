<?php 
$url = get_assets_url();
get_header(); ?>
<main>
		

		<div class="container margin_30_40">			
			<div class="row">
				<div class="col-lg-9">
					<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
				$youtubeURL = get_field('youtube_video_url'); 
$obj = get_youtube($youtubeURL);
// print_r($obj);
?>
					<div class="singlepost">
					 <div class="video">
					     <?php echo $obj[html]; ?>
					 </div> 
						<h1><?php echo $obj[title]; ?></h1>
						<div class="postmeta">
							<ul>
								<li> <i class="icon_folder-alt"></i> <?php $categories = get_the_category();
 
if ( ! empty( $categories ) ) {
    echo esc_html( $categories[0]->name ); // Show first item of category  
} ?> </li>
								<li><i class="icon_calendar"></i> <?php the_date(); ?></li>
								<li><a href="#"><i class="icon_pencil-edit"></i> <?php the_author(); ?></a></li>
								<!--<li><a href="#"><i class="icon_comment_alt"></i> (14) Comments</a></li>-->
							</ul>
						</div>
						<!-- /post meta -->
						<div class="post-content">
							<div class="dropcaps">
								<p><?php the_content(); ?></p>
							</div> 
						</div>
						<!-- /post -->
					</div>
					 
<?php
				endwhile;
			?>
				</div>
				<!-- /col -->

				<aside class="col-lg-3">
					<?php get_sidebar(); ?>
				</aside>
				<!-- /aside -->
			</div>
			<!-- /row -->	
		</div>
		<!-- /container -->
		
	</main>
	<!-- /main -->
<?php get_footer(); ?>