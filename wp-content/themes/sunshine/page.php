<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) : ?>
   <?php while ( have_posts() ) : the_post();?>
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
	
</div>

<div class="section section-ptb60">
	<div class="container container-sxlg">
		<h2 class="t-md t-upper mb-30"><?php the_title(); ?></h2>
		<?php the_content(); ?>
	</div>
</div>
<div class="section section-ptb50 section-primary">
	<div class="container container-lg text-center copy t-xsm2">
		<p><?php the_field('red_label_content'); ?></p>
	</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>

