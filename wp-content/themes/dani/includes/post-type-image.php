<?php

$theId = dani_getId();

$show = get_post_meta($theId, '_sr_imageshow', true);
if ($show == 'custom') {	$image = '<img src="'.esc_url(get_post_meta($theId, '_sr_imageimage', true)).'" alt="'.esc_html(get_the_title()).'"/>'; }
else { $image = get_the_post_thumbnail($theId,'dani-thumb-big'); }
?>

<?php if($image) { ?>
    <div class="blog-media">
		<?php echo $image; ?>
	</div> <!-- END .entry-media -->
<?php } ?>