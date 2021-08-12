<?php
if (!isset($readmore) || !$readmore) { $readmore = get_option('_sr_bloggridreadmore'); }
if (!isset($date) || !$date) { $date = get_option('_sr_bloggriddate'); }
$format = get_post_format(); if( false === $format ) { $format = 'standard'; }
?>  
                    
                    <div class="isotope-item blog-item <?php echo 'format-'.esc_attr($format); ?>">
                        <a class="full-link" href="<?php esc_url(the_permalink()); ?>"></a>
                        
                        <?php if ($format == 'quote') { ?>
                        <div class="blog-bg"></div>
                        <div class="blog-item-inner item-inner">
                            <div class="blog-info">
                                <?php if ($date) { ?>
                                <div class="post-meta">
                                    <span class="post-date"><?php the_date(); ?></span>
                                </div>
                                <?php } ?>
                        		<blockquote>
                                    <p><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html(get_post_meta(get_the_ID(), '_sr_quote', true)); ?></a></p>
                                    <cite><?php the_title(); ?></cite>
                                </blockquote>
                                <?php if ($readmore) { ?>
                                <a class="read-more sr-button-with-arrow" href="<?php esc_url(the_permalink()); ?>"><strong><?php esc_html_e("Read More", 'dani'); ?></strong></a>
                                <?php } ?>
                            </div>
                        </div>
						<?php } else { ?>
						
						<?php if(has_post_thumbnail()) {
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'dani-thumb-medium' );
							$url = $thumb['0']; }
						?>
                        <div class="blog-bg" style="background-image:url(<?php echo esc_url($url); ?>);"></div>
                        <div class="blog-item-inner item-inner">
                            <div class="blog-info">
                                <?php if ($date) { ?>
                                <div class="post-meta">
                                    <span class="post-date"><?php the_date(); ?></span>
                                </div>
                                <?php } ?>
                                <h3 class="post-name"><?php the_title(); ?></h3>
                                <?php if ($readmore) { ?>
                                <a class="read-more sr-button-with-arrow" href="<?php esc_url(the_permalink()); ?>"><strong><?php esc_html_e("Read More", 'dani'); ?></strong></a>
                                <?php } ?>
                            </div>
                        </div>
                        
						<?php }  ?>
                    </div>