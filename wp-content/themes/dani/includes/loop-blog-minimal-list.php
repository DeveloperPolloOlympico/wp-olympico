<?php
if (!isset($readmore) || !$readmore) { $readmore = get_option('_sr_bloggridreadmore'); }
if (!isset($date) || !$date) { $date = get_option('_sr_bloggriddate'); }
$format = get_post_format(); if( false === $format ) { $format = 'standard'; }
?>  
                    
                    <div class="blog-item">
					<?php if ($format == 'quote') { ?>
                    	<blockquote>
                            <p><a href="<?php esc_url(the_permalink()); ?>"><?php echo esc_html(get_post_meta(get_the_ID(), '_sr_quote', true)); ?></a></p>
                            <cite><?php the_title(); ?></cite>
                        </blockquote>
                    <?php } else { ?>
                        <?php if ($date) { ?><div class="post-meta"><span class="post-date"><?php the_date(); ?></span></div><?php } ?>
                        <h3 class="post-name"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>
                    <?php } ?>
                    	<?php if ($readmore) { ?>
                        <p><a class="read-more sr-button-with-arrow" href="<?php esc_url(the_permalink()); ?>"><strong><?php esc_html_e("Read More", 'dani'); ?></strong></a></p>
                        <?php } ?>
                    </div>