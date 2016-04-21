 
 <?php 
 global $smof_data, $zo_meta; 
 if ($smof_data['enable_footer_top'] =='1'): ?>
    <div id="zo-footer-top" class="zo-footer-top-3">
        <div class="container">
            <div class="row">
                <?php if (is_active_sidebar('footer-vesion-photography')) : ?>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 footer-first"><?php dynamic_sidebar('footer-vesion-photography'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif;?>
   