<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
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
<div class="banner" style="background: url('<?php echo $banner_img; ?>')no-repeat">
	<div class="container">
		<div class="banner-content banner-content-r">		
			<h1 class="banner-title t-huge t-base2 t-upper"><?php the_title(); ?></h1>
			<p class="t-normal"><?php the_subtitle(); ?></p>
			<div class="banner-action banner-">
				<a href="#" class="btn btn-primary-o">Sign Up Now!</a>
			</div>
		</div>
	</div>
</div>
<div class="section section-ptb60">
	<div class="container">
		<div class="title-center-label copy">
			<h2 class="t-md t-upper mb-10"><?php the_subtitle(); ?></h2>
			<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post();?>
				<p class='container-md'><?php echo get_the_content(); ?></p> 
			<?php endwhile;
			wp_reset_postdata(); 
			else :
			endif;?>
		</div>
	</div>
	<div class="container container-md mt-30">
		<div class="row">
			<div class="col-md-6 mb-40 icon-howto">
				<div class="img_horizontal">
					<div class="img_vertical well-mirror">
						<?php the_post_thumbnail( 'medium' ); ?>
					</div>
				</div>
				
			</div>
			<div class="col-md-6 well-mirror col-md-text">
				<div class="t-bolder t-base2 t-sm2 mb-15 mt-20"><?php the_field('list_title'); ?></div>
				<ul class="list-icon list-smile mb-40">					
					<?php
					if( have_rows('content_list') ):
					    while ( have_rows('content_list') ) : the_row();?>
							<li><?php the_sub_field('item'); ?></li>
						<?php endwhile;
						 wp_reset_postdata();
					else :
					endif;
					?>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="section section-ptb50 section-primary">
	<div class="container container-lg text-center copy t-xsm2">
		<p><?php echo get_field('red_label_content'); ?></p>
	</div>
</div>
<div class="section section-ptb80 section-gray">
	<div class="row">
		<div class="container">
			<div class="col-md-9">
				<div class="post-list post-block">
					<?php
						$slug = $post->post_name;
						if ($slug == "plan") {
							$slug = "";
						}
					    $args = array(
					    	'post_type' => 'post',
					        'order' => 'DESC',
					        'post_status'  => 'publish',
					        'category_name' => $slug,
					        'posts_per_page' => 4,
					    );
					   		$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();?>

							<?php 
								$single_post = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
								$single_post_img = $single_post[0];
							?>
							<div class="post-item copy">
								<div class="post-img">
									<a href="<?php the_permalink(); ?>">
										<?php if (get_the_post_thumbnail()){?>
											<img src="<?php echo $single_post_img;?>" alt="" class='img-center'>
										<?php }else{
											$no_img = wp_get_attachment_image_src( get_attachment_id_from_src(of_get_option('no_image', '')), 'thumbnail');
											$no_img = $no_img[0];?>
											<img src="<?php echo $no_img; ?>" alt="">
										<?php } ?>	
									</a>
								</div>
								<div class="post-title"><h4 class="t-title t-sm2 mb-10"><a href="<?php the_permalink(); ?>"><?php echo content(get_the_title(), 10);  ?></a></h4></div>
								<div class="post-content">
									<p><?php echo content(strip_shortcodes(wp_trim_words(get_the_content())), 30) ?></p>
								</div>
							</div>
					  	<?php endwhile; ?>
					  <?php wp_reset_postdata(); ?>					
				</div>
			</div>
			<div class="col-md-3 col-border-l section-adons">
				<div class="widget widget-aside">
					<h4 class="t-sm2 t-base mb-20">Do you know?</h4>
					<ul class="list-icon list-idea">						
						<?php
							if( have_rows('do_you_know_list') ):
							    while ( have_rows('do_you_know_list') ) : the_row();?>
							<?php if (get_sub_field('list_title')) {
								$class="list-title";
							}else{
								$class="";
							} ?>        
							<li class="<?php echo $class; ?>"><?php the_sub_field('item'); ?></li>
							<?php endwhile;
							 wp_reset_postdata();
							else :
							endif;
						?>
					</ul>
				</div>
				<div class="widget widget-aside">
					<a href="" class="btn btn-primary-o btn-block"><span class="icon icon-r icon-tv2"></span>Watch our Videos</a>
				</div>
				<div class="widget widget-aside copy">
					<ul class="list-reset list-icon-md list-block">
						<?php
						    $args = array(
						    	'post_type' => 'howto',
						        'order' => 'DESC',
						        'post_status'  => 'publish',
						    );
						   		$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post();?>
									<li><a href="<?php the_permalink(); ?>" class="t-upper"><span class="icon icon-r icon-<?php echo get_field('icon'); ?>"></span><?php the_title(); ?></a></li>
						  	<?php endwhile; ?>
						 <?php wp_reset_postdata(); ?>
					</ul>
				</div>
			</div>

		</div>
	</div>
</div>
<?php get_footer(); ?>