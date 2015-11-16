<?php
/**
 * Template Name: Front Page
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
<div class="banner banner-main" style="background: url('<?php echo $banner_img; ?>')no-repeat">
	<div class="banner-content banner-content-center">	
		<?php if (of_get_option('intro', '')): ?>
			<h1 class="banner-title t-xlg t-base2"><?php echo of_get_option('intro', ''); ?></h1>
		<?php endif ?>
		
		<div class="banner-action">
			<a href="#" class="btn btn-white">Sign Up</a>
			<a href="#" class="btn btn-primary-o show-more-link">Learn More</a>
		</div>
	</div>
	<a href="#" class="link-scroll">How it works <span class="icon icon-chevron-small-down"></span></a>
</div>
<div id="steps" class="section section-icon-steps section-col-4 list-reset section-tab">
	<ul class="section-tabbed section-icon-tabbed">
		<?php
			$i_count2 = 1;
		    $args = array(
		    	'post_type' => 'howto',
		        'order' => 'DESC',
		        'post_status'  => 'publish',
		    );
		   		$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();?>

				<?php if ($i_count2==1){
					$class="active";
				 }else{
				 	$class="";
				 } ?>
				<li><a href="#<?php echo get_field('icon'); ?>" class="<?php echo $class; ?>"><span class="icon icon-<?php echo get_field('icon'); ?>"></span><h3><?php the_title(); ?></h3></a></li>
				<?php $i_count2++; ?>
		  	<?php endwhile; ?>
		 <?php wp_reset_postdata(); ?>	
	</ul>
	<div class="section-icon-contents section-tabbed-contents section-primary section-p30">
		<div class="container">
			<?php $i_count2 = 1;
			    $args = array(
			    	'post_type' => 'howto',
			        'order' => 'DESC',
			        'post_status'  => 'publish',
			    );
			   		$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();?>

					<?php if ($i_count2==1){
						$class2="in";
					 }else{
					 	$class2="";
					 } ?>
					<div id="<?php echo get_field('icon'); ?>" class="section-tabbed-item <?php echo $class2; ?>">
						<div class="section-icon-title">
							<h2 class="t-xhuge t-upper t-bold t-title"><?php the_title(); ?></h2>
						</div>
						<div class="section-icon-body">
							<h3 class="t-normal t-title"><?php the_subtitle(); ?></h3>
							<p><?php echo content(strip_shortcodes(wp_trim_words(get_the_content())),40); ?></p>
							<a href="<?php the_permalink(); ?>" class="btn btn-secondary light">learn more <span class="icon icon-l icon-arrow-r"></span></a>
						</div>
					</div>
					<?php $i_count2++; ?>
			  	<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>	
		</div>
	</div>
</div>
<div class="section section-ptb60">
	<div class="container">
		<div class="title-center-label">
			<p><span>Contact us for Assistance</span></p>
			<h2 class="t-md t-upper">We specialise in</h2>
		</div>
		<div class="post-block post-img">
			<div class="row">
				<?php $args = array(
				    	'post_type' => 'specialty',
				        'order' => 'DESC',
				        'post_status'  => 'publish',
				        'posts_per_page' => 4,
				    );
				   		$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
						$special = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb-md');
						$special_img = $special[0];?>
						<div class="col-md-3 col-sm-6">
							<div class="post-item">
								<a href="<?php the_permalink(); ?>">
									<h4 class="t-title"><span><?php the_title(); ?></span></h4>									
									<?php if (get_the_post_thumbnail()){?>
										<img src="<?php echo $special_img;?>" alt="">
									<?php }else{
										$no_img = wp_get_attachment_image_src( get_attachment_id_from_src(of_get_option('no_image', '')), 'thumb-md');
										$no_img = $no_img[0];?>
										<img src="<?php echo $no_img; ?>" alt="">
									<?php } ?>	
								</a>
							</div>
						</div>

				  	<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>				
			</div>
		</div>
	</div>
</div>
<div class="section section-gray section-info section-pt60">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="section-img">
					<img src="<?php echo get_template_directory_uri() ?>/images/placeholders/avt-lg.png" alt="">
				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="section-content">
						<?php if (of_get_option('ebook', '')){ ?>
							<div class="col-md-8 col-border-r ">
						<?php }else{?>
							<div class="col-md-12">
						<?php } ?>
							<div class="section-body copy mb-30">
								<h4 class="t-md t-title"><?php echo get_field('bottom_content_title') ?></h4>
								<p><?php echo get_field('bottom_content_text') ?></p>
								<a href="<?php echo get_field('bottom_content_link_to') ?>" class="btn btn-secondary mt-20">Get started</a>
							</div>
						</div>
						<?php if (of_get_option('ebook', '')): ?>
							<div class="col-md-4 col-border-l">
								<div class="section-adons mb-30">
									<a href=""><img src="<?php echo get_template_directory_uri() ?>/images/placeholders/book.png" alt=""></a>
									<a href="" data-toggle="modal" data-target="#sub_book" id="sub_book_btn" class="btn btn-primary-o mt-20"><span class="icon icon-r-sm icon-download-book"></span>Download Ebook</a>
								</div>
							</div>	
						<?php endif ?>
										
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>