				<?php if (get_field('display_blog_and_tv_latest_feeds')) {?>					
					<div class="section section-fullwdth-col-2">
						<div class="container">	
							<div class="section-panel col-mirror section-gray">
								<div class="section-panel-head">
									<h4 class="t-title t-normal t-upper">Blog</h4>
									<a href="<?php bloginfo('url'); ?>/blog" class="t-base">More <span class="icon icon-l icon-arrow-r"></span></a>
								</div>
								<div class="section-panel-body  ">	
									<div class="post-list-feat">
										<?php 
										  	$countr = 0;
										  	$posts_per_page = 3;
											$args = array( 'post_type' => 'post', 'posts_per_page' => $posts_per_page, 'order' => 'ASC',
												'post_status'  => 'publish',
												);
											$loop = new WP_Query( $args );
											    while ( $loop->have_posts() ) : $loop->the_post();?>
												    <div class="post-item">	
														<div class="post-meta"><?php echo get_the_date('jS F, Y'); ?></div>
														<div class="post-title"><a href="<?php the_permalink(); ?>" class="t-title"><?php echo content(get_the_title(),10); ?></a></div>
													</div>
												<?php $countr++; endwhile; ?>   
											<?php wp_reset_postdata(); ?>
											<?php if($countr == 0){ ?>
												<h2>No post added yet!</h2>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="section-panel section-panel-dark col-mirror">
								<div class="section-panel-head">
									<h4 class="t-title t-normal t-upper">TV</h4>
									<a href="<?php bloginfo('url'); ?>/tv-episodes" class="t-base">More <span class="icon icon-l icon-arrow-r"></span></a>
								</div>
								<div class="section-panel-body">	
									<div class="post-list-feat post-list-feat-lg">
										<?php 
										  	$countr = 0;
										  	$posts_per_page = 2;
											$args = array( 'post_type' => 'tv', 'posts_per_page' => $posts_per_page, 'order' => 'ASC',
												'post_status'  => 'publish',
												);
											$loop = new WP_Query( $args );
											    while ( $loop->have_posts() ) : $loop->the_post();?>
												    <div class="post-item">	
														<div class="post-img">
															<a href="<?php the_permalink(); ?>">
																
																<?php if (get_the_post_thumbnail()){?>
																	<?php the_post_thumbnail('thumb-sm'); ?>
																<?php }else{
																	$no_img = wp_get_attachment_image_src( get_attachment_id_from_src(of_get_option('no_image', '')), 'thumb-sm');
																	$no_img = $no_img[0];?>
																	<img src="<?php echo $no_img; ?>" alt="">
																<?php } ?>	
															</a>
														</div>
														<div class="post-meta"><span><?php echo get_the_date('jS F, Y'); ?></span></div>
														<div class="post-title"><a href="<?php the_permalink(); ?>" class="t-title"><?php echo content(get_the_title(),8); ?></a></div>
													</div>
												<?php $countr++; endwhile; ?>   
											<?php wp_reset_postdata(); ?>
											<?php if($countr == 0){ ?>
												<h2>No post added yet!</h2>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				
					<div class="section section-ptb60">
						<div class="container">
							<div class="title-center-label">
								<h2 class="t-md t-upper ">SUPPORTED BY LEADING INDUSTRY & EDUCATION SPONSORS</h2>
							</div>
							<div class="post-list-clients owl-carousel owl-theme">
							   <?php
							    $args = array(
							    	'post_type' => 'client',
							        'order' => 'DESC',
							        'post_status'  => 'publish',
							    );
							   		$loop = new WP_Query( $args );
									while ( $loop->have_posts() ) : $loop->the_post();?>

									<?php 
										$client = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb-md');
										$client_img = $client[0];
									?>
									<div class="item post-item"><img src="<?php echo $client_img;?>" alt="<?php the_title(); ?>"></div>
							  	<?php endwhile; ?>
							  <?php wp_reset_postdata(); ?>	
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<footer class="l-footer">
				<div class="row">
					<div class="container">
						<div class="col-sm-12 col-md-3 col-lg-3sm mb-20 widget-col">
							<h4 class="t-title t-upper mb-15 t-sm">SOCIAL LINKS</h4>
							<div class="social list-reset">
								<ul class="social-list">
									<?php if (of_get_option('facebook', '')): ?>
										<li> <a href="<?php echo of_get_option('facebook', ''); ?>" target='_blank'><span class="icon icon-facebook"></span></a> </li>
									<?php endif ?>
									<?php if (of_get_option('google', '')): ?>
										<li> <a href="<?php echo of_get_option('google', ''); ?>" target='_blank'><span class="icon icon-google-plus"></span></a> </li>
									<?php endif ?>
									<?php if (of_get_option('twitter', '')): ?>
										<li> <a href="<?php echo of_get_option('twitter', ''); ?>" target='_blank'><span class="icon icon-twitter"></span></a> </li>
									<?php endif ?>
									<?php if (of_get_option('youtube', '')): ?>
										<li> <a href="<?php echo of_get_option('youtube', ''); ?>" target='_blank'><span class="icon icon-youtube"></span></a> </li>
									<?php endif ?>
									<?php if (of_get_option('linkedin', '')): ?>
										<li> <a href="<?php echo of_get_option('linkedin', ''); ?>" target='_blank'><span class="icon icon-linkedin"></span></a> </li>
									<?php endif ?>
									<?php if (of_get_option('insta', '')): ?>
										<li> <a href="<?php echo of_get_option('insta', ''); ?>" target='_blank'><span class="icon icon-instagram"></span></a> </li>
									<?php endif ?>
								</ul>
							</div>
						</div>
						<div class="col-xs-4 col-sm-3 col-md-2 col-lg-2sm widget-col">
							<h4 class="t-title t-upper mb-15 t-sm">What we can do</h4>
							<div class="list-reset">
								 <?php
									$defaults = array(
										'theme_location'  => 'what can we do',
										'menu'            => '',
										'container'       => '',
										'container_class' => '',
										'container_id'    => 'cssmenu',
										'menu_class'      => 'widget-nav',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_class'      => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'depth'           => 0,
										'walker'          => ''
									);

									wp_nav_menu( $defaults );
								?>
							</div>
						</div>
						<div class="col-xs-4 col-sm-3 col-md-2 col-lg-2sm widget-col">
							<h4 class="t-title t-upper mb-15 t-sm">Media</h4>
							 <div class="list-reset">
								 <?php
									$defaults = array(
										'theme_location'  => 'media',
										'menu'            => '',
										'container'       => '',
										'container_class' => '',
										'container_id'    => 'cssmenu',
										'menu_class'      => 'widget-nav',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_class'      => '',
										'link_before'     => '',
										'link_after'      => '',
										'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'depth'           => 0,
										'walker'          => ''
									);

									wp_nav_menu( $defaults );
							?>
							</div>
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2sm widget-col">
							<h4 class="t-title t-upper mb-15 t-sm">Company</h4>
							<div class="list-reset">
							 <?php
								$defaults = array(
									'theme_location'  => 'company',
									'menu'            => '',
									'container'       => '',
									'container_class' => '',
									'container_id'    => 'cssmenu',
									'menu_class'      => 'widget-nav',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_class'      => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'           => 0,
									'walker'          => ''
								);

								wp_nav_menu( $defaults );
							?>
							</div>
						</div>
						
						
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-4sm">
							<div class="copyright">
								<img src="<?php echo get_template_directory_uri() ?>/images/logo-footer.png" alt="">
								<?php if (of_get_option('copyright', '')): ?>
								<div class="footnotes t-xs">
									<span><?php echo of_get_option('copyright', '');   ?></span>
								</div>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<div class="offcanvas flypanels-right">
		<div class="panelcontent" data-panel="treemenu">
			<nav class="flypanels-treemenu" role="navigation">
				 <?php
					$defaults = array(
						'theme_location'  => 'primary',
						'menu'            => '',
						'container'       => '',
						'container_class' => '',
						'container_id'    => 'cssmenu',
						'menu_class'      => '',
						'menu_id'         => 'menu-primary',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '<div>',
						'after'           => '</div>',
						'link_class'      => 'link',
						'link_before'     => '<span class="link">',
						'link_after'      => '</span>',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => ''
					);

					wp_nav_menu( $defaults );
				?>
			</nav>
		</div>
	</div>
</div>



<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
e=o.createElement(i);r=o.getElementsByTagName(i)[0];
e.src='//www.google-analytics.com/analytics.js';
r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
<?php wp_footer(); ?>


<script type="text/javascript">
	(function($){
		$(document).ready(function() {
		  	util.Global.init();
		  	<?php if (is_front_page()) { ?>
		    util.Front.init();
		    <?php } ?>
		});
	})(jQuery);
</script>
<script>
	$(document).ready(function(){
		$('.flypanels-container').flyPanels({
			treeMenu: {
				init: true,
				expandHandler: 'span.expand'
			},
			search: {
				init: false,
			}
		});
		FastClick.attach(document.body);
	});
</script>
<?php if (is_front_page()) { ?>
	<div class="modal fade" id="sub_book" tabindex="-1" role="dialog" aria-labelledby="sub_bookLabel">
	  <div class="modal-dialog modal-md" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title t-upper" id="predictionLabel">Download Ebook, it's free</h4>
	        <p>Enter your email address and we will send you our email for free.</p>
	      </div>
	      <div class="modal-body">
	      		<div class="well well-info well-shorten">
	      			<div class="well-content">	
		      			<p>Claim your share of over $1,000,000 of goods and services brought to you by the "Dollars With Sense" Community TV program and sponsors</p>
						<p>Experience Wellness, Experience Knowledge, Experience Wealth.</p>
						<p>"Dollars With Sense" will make every effort to help those in need wherever we can. By honestly completing the form below, we will refer you to the most appropriate give-away to help you on your path to financial freedom.</p>
	      			</div>
	      			<div class="well-action">	
	      				<a href="#" class="show-more btn btn-sm p-0 t-upper"><span class="t-title">Show More</span><span class="icon icon-l-sm icon-chevron-thin-down"></span></a>
	      			</div>
	      		</div>		
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
					<button class="btn btn-primary-o btn-normal btn-rounded">Send me Ebook</button>
				</div>	
	      </div>
	    </div>
	  </div>
	</div>
<?php } ?>

</body>

</html>
