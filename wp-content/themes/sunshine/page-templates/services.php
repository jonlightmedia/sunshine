<?php
/**
 * Template Name: Services
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<?php 
	$banner_img = wp_get_attachment_image_src( get_field('banner_image'), 'banner');
	$banner_img = $banner_img[0];

	if(!$banner_img){
		$banner_img = of_get_option('banner', '');
	}	
	if(!$banner_img){
		$banner_img = get_template_directory_uri()."/images/placeholders/banner.jpg";
	}
?>
<div class="banner banner-sm" style="background: url('<?php echo $banner_img; ?>')no-repeat">
	<div class="banner-content banner-content-center ">		
		<h1 class="banner-title t-base2 t-upper mb-0"><?php the_title(); ?></h1>
	</div>
</div>
<div class="section-primary section-ptb40 section-tooltip-bottom">
	<div class="container-md text-center copy">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post();
				the_content(); 
			endwhile;
		else :
			get_template_part( 'content', 'none' );
		endif;?>
	</div>
</div>
<div class="section section-ptb80">
	<div class="container container-xlg">
		<div class="post post-list-alt">
			<?php $args = array(
		    	'post_type' => 'service',
		        'order' => 'DESC',
		        'post_status'  => 'publish',
		    );
		   		$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();?>

				<?php 
					$service = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb-md');
					$service_img = $service[0];
				?>
				<div class="post-item">
				    <div class="post-img">
						<a href="<?php the_permalink(); ?>" class="btn-block"><img src="<?php echo $service_img; ?>" alt="" class='img-center'></a>
					</div>
					<div class="post-body">
						<h4 class="t-md post-title t-upper"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<div class="post-content copy">
							<p><?php echo content(strip_shortcodes(wp_trim_words(get_the_content())),40); ?></p>
						</div>
					</div>
				</div>
		  	<?php endwhile; ?>
		    <?php wp_reset_postdata(); ?>	
		</div>
	</div>
</div>
<?php get_footer(); ?>