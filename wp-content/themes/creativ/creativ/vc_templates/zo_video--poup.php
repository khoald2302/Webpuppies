<?php
$templete = 'template-'.str_replace('.php','',$atts['zo_template']). ' ';
?>
<div class="zo-video-play-wrapper <?php echo esc_attr($templete);?>" id="<?php echo esc_attr($atts['html_id']); ?>">
	<?php if( empty($atts['video']['type']) ) : ?>
		<img src="<?php echo esc_url( $atts['thumbnail_url'] ); ?>" alt="" />
	<?php else : ?>

	<a class="play-button" href="<?php echo $atts['video_url'];?>" data-rel="prettyPhoto" title="Click to Play Video"
		data-player="<?php echo esc_attr($atts['html_id']); ?>-player"
		data-type="<?php echo $atts['video']['type']; ?>">
		<i class="fa fa-play border-radius"></i>
	</a>
	<h3><?php echo esc_attr($atts['video_title']);?></h3>

	<?php endif; ?>
</div>