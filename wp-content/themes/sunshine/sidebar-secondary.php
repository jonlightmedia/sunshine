<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<div class="aside widget widget-aside well-widget pt-0">

	<?php if (is_single()): ?>	
		<a href="" class="btn btn-md btn-block btn-primary-o mb-20"><span class="icon icon-r icon-envelope2"></span>RECEIVE UPDATES</a>
	<?php endif ?>

	<div class="well-title t-title t-upper well-white">Recent Episodes</div>
	<div class="well-core well-white">
		<div class="well-body">
			<ul class="post-list-sm list-reset">
				<?php
				    $args = array(
				    	'post_type' => 'tv',
				        'order' => 'DESC',
				        'post_status'  => 'publish',
				        'posts_per_page' => 10,
				    );
				   		$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();?>

						<?php 
							$single_post = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
							$single_post_img = $single_post[0];
						?>
						<li class="post-item">
							<p class="post-title"><a href="<?php the_permalink(); ?>"><?php echo content(get_the_title(), 8);  ?></a></p>
							<div class="post-meta-list">
								<?php $category = get_the_category();
									if ($category) {
										echo '<div class="meta"><span class="icon icon-r-sm icon-circle icon-tag"></span><a href="'.get_category_link($category[0]->cat_ID).'" class="link t-upper">' . $category[0]->cat_name . '</a></div>';
									}
								?>	
								<div class="meta"><span class="icon icon-r-sm icon-circle icon-calendar-o"></span><?php echo get_the_date('jS F, Y'); ?></div>
							</div>
						</li>
				  	<?php endwhile; ?>
				  <?php wp_reset_postdata(); ?>	
			</ul>
		</div>
		<?php if (is_single()): ?>
			<div class="well-action">
				<a href="<?php bloginfo('url'); ?>/tv-episodes" class="btn btn-primary-o btn-block btn-sm">More Episodes</a>
			</div>
		<?php endif ?>
	</div>	
</div>
<div class="aside widget widget-aside well-widget bt-0 pt-0">
	
	<?php
	    $args = array(
	    	'post_type' => 'ad',
	        'order' => 'DESC',
	        'post_status'  => 'publish',
	    );
	   		$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();?>

			<?php 
				$client = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb-md');
				$client_img = $client[0];
			?>
			<a href="<?php the_field('ad_link'); ?>" class="mb-20 btn-block"><?php the_post_thumbnail('medium') ?></a>
	  	<?php endwhile; ?>
	  <?php wp_reset_postdata(); ?>	
</div>