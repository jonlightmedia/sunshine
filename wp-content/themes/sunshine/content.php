<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<?php 
	$single_post = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail');
	$single_post_img = $single_post[0];
 ?>
<article id="post-<?php the_ID(); ?>" <?php post_class("post-item well-white well-bordered well-cont mb-20"); ?> >
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
	<div class="post-title"><h4 class="t-title t-sm2 mb-10 t-upper"><a href="<?php the_permalink(); ?>"><?php echo content(get_the_title(), 22);  ?></a></h4></div>
	<div class="post-meta-list mb-10">
		<div class="meta"><span class="icon icon-r-sm icon-circle icon-tag"></span>
		<?php $category = get_the_category();
		echo '<a href="'.get_category_link($category[0]->cat_ID).'" class="link t-upper">' . $category[0]->cat_name . '</a>';?>
	</div>
<div class="meta"><span class="icon icon-r-sm icon-circle icon-calendar-o"></span><?php echo get_the_date('jS F, Y'); ?></div>
	</div>
	<div class="post-content">
		<p class="t-md2"><?php echo content(strip_shortcodes(wp_trim_words(get_the_content())), 30) ?></p>
		<a href="<?php the_permalink(); ?>" class="btn btn-primary-o btn-sm">Read More</a>
	</div>
</article>
