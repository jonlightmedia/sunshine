<?php
/**
 * Template Name: TV
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
<div class="banner" style="background: url('<?php echo $banner_img; ?>')no-repeat">
</div>
<div class="page-panel">
	<div class="container">
		<h4 class="t-title"><span>TV</span> EPISODES</h4>
		<form method="get" id="searchform" class="search searchform" action="<?php echo esc_url( home_url( 'tv-episodes/' ) ); ?>">
			<div class="form-group mb-0 search-input">
				<input type="text" class="form-control input-gray" value="<?php echo get_search_query(); ?>" name="s_keyword" id="s_keyword" placeholder="Search Episode..">
				<input type="submit" id="searchsubmit" class="submit_search" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
			</div>
		</form>
		<a href="#" data-toggle="modal" data-target="#sub_tv" id="sub_tv_btn"  class="btn btn-md btn-primary-o btn-rounded">Subscribe to Tv</a>
	</div>
</div>
<div class="section section-ptb50 section-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h4 class="t-title t-title-bordered t-upper">
				
				<?php if (isset($_REQUEST['s_keyword'])) { ?>
					Search Result for : <?php echo $_REQUEST['s_keyword']; ?>
				<?php }else{ ?>
					Featured EPISODES
				<?php } ?>
				</h4>
				<div class="post-inline">
					<div class="row">
						<?php 
					  	$countr = 0;
					  	$posts_per_page = 10;
					  	$paged = get_query_var('paged');
					  	if (isset($_REQUEST ['s_keyword'])) {
					  		$s_key = $_REQUEST['s_keyword'];
					  	}
						$args = array( 'post_type' => 'tv', 'posts_per_page' => $posts_per_page,'paged' => $paged, 'order' => 'DESC',
							'post_status'  => 'publish',
							's' => $s_key,
							'exact' => false,                        
	    					'sentence' => true,
							);
						$loop = new WP_Query( $args );
						    while ( $loop->have_posts() ) : $loop->the_post();?>
								<div class="post-item col-sm-6 col-md-4">
									<div class="post-img"><a href="<?php the_permalink();?>">
										<?php if (get_the_post_thumbnail()){?>
											<?php the_post_thumbnail('thumb-sm'); ?>
										<?php }else{
											$no_img = wp_get_attachment_image_src( get_attachment_id_from_src(of_get_option('no_image', '')), 'thumb-sm');
											$no_img = $no_img[0];?>
											<img src="<?php echo $no_img; ?>" alt="">
										<?php } ?>								
									</a></div>

									<div class="post-meta"><?php echo get_the_date('jS F, Y'); ?></div>
									<div class="post-title"><a href="<?php the_permalink();?>"><?php echo content(get_the_title(),7); ?></a></div>
								</div>
								<?php $countr++;
							endwhile; ?>   
						<?php wp_reset_postdata(); ?>
						<?php if($countr == 0){ ?>
							<div class="col-md-12">
							<h2>Oops! That search keyword can’t be found.</h2>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="pagination">
					<?php wp_pagenavi( array( 'query' => $loop ) ); ?>
				</div>
			</div>
			<div class="col-md-3">
				<?php get_sidebar('secondary'); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>

<div class="modal fade" id="sub_tv" tabindex="-1" role="dialog" aria-labelledby="sub_tvLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title t-upper" id="predictionLabel">Subscribe and Stay updated</h4>
        <p>Recieve the best updates on our latest episodes</p>
      </div>
      <div class="modal-body">		
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" class="form-control input-gray  input-lg" placeholder="Name">
			</div>
			<div class="form-group">
				<label for="">Postcode</label>
				<input type="text" class="form-control input-gray input-lg" placeholder="Postcode">
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input type="email" class="form-control input-gray input-lg" placeholder="Email">
			</div>
			<div class="form-group">
				<button class="btn btn-primary-o btn-normal btn-rounded">Submit</button>
			</div>	
      </div>
    </div>
  </div>
</div>