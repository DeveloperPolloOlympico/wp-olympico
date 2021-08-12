<?php

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	{ die (esc_html__('Please do not load this page directly!', 'dani')); }

if ( post_password_required() ) { ?>
	<p class="password_required"><?php esc_html_e('The comments is password protected. Enter your password.', 'dani'); ?></p>
<?php
	return;
}
?>

			<?php if ( comments_open() )  { ?>

                <?php if ( have_comments() ) { 
						$comments_amount = get_comment_count($post->ID);
						if ($comments_amount['approved'] > 0) {
				?>
                		
            	<div id="blog-comments" class="comments">
                    <h6 class="title-alt"><strong><?php comments_number('','1','%'); ?> <?php esc_html_e('Comments', 'dani'); ?></strong></h6>
                    <ul class="comment-list">
                        <?php wp_list_comments('type=comment&callback=dani_comment'); ?>
                    </ul>
                    <?php paginate_comments_links(); ?>
              	</div> <!-- END #comments -->    
                              
                    <?php }  ?>
                <?php } ?>
                                
                	<div id="blog-leavecomment" class="leavecomment">
                      	<?php 
							global $dani_comments_defaults;
							comment_form($dani_comments_defaults);    
						?> 
                    </div> <!-- END #leavecomment -->
                
			<?php } ?> 