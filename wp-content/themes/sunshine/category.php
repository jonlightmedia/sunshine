<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<?php $category = get_the_category(); ?>
<div class="banner banner-md" style="background: url('<?php echo get_template_directory_uri() ?>/images/placeholders/banner6.jpg')no-repeat">
	<div class="container">
		<div class="section-tab tab-banner tab">	
			<ul  class="section-tabbed list-reset list-block tabbed-col-3">
				<li><a href="<?php bloginfo('url'); ?>/category/save/" class="<?php if ($category[0]->cat_name == "Save") { echo "active";} ?>">Save Blogs</a></li>
				<li><a href="<?php bloginfo('url'); ?>/category/invest/" class="<?php if ($category[0]->cat_name == "Invest") { echo "active";} ?>">Invest Blogs</a></li>
				<li><a href="<?php bloginfo('url'); ?>/category/protect/"  class="<?php if ($category[0]->cat_name == "Protect") { echo "active";} ?>">Protect Blogs</a></li>
			</ul>
			<div class="section-tabbed-contents section-primary section-p30 copy">
			 	<div class="tab-pane section-tabbed-item in" id="1a">
		          <p>
		          	<?php echo $category[0]->category_description; ?>
		          </p>
				</div>
			</div>
	  	</div>
  	</div>
</div>
<div class="page-panel">
	<div class="container">
		<h4 class="t-title">BLOG</h4>
		<form method="get" id="searchform" class="search searchform" action="<?php echo esc_url( home_url( 'blog/' ) ); ?>">
			<div class="form-group mb-0 search-input">
				<input type="text" class="form-control input-gray" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search Blog..">
				<input type="submit" id="searchsubmit" class="submit_search" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
			</div>
		</form>

		<a href="#" data-toggle="modal" data-target="#sub_blog" id="sub_blog_btn"  class="btn btn-md btn-primary-o btn-rounded">Subscribe to Blog</a>
	</div>
</div>
<div class="section section-ptb50 section-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h4 class="t-title t-title-bordered t-upper">
				<?php if (isset($_REQUEST['s'])) { ?>
					Search Result for : <?php echo $_REQUEST['s']; ?>
				<?php }else{ ?>
					News and Information to Help You Make Better Financial Decisions
				<?php } ?>
				</h4>
				<div class="post-list post-block ">

					<?php 
				  	$countr = 0;
				    
				  	
				  	$posts_per_page = 10;
				  	$paged = get_query_var('paged');
					$args = array( 'post_type' => 'post', 'posts_per_page' => $posts_per_page,'paged' => $paged, 'order' => 'DESC',
						'post_status'  => 'publish',
						'category_name' => $category[0]->cat_name,
						's' => $s,
						'exact' => false,                        
    					'sentence' => true,
						);
					$loop = new WP_Query( $args );
					    while ( $loop->have_posts() ) : $loop->the_post();
							get_template_part( 'content', get_post_format() );
							$countr++;
						endwhile; ?>   
					<?php wp_reset_postdata(); ?>
					<?php if($countr == 0){ ?>
						<h2>Oops! That search keyword can’t be found.</h2>
					<?php } ?>
				</div>
				<div class="pagination">
					<?php wp_pagenavi( array( 'query' => $loop ) ); ?>
				</div>
			</div>
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>

<div class="modal fade" id="sub_blog" tabindex="-1" role="dialog" aria-labelledby="sub_blogLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title t-upper" id="predictionLabel">Subscribe and Stay updated</h4>
        <p>Recieve the best updates on how to Save, Invest and Protect</p>
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