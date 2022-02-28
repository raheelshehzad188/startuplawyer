<?php /* Template Name: Videos page */ 


$url = get_assets_url(); 
$pid = get_the_ID();
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($pid) );
?>

<div id="helpzx"><?php get_header('home'); ?></div>


	<link href="<?= $url ?>css/help.css" rel="stylesheet">
	<main>
		<div class="hero_single inner_pages background-image" data-background="url(<?= $feat_image; ?>
)">
			<div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-8 col-lg-10 col-md-8">
							<h1><?php the_title(); ?></h1>
							<p><?php the_content(); ?></p>
							<form>
							<div class="search_bar">
								<input type="text" class="form-control" placeholder="What are you looking for?">
								<input type="submit" value="Search">
							</div>
						</form>
						</div>
					</div>
					<!-- /row -->
				</div>
			</div>
		</div>
		<!-- /hero_single -->

		<div class="bg_gray">
			<div class="container margin_60_40">
				<div class="main_title center">
				    <span><em></em></span>
				    <h2>Select a topic</h2>
				    <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
				</div>

				<div class="row">
					<?php 
					
					$terms = get_terms( 'video_cat' );
// 					print_r($terms);
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ 
    foreach ( $terms as $term ) { 
					$taxonomy_img = get_taxonomy_image( $term->term_id);
					?>
	
		<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="https://startuplawyer.lk/main/blog/video_cat/<?php echo $term->slug; ?>/">
							<img src="<?= $taxonomy_img;?>" style="
    width: 100px;
    height: 100px;
    border-radius: 100%;
    margin-bottom: 15px;
"> 
							<h3><?php echo $term->name; ?></h3>
							<p><?php echo $term->description; ?></p>
						</a>
					</div>
         
   <?php }
    
}
					 
					
					?>
					
					<!--
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="icon_lifesaver"></i>
							<h3>General help</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris.</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="icon_globe-2"></i>
							<h3>International</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris.</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="icon_document_alt"></i>
							<h3>Cancellation</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris.</p>
						</a>
					</div>
					<div class="col-lg-4 col-md-6">
						<a class="box_topic" href="#0">
							<i class="icon_comment_alt"></i>
							<h3>Reviews</h3>
							<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris.</p>
						</a>
					</div>---->
				</div>
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_gray -->
		<div class="container margin_60_40">
				<div class="main_title version_2">
					<span><em></em></span>
					<h2>Popular articles</h2>
					<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
				</div>
				<div class="list_articles add_bottom_25 clearfix">
					<ul>
					    <?php 
					     $args = array(  
                            'post_type' => 'video',
                            'post_status' => 'publish',
                            'posts_per_page' => 8, 
                            'orderby' => 'title', 
                            'order' => 'ASC', 
                        );
                    
                        $loop = new WP_Query( $args ); 
                            
                        while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            
                            <li><a href="<?php the_permalink(); ?>"><i class="icon_documents_alt"></i><?php the_title(); ?></a></li>
                            
                    <?php    endwhile; 
                        wp_reset_postdata(); 
					    ?>
						
						
						
						
						
						<!--
						<li><a href="#0"><i class="icon_documents_alt"></i>Ad sit virtute rationibus efficiantur</a></li>
						<li><a href="#0"><i class="icon_documents_alt"></i>Partem vocibus omittam pri ne</a></li>
						<li><a href="#0"><i class="icon_documents_alt"></i>Case debet appareat duo cu</a></li>
						<li><a href="#0"><i class="icon_documents_alt"></i>Impedit torquatos quo in</a></li>
						<li><a href="#0"><i class="icon_documents_alt"></i>Nec omnis alienum no</a></li>
						<li><a href="#0"><i class="icon_documents_alt"></i>Quo eu soleat facilisi menandri</a></li>
						<li><a href="#0"><i class="icon_documents_alt"></i>Et dicit vidisse epicurei pri</a></li>-->
					</ul>
				</div>
				<!-- /list_articles -->
			</div>
			<!-- /container -->
	</main>
	<!-- /main -->


<?php get_footer('home'); ?> 