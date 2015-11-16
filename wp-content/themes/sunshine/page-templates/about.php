<?php
/**
 * Template Name: About
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
		<h1 class="banner-title t-base2 t-upper mb-0">About</h1>
	</div>
</div>
<div class="section section-ptb50 section-gray">
	<div class="container container-xlg">
		<div class="row">
			
			<?php
				if( have_rows('about_us_sub_content') ):
				    while ( have_rows('about_us_sub_content') ) : the_row();?>
						<div class="col-md-4">
							<div class="well well-mirror well-white well-bordered well-labeled well-sm">
								<h4 class="title-rosy t-title mb-20"><?php the_sub_field('title'); ?></h4>
								<p><?php the_sub_field('content');?></p>	
							</div>
						</div>
					<?php endwhile;
					 wp_reset_postdata();
				else :
				endif;
			?>
		</div>
	</div>
</div>
<div class="section section-info section-pt80">
	<div class="container container-sxlg">
		<div class="row">
			<div class="col-md-4">
				<div class="section-img web-only">
					<?php the_post_thumbnail(); ?>
				</div>
			</div>
			<div class="col-md-8">
				<div class="section-content">
					<div class="section-body copy2 t-md2">
						<h4 class="t-md t-title t-upper t-base"><?php the_subtitle(); ?></h4>
						<?php the_content(); ?>
					</div>									
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
									<img src="<?php echo $special_img;?>" alt="">
								</a>
							</div>
						</div>

				  	<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>				
			</div>
		</div>
	</div>
</div>
<div class="section section-pt60 section-gray">	
	<div class="title-center-label">
		<h2 class="t-md t-upper ">Professional Members Panels</h2>
	</div>
	<div class="section-tab tab-img tab">	
		<ul  class="section-tabbed list-reset list-block">
			<?php
				$i_count = 1;
				$count_posts = wp_count_posts('team');

				 $published_posts = $count_posts->publish;
				 $item_width = 100/$published_posts;
			?>
			<?php
			    $args = array(
			    	'post_type' => 'team',
			        'order' => 'ASC',
			        'post_status'  => 'publish',
			    );
			   		$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();?>

					<?php 
						$member = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb-md');
						$member_img = $member[0];
					?>
					<?php if ($i_count==1){
						$class="active";
					 }else{
					 	$class="";
					 	} ?>
					<li style="width: <?php echo $item_width;?>%;">
						<a href="#<?php echo $i_count; ?>a" data-toggle="tab" class="<?php echo $class; ?>">
							<img src="<?php echo $member_img;?>" alt="">
						</a>
					</li>
					<?php $i_count++; ?>
			  	<?php endwhile; ?>
			  <?php wp_reset_postdata(); ?>	
		</ul>
		<div class="section-tabbed-contents section-primary section-ptb60 copy">
			<div class="container container-sxlg">
		        <?php
					$i_count2 = 1;
				    $args = array(
				    	'post_type' => 'team',
				        'order' => 'ASC',
				        'post_status'  => 'publish',
				    );
				   		$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();?>

						<?php if ($i_count2==1){
							$class2="in";
						 }else{
						 	$class2="";
						 	} ?>
							<div class="tab-pane section-tabbed-item <?php echo $class2; ?>" id="<?php echo $i_count2;?>a">
							   <div class="row">
							   		<div class="col-md-3 ">
							   			<h4 class="t-title t-normal t-upper"><?php the_title(); ?></h4>
										<p><?php the_subtitle(); ?></p>
							   		</div>
							   		<div class="col-md-9 col-border-l-lt ">
							   			<p class="t-md2"><?php echo content(strip_shortcodes(wp_trim_words(get_the_content())), 30);?></p>
									</div>
							   </div>
					        </div>
						<?php $i_count2++; ?>
				  	<?php endwhile; ?>
				  <?php wp_reset_postdata(); ?>	
			</div>
		</div>
  	</div>
</div>
<div class="section-tabbed-contents section-secondary section-ptb60 copy">

	<div class="container container-md copy t-xsm2">
		<div class="row">
			<div class="col-md-9">
				<p><?php the_field('apply_now_content'); ?></p>
			</div>
			<div class="col-md-3">
				<a href="<?php the_field('apply_now_link'); ?>" class="btn btn-secondary light">Apply now!</a>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>