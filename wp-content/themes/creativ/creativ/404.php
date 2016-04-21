<?php
    /**
    * The Header template for our theme
    *
    * Displays all of the <head> section and everything up till <div id="main">
    *
    * @package ZoTheme
    * @subpackage Zo Theme
    * @since 1.0.0
    */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php wp_head(); ?>
    </head>
    <?php 
    if($smof_data['404_background']['url']) {
       $class = "zo-error-option-backgound"; 
    }
    ?>
    <body <?php body_class($class); ?> style="background:url(<?php echo esc_attr($smof_data['404_background']['url']);?>);">
        <?php global $smof_data; 

        ?>
        <?php zo_get_page_loading(); ?>
        <div id="page" class="<?php zo_page_class(); ?>">
            <div id="main">
                <div  class="site-content zo-404-page">
                    <div id="content" role="main" class="container">

                        <article id="post-0" class="entry-error404 no-results not-found">
                            <div class="not-found">
                                <h1><?php _e('OOPS', 'creativ'); ?></h1>
                                <p><?php _e('It looks like that page no longer exists. Would you like to go to homepage instead?', 'creativ'); ?></p>
                                <div class="col-lg-12 col-lg-offset-0 col-md-10 col-md--1">
                                   <div class="zo-searchform clearfix">
                                    <?php get_search_form(); ?>
                                   </div>
                                    <div class="social-icons">
                                        <span>
                                            <a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="Facebook" href="<?php echo esc_url($smof_data['404_link_facebook']);?>" data-original-title="" title="" aria-describedby="tooltip865144"><i class="fa fa-facebook"></i></a>
                                        </span>
                                        <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="Google Plus" href="<?php echo esc_url($smof_data['404_link_google']);?>" data-original-title="" title=""><i class="fa fa-google-plus"></i></a></span>
                                        <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="Twitter" href="<?php echo esc_url($smof_data['404_link_twitter']);?>" data-original-title="" title=""><i class="fa fa-twitter"></i></a></span>
                                        <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="Dribbble" href="<?php echo esc_url($smof_data['404_link_dribbble']);?>" data-original-title="" title=""><i class="fa fa-dribbble"></i></a></span>
                                        <span><a data-rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="bottom" data-title="Pinterest" href="<?php echo esc_url($smof_data['404_link_pinterest']);?>" data-original-title="" title=""><i class="fa fa-pinterest"></i></a></span>
                                    </div>
                                </div>
                            </div>
                          

                        </article><!-- #post-0 -->

                    </div><!-- #content -->
                      <?php if($smof_data['404_page_option'] == "1") : ?>
                            <section class="social-section nopadding clearfix">
                                <div class="row-fluid">
                                    <div class="social col-md-3 col-sm-6 col-xs-6 social-facebook-bg">
                                        <a href="<?php echo esc_url($smof_data['404_link_facebook']);?>"><i class="fa fa-facebook fa-2x"></i></a>
                                    </div>
                                    <div class="social col-md-3 col-sm-6 col-xs-6 social-google-plus-bg">
                                        <a href="<?php echo esc_url($smof_data['404_link_google']);?>"><i class="fa fa-google-plus fa-2x"></i></a>
                                    </div>
                                    <div class="social col-md-3 col-sm-6 col-xs-6 social-dribbble-bg">
                                        <a href="<?php echo esc_url($smof_data['404_link_dribbble']);?>"><i class="fa fa-dribbble fa-2x"></i></a>
                                    </div>
                                    <div class="social col-md-3 col-sm-6 col-xs-6 social-twitter-bg">
                                        <a href="<?php echo esc_url($smof_data['404_link_twitter']);?>"><i class="fa fa-twitter fa-2x"></i></a>
                                    </div>
                                </div>
                            </section>
                            <?php endif; ?>
                </div><!-- #primary -->
            </div><!-- #main -->
        </div><!-- #page -->
        <?php wp_footer(); ?>
    </body>
</html>