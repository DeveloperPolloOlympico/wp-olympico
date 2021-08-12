<?php
if (!isset($readmore) || !$readmore) { $readmore = get_option('_sr_bloggridreadmore'); }
if (!isset($style)) { $style = get_option('_sr_bloggridstyle'); }
if (!isset($date) || !$date) { $date = get_option('_sr_bloggriddate'); }
if (!isset($category) || !$category) { $category = get_option('_sr_bloggridcategory'); }
if ($style == 'masonry') { $itemClass = 'isotope-item'; $excerpt= 20; } else { $itemClass = ''; $excerpt= 40; }
$format = get_post_format(); if( false === $format ) { $format = 'standard'; }
?>  
                    
                    <div class="blog-item <?php echo esc_attr($itemClass); ?> <?php echo 'format-'.esc_attr($format); ?>">
                        <div class="blog-item-inner item-inner">
                            
						<?php if ($format == 'quote') { ?>
                        	<div class="blog-info">
                        		<blockquote>
                                    <p><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html(get_post_meta(get_the_ID(), '_sr_quote', true)); ?></a></p>
                                    <cite><?php the_title(); ?></cite>
                                </blockquote>
                                <?php if ($readmore) { ?>
                                <a class="read-more sr-button-with-arrow" href="<?php esc_url(the_permalink()); ?>"><strong><?php esc_html_e("Read More", 'dani'); ?></strong></a>
                                <?php } ?>
                            </div>
						<?php } else { ?>
							<?php if(has_post_thumbnail()) { ?>
                            <div class="blog-media">
                                <a href="<?php esc_url(the_permalink()); ?>" class="thumb-hover">
                                <?php the_post_thumbnail('dani-thumb-big'); ?>
                                </a>
                            </div>
                            <?php } ?>
                            <div class="blog-info">
                                <div class="post-meta">
                                	<?php if ($date) { ?><span class="post-date"><?php echo get_the_date(); ?></span><?php } ?>
                                    <?php if ($category && dani_getCategory()) { echo dani_getCategory(); } ?>
                                </div>
                                <h3 class="post-name"><a href="<?php esc_url(the_permalink()); ?>">
                                	<?php the_title(); ?>
                                </a></h3>
                                <?php echo wp_kses_post(dani_content('excerpt', $excerpt, false)); ?>
                                <?php if ($readmore) { ?>
                                <a class="read-more sr-button-with-arrow" href="<?php esc_url(the_permalink()); ?>"><strong><?php esc_html_e("Read More", 'dani'); ?></strong></a>
                                <?php } ?>
                            </div>
						<?php }  ?>
                        </div>
                    </div>