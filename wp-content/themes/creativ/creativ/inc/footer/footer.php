 
 <?php 
 global $smof_data, $zo_meta; 
 if ($smof_data['enable_footer_top'] =='1'): ?>
    <div id="zo-footer-top">
        <div class="container">
            <div class="row">
                <?php if (is_active_sidebar('sidebar-5')) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-first"><?php dynamic_sidebar('sidebar-5'); ?></div>
                <?php endif; ?>
                <?php if (is_active_sidebar('sidebar-6')) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-second"><?php dynamic_sidebar('sidebar-6'); ?></div>
                <?php endif; ?>
                <?php if (is_active_sidebar('sidebar-7')) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-third"><?php dynamic_sidebar('sidebar-7'); ?></div>
                <?php endif; ?>
                <?php if (is_active_sidebar('sidebar-8')) : ?>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-four"><?php dynamic_sidebar('sidebar-8'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif;?>
    <?php if ($smof_data['enable_footer_bottom'] =='1'): ?>
    <div id="zo-footer-bottom">
         <div class="container">
             <div class="row">
                 <?php if (is_active_sidebar('footer-bottom-vesion-one')) : ?>
                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bottom-first"><?php dynamic_sidebar('footer-bottom-vesion-one'); ?></div>
                 <?php endif; ?>
             </div>
         </div>
    </div>
    <?php endif;?>