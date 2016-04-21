<div class="zo-progress-wraper zo-progress-layout-default <?php echo esc_attr($atts['template']); ?>"
     id="<?php echo esc_attr($atts['html_id']); ?>">
    <div class="zo-progress-body">
        <?php
        $item_class = 'zo-progress-item-wrap';
        $item_title = $atts['item_title'];
        $icon = $atts['icon'];
        $show_value = $atts['show_value'];
        $value = $atts['value'];
        $value_suffix = $atts['value_suffix'];
        $bg_color = $atts['bg_color'];
        $bg_linear_gradient = (!empty($atts['bg_linear_gradient'])) ? $atts['bg_linear_gradient'] : "";
        $gb_color_1 = (!empty($atts['gb_color_1'])) ? $atts['gb_color_1'] : "";
        $gb_color_2 = (!empty($atts['gb_color_2'])) ? $atts['gb_color_2'] : "";
        $color = $atts['color'];
        $width = $atts['width'];
        $height = $atts['height'];
        $zo_layout = isset($atts['zo_layout']) ? $atts['zo_layout'] :''  ;
        $border_radius = $atts['border_radius'];
        $vertical = ($atts['mode'] == 'vertical') ? true : false;
        $striped = ($atts['striped'] == 'yes') ? true : false;
        $zo_progress_custom_icon = isset($atts['zo_progress_custom_icon']) ? $atts['zo_progress_custom_icon'] : NULL ;
        $zo_progress_icon_color = isset($atts['zo_progress_icon_color']) ? $atts['zo_progress_icon_color'] : 'inherit';
        $zo_progress_icon_font_size = isset($atts['zo_progress_icon_font_size']) ? $atts['zo_progress_icon_font_size'] : 'inherit';
        $uqid = uniqid();
        ?>
        <div id="zo-progress-<?php echo esc_attr($uqid); ?>" class="<?php echo esc_attr($item_class); ?>">
            <style type="text/css" scoped>
                #zo-progress-<?php echo esc_attr($uqid); ?> .zo-progress-main .zo-progress .progress-bar span:before {
                    border-color: <?php echo esc_attr($color);?> transparent transparent;
                }
            </style>
            <div class="zo-progress-main <?php if ($icon) { echo esc_attr($icon); } ?>">
               
                <div class="zo-progress progress <?php if ($vertical) {
                    echo ' vertical bottom';
                } ?> <?php if ($striped) {
                    echo ' progress-striped';
                } ?> 
                    <?php if($zo_layout){ echo esc_attr($zo_layout);}
                    ?>
                     progress-striped active"
                     style="
						background-color:<?php echo esc_attr($bg_color); ?>;
                        width:<?php echo esc_attr($width); ?>;
                        height:<?php echo esc_attr($height); ?>;
                        border-radius:<?php echo esc_attr($border_radius); ?>;
                        position: relative;
                     ">
                    <div 
						id="item-<?php echo esc_attr($atts['html_id']); ?>" 
						class="progress-bar" 	
						role="progressbar"
						data-valuetransitiongoal="<?php echo esc_attr($value); ?>"
						style="
						<?php 
							if($bg_linear_gradient == 'true'){
								echo '
									background-color: '.esc_attr($gb_color_1).';
									background-image: -webkit-gradient(linear, left top, left bottom, from('.esc_attr($gb_color_1).'), to('.esc_attr($gb_color_2).'));
									background-image: -webkit-linear-gradient(top, '.esc_attr($gb_color_1).', '.esc_attr($gb_color_2).');
									background-image:    -moz-linear-gradient(top, '.esc_attr($gb_color_1).', '.esc_attr($gb_color_2).');
									background-image:     -ms-linear-gradient(top, '.esc_attr($gb_color_1).', '.esc_attr($gb_color_2).');
									background-image:      -o-linear-gradient(top, '.esc_attr($gb_color_1).', '.esc_attr($gb_color_2).');
									background-image:         linear-gradient(top, '.esc_attr($gb_color_1).', '.esc_attr($gb_color_2).');
									filter:            progid:DXImageTransform.Microsoft.gradient(startColorStr='.esc_attr($gb_color_1).', endColorStr='.esc_attr($gb_color_2).');
								';
							}else{
								echo 'background-color: ' . esc_attr($color) . ';';
							}
						?>
						line-height:<?php echo esc_attr($height); ?>;">
                        <?php if ($item_title): ?>
                            <div class="zo-progress-title">
                                <?php echo apply_filters('the_title', $item_title); ?>
                            </div>
                        <?php endif; ?>      
                    </div>
                    <?php if ($show_value): ?>
						<span class="zo-progress-bar-counter-wrap">
						  <?php echo esc_attr($value)." ". esc_attr($value_suffix);?>
						</span>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>