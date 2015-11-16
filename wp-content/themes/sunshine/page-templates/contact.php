<?php
/**
 * Template Name: Contact
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
</div>

<div class="section section-ptb60 section-gray">
	<div class="container container-sxlg">
		<h2 class="t-md t-upper mb-30">Contact Us</h2>
		<div class="row">
			<div class="col-md-6">
				<?php echo do_shortcode('[contact-form-7 id="168" title="Contact form"]'); ?>
			</div>
			<div class="col-md-6">
				<div class="well well-white well-bordered well-compact">
					<h4 class="title-rosy mb-20"><?php the_field('list_title');?></h4>
					<ol class="list-ordered t-sm">
						
						<?php
							if( have_rows('list_content') ):
							    while ( have_rows('list_content') ) : the_row();?>
									<li><span><?php the_sub_field('item');?></span></li>
								<?php endwhile;
								 wp_reset_postdata();
							else :
							endif;
						?>
					</ol>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section section-ptb50 section-primary">
	<div class="container container-lg text-center copy t-xsm2">
		<p><?php the_field('red_label_content'); ?></p>
	</div>
</div>
<?php get_footer(); ?>

<script>

function initialize() {
  var mapOptions = {
    zoom: 13,
    center: new google.maps.LatLng(59.32522, 18.07002)
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),
    mapOptions);

  var marker = new google.maps.Marker({
    map:map,
    position: new google.maps.LatLng(59.327383, 18.06747),
    icon : 'https://cdn1.iconfinder.com/data/icons/Webtoys/64/Pin.png'
  });
 
}

</script>
