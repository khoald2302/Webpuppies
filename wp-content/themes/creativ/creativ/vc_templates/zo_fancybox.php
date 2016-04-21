<?php
$uqid = uniqid();
$class_link = 'zo-fancyboxes-' . $uqid;
?>
<div class="<?php echo esc_attr($class_link); ?> zo-fancyboxes-wraper zo-fancybox-default <?php echo esc_attr($atts['template']); ?>" id="<?php echo esc_attr($atts['html_id']); ?>">
    <?php if ($atts['title'] != ''): ?>
        <div class="zo-fancyboxes-head">
            <div class="zo-fancyboxes-title">
                <?php echo apply_filters('the_title', $atts['title']); ?>
            </div>
            <div class="zo-fancyboxes-description">
                <?php echo apply_filters('the_content', $atts['description']); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="zo-fancyboxes-body">
        <div class="row">
            <?php
            $columns = ((int)$atts['zo_cols']) ? (int)$atts['zo_cols'] : 1;

            $zo_title_size = isset($atts['zo_title_size']) ? $atts['zo_title_size'] : 'h2';
            $zo_fancybox_icon_color = isset($atts['zo_fancybox_icon_color']) ? $atts['zo_fancybox_icon_color'] : '';
            $zo_fancybox_title_color = isset($atts['zo_fancybox_title_color']) ? $atts['zo_fancybox_title_color'] : '';
            $zo_fancybox_content_color = isset($atts['zo_fancybox_content_color']) ? $atts['zo_fancybox_content_color'] : '';

            for ($i = 1; $i <= $columns; $i++) : ?>
                <?php if ($i != 5):
                $icon = isset($atts['icon' . $i]) ? $atts['icon' . $i] : '';
                $content = isset($atts['description' . $i]) ? $atts['description' . $i] : '';
                $image = isset($atts['image' . $i]) ? $atts['image' . $i] : '';
                $title = isset($atts['title' . $i]) ? $atts['title' . $i] : '';
                $button_link = isset($atts['button_link' . $i]) ? $atts['button_link' . $i] : '';
                $image_url = '';
                if (!empty($image)) {
                    $attachment_image = wp_get_attachment_image_src($image, 'full');
                    $image_url = $attachment_image[0];
                }
                ?>
                <div class="zo-fancybox-item <?php echo esc_attr($atts['item_class']); ?>">
                    <div class="zo-fancybox-inner">
                        <?php if ($image_url): ?>
                            <div class="zo-fancybox-image">
                                <img src="<?php echo esc_attr($image_url); ?>" alt=""/>
                            </div>
                        <?php else: ?>
                            <div class="zo-fancybox-content-icon">
                                <i class="<?php echo esc_attr($icon); ?>" style="color: <?php echo esc_attr($zo_fancybox_icon_color); ?>;"></i>
                            </div>
                        <?php endif; ?>
                        <?php if ($title): ?>
                            <div class="zo-fancybox-content-title">
                                <<?php echo esc_attr($zo_title_size); ?> class="zo-fancybox-title" style="color: <?php echo esc_attr($zo_fancybox_title_color); ?>;"> <?php echo apply_filters('the_title', $title); ?></<?php echo esc_attr($zo_title_size); ?>>
                            </div>
                        <?php endif; ?>
                        <?php if( $content) : ?>
                            <div class="zo-fancybox-content" style="color: <?php echo esc_attr($zo_fancybox_content_color); ?>;">
                                <?php echo apply_filters('the_content', $content); ?>
                            </div>
                        <?php endif ;?>

                        <?php if($atts['button_text']!=''):?>
                            <div class="zo-fancyboxes-readmore">
                                <?php
                                $class_btn = ($atts['button_type']=='button')?'btn btn-large':'';
                                ?>
                                <a href="<?php echo esc_url($button_link);?>" class="<?php echo esc_attr($class_btn);?>"><?php echo esc_attr($atts['button_text']);?></a>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
                <?php endif; ?>
            <?php endfor; ?>
        </div>
    </div>
</div>