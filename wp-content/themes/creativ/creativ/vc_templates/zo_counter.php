
<div class="zo-counter-wraper zo-counter-layout-default <?php echo esc_attr($atts['template']); ?>"
     id="<?php echo esc_attr($atts['html_id']); ?>">
    <?php if ($atts['title'] != ''): ?>
        <div class="zo-counter-head">
            <div class="zo-counter-title">
                <?php echo apply_filters('the_title', $atts['title']); ?>
            </div>
            <div class="zo-counter-description">
                <?php echo apply_filters('the_content', $atts['description']); ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="row zo-counter-body">
        <?php
        for ($i = 1; $i <= (int)$atts['zo_cols']; $i++) { ?>
            <?php
            $title = isset($atts['title' . $i]) ? $atts['title' . $i] : '';
            $icon = isset($atts['icon' . $i]) ? $atts['icon' . $i] : '';
            $type = isset($atts['type' . $i]) ? $atts['type' . $i] : '';
            $suffix = isset($atts['suffix' . $i]) ? $atts['suffix' . $i] : '';
            $prefix = isset($atts['prefix' . $i]) ? $atts['prefix' . $i] : '';
            $digit = isset($atts['digit' . $i]) ? $atts['digit' . $i] : '60';
            $grouping = isset($atts['grouping']) ? $atts['grouping'] : 'false';
            $separator = isset($atts['separator']) ? $atts['separator'] : ',';
            $description = isset($atts['description' . $i]) ? $atts['description' . $i] : '';
            ?>
            <div class="<?php echo esc_attr($atts['item_class']);?>">
                <div class="zo-counter-inner">
                    <?php if ($icon): ?>
                        <div class="zo-icon"><i class="<?php echo esc_attr($icon); ?>" style="color: <?php echo esc_attr($atts['zo_counter_icon_color']);?>"></i></div>
                    <?php endif; ?>
                    <div class="zo-counter-body">
                        <div id="counter_<?php echo esc_attr($atts['html_id'] . '_item_' . $i);?>"
                             class="zo-counter <?php echo esc_attr(strtolower($type));?>"
                             data-suffix="<?php echo esc_attr($suffix);?>" data-prefix="<?php echo esc_attr($prefix); ?>"
                             data-type="<?php echo esc_attr(strtolower($type));?>"
                             data-digit="<?php echo esc_attr($digit);?>"
                             data-grouping="<?php echo esc_attr($grouping);?>"
                             data-separator="<?php echo esc_attr($separator);?>" style="color: <?php echo esc_attr($atts['zo_counter_text_color']);?>"></div>
                        <?php if ($title): ?>
                            <h3 class="zo-counter-title" style="color: <?php echo esc_attr($atts['zo_counter_title_color']);?>"><?php echo apply_filters('the_title', $title); ?></h3>
                        <?php endif;?>
                        <?php if ($description): ?>
                            <div class="zo-counter-description" style="color: <?php echo esc_attr($atts['zo_counter_content_color']);?>"><?php echo apply_filters('the_content', $description); ?></div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        <?php }
        ?>
    </div>
</div>