<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Zo ZAP already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
get_header(); ?>
<div class="container">
    <div class="row">
        <section id="primary" class="row">
            <div id="content" role="main">

            <?php if ( have_posts() ) : ?>
            <div class="row">
                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();
                
                    ?>
                   
                
                    <?php 
                    /* Include the post format-specific template for the content. If you want to
                     * this in a child theme then include a file called called content-___.php
                     * (where ___ is the post format) and that will be used instead.
                     * 
                     */
                     if(get_post_type( get_the_ID())== 'portfolio'){
                          get_template_part( 'single-templates/portfolio/content-style3', get_post_format() );
                     }else  {
                        get_template_part( 'single-templates/archive/content', get_post_format() );
                     }
                   
                    ?>
                  
                    <?php

                endwhile;
                ?>
                </div>
                <?php
                if(get_post_type( get_the_ID())== 'portfolio'){
                   ?>
                    <div class="clearfix portfolio-button text-center">
                      <a href="#" title="" class="btn btn-primary border-radius btn-lg"><?php echo esc_html_e( 'View all Items', 'creativ' ); ?></a>
               </div> 
                   <?php
                }else{
                   zo_paging_nav();  
                }
                ?>

            <?php else : ?>
                <?php get_template_part( 'single-templates/content', 'none' ); ?>
            <?php endif; ?>
             
            </div><!-- #content -->
        </section><!-- #primary -->
    </div>
</div>
<div class="single-container">
<?php if (is_active_sidebar('sidebar-content-post')) : ?>
            <div class="container-fluid"><?php dynamic_sidebar('sidebar-content-post'); ?></div>
        <?php endif; ?>
</div>
<?php get_footer(); ?>