 
 <?php 
 global $smof_data, $zo_meta; 
 if ($smof_data['enable_footer_top'] =='1'): ?>
    <div id="zo-footer-top" class="clearfix">
        <?php if(is_active_sidebar('footer-top-vesion-two-restaurant')): ?>
        <div class="zo-restaurant-footer">
            <div class="container">
                <?php dynamic_sidebar('footer-top-vesion-two-restaurant'); ?>
            </div>
        </div>
         <?php endif; ?>
        <div class="container">
            <div class="row">
                <?php if (is_active_sidebar('footer-top-vesion-two')) : ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 footer-first"><?php dynamic_sidebar('footer-top-vesion-two'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php
    if ($smof_data['enable_footer_bottom'] =='1'): ?>

    <div id="zo-footer-bottom" class="clearfix">
         <div class="container">
             <div class="row">
                 <?php if (is_active_sidebar('footer-bottom-vesion-two')) : ?>
                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bottom-first"><?php dynamic_sidebar('footer-bottom-vesion-two'); ?></div>
                 <?php endif; ?>
                
             </div>
         </div>
    </div>
    <?php endif;?>
    