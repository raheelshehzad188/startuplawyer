<?php
$url = get_assets_url();
// die($url);
?>

<?php get_header('home'); ?>


		<div class="container margin_30_40">			

			<div class="row">

				<div class="col-lg-9">

					<div class="row">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="col-md-6">

			<article class="blog">

				<figure>

					<a href="<?php echo get_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">

						<div class="preview"><span>Read more</span></div>

					</a>

				</figure>

				<div class="post_info">

					<small><?php echo get_the_date(); ?></small>

					<h2><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></h2>

					<p><?php get_the_excerpt()?></p>

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