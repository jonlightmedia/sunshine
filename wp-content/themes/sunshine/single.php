<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div class="section section-ptb50 section-gray post-single">
	<div class="container">
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post();?>
		<div class="row">
			<div class="col-md-9">
				<div class="post-single-action">
					<?php if(is_singular('post')) {?>
						<a href="<?php bloginfo('url'); ?>/blog" class="t-label t-upper"><span class="icon icon-long-arrow-left icon-r"></span>Back to Blog</a>
					<?php }elseif(is_singular('service')){ ?>
						<a href="<?php bloginfo('url'); ?>/services" class="t-label t-upper"><span class="icon icon-long-arrow-left icon-r"></span>Back to Home</a>
					<?php }else{ ?>
						<a href="<?php bloginfo('url'); ?>" class="t-label t-upper"><span class="icon icon-long-arrow-left icon-r"></span>Back to Home</a>
					<?php } ?>
					<div class="post-share">
						<span>Share</span>
						<a href="https://twitter.com/home?status=<?php the_title(); ?>" target="_blank" class="twitter">Twitter</a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="fb">Facebook</a>
						<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" class="gplus">Google +</a>
					</div>
				</div>
				<div class="well well-white well-bordered">
					<div class="post-img">
						<?php the_post_thumbnail('large'); ?>
					</div>
					<div class="post-content">
						<div class="post-title">
							<h1 class="t-title t-sm2 mb-10 t-upper"><?php the_title(); ?></h1>
							<div class="post-meta-list">
								<?php $category = get_the_category();
								if ($category) {
									echo '<div class="meta"><span class="icon icon-r-sm icon-circle icon-tag"></span><a href="'.get_category_link($category[0]->cat_ID).'" class="link t-upper">' . $category[0]->cat_name . '</a></div>';
								}
								?>				
								<div class="meta"><span class="icon icon-r-sm icon-circle icon-calendar-o"></span><?php the_date('jS F, Y'); ?></div>
							</div>
						</div>
						
							<?php the_content(); ?>
						
						<div class="content-action">
							<p class="t-title">Share on</p>
							<div class="post-share">
								<a href="https://twitter.com/home?status=<?php the_title(); ?>" target="_blank" class="twitter">Twitter</a>
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="fb">Facebook</a>
								<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" class="gplus">Google +</a>
							</div>
						</div>	
					</div>
				</div>
				<?php 
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				 ?>
			</div>
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
		<?php endwhile;
		wp_reset_postdata(); 
		else :
		endif;?>
	</div>
</div>

<?php get_footer(); ?>