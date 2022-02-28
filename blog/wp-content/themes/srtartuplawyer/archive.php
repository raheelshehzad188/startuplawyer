
<?php get_header('home'); 
?>
<main>

		<div class="container margin_30_40">			

			<div class="row">

				<div class="col-lg-9">

					<div class="row">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
$youtubeURL = get_field('youtube_video_url'); 
$obj = get_youtube($youtubeURL);
// print_r($obj);
?>
        <div class="col-md-6">

			<article class="blog">

				<figure>

					<a href="<?php echo get_permalink(); ?>">
					    
					    <img src="<?php echo $obj[thumbnail_url]; ?>" alt="">

						<div class="preview"><span>Read more</span></div>

					</a>

				</figure>

				<div class="post_info">

					<small><?php echo get_the_date(); ?></small>

					<h2><a href="<?php echo get_permalink(); ?>"><?php echo $obj[title]; ?></a></h2>

					<p><?php get_the_excerpt(); ?></p>

				</div>

			</article>

			<!-- /article -->

		</div>
<?php endwhile; endif; ?>
</div>

					<!-- /row -->



					<div class="pagination_fg">
                        <?= paginate_links(); ?>
					</div>



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




<?php get_footer('home'); ?>