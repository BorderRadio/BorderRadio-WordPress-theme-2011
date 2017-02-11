<?php 
/**
* Template Name: Page Programmi
*/
get_header(); ?>
           
				<div class="post-content-wrapper">
                        <h1>Programmi</h1>
						<?php if (have_posts()) : ?>
						<?php
						    $pages = $wp_query->max_num_pages;
							$args = array( 
							    'posts_per_page' => 200, // Nota: senza limita i risultati a 10
								'post_type' => 'programmi',
								'post_status' => 'publish',
								'orderby' => 'rand',
							    'paged' => $paged
							);
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
							$post_meta = get_post_meta(get_the_ID($post->ID), 'metakey_logo', true);
							$meta_values = json_decode($post_meta,true);
                        ?>
						    <div class="lista-programmi-content">
							    <div class="prog-info">
									<div class="prog_img">
									<img src="<?php echo $meta_values['logo']; ?>" alt="<?php the_title_attribute(); ?>">
									</div>
									<div class="post-title">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
									</div>
									<?php content(25, __('[...]')); ?>
									<div class="clear"></div>
								</div>
								
							</div>  
							<?php endwhile; ?>
							<?php kriesi_pagination($loop->max_num_pages); ?>
						<?php else : ?>
							<h2 class="center">Not Found</h2>
							<p class="center">Sorry, but you are looking for something that isn't here.</p>
							<?php include (TEMPLATEPATH . "/searchform.php"); ?>
						<?php endif; ?> 
				</div>
			
<?php get_footer(); ?>	