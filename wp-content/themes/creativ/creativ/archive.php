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
            <section id="primary">
                <div id="content" role="main" class="container"  >

                    <?php if (have_posts()) : ?>
                        <div class="row">
                            <div class="blog-single-wrap">
                                <div class=" col-xs-12 col-sm-9 col-md-9 col-lg-9">
                                    <div class="blog-title ">
                                        <h2 class="gray"> Featured</h2>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <?php
                                            $args=array(
                                                'post_type'    =>'post',
                                                'orderby'    => 'desc',
                                                'numberposts' => 2,
                                                'showposts'=>2,
                                                'orderby' => 'date',
                                                'order'=>'desc',
                                                'category' => 11

                                            );
                                        global $wp_query;
                                        $args=array_merge($wp_query->query_vars,$args);
                                        $query= new WP_Query($args);
                                       if($query->have_posts()):while($query->have_posts()):$query->the_post();
                                           ?>
                                           <article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser col-lg-6 col-md-6 col-sm-6 col-xs-12'); ?>>
                                           <?php if(has_post_thumbnail()) : ?>
                                               <div class="zo-blog-image">
                                                   <a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_post_thumbnail( $zo_image_size ); ?></a>

                                               </div>
                                               <?php echo sunset_posted_footer();?>
                                           <?php endif ?>

                                           <div class="zo-blog-detail">
                                               <div class="zo-blog-date"> <?php echo get_the_time('l j F  Y'); ?></div>

                                               <h2 class="zo-blog-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a></h2>


                                               <div class="zo-blog-content">
                                                   <?php
                                                   if(get_post_type( get_the_ID() ) != 'page'):
                                                       echo get_excerpt();

                                                   endif;
                                                   wp_link_pages( array(
                                                       'before'      => '<p class="page-links"><span class="page-links-title">' . __( 'Pages:', 'creativ' ) . '</span>',
                                                       'after'       => '</p>',
                                                       'link_before' => '<span>',
                                                       'link_after'  => '</span>',
                                                       'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'creativ' ) . ' </span>%',
                                                       'separator'   => '<span class="screen-reader-text">, </span>',
                                                   ) );
                                                   ?>
                                               </div>
                                               <!--        <a class="btn btn-primary border-radius" title="--><?php //the_title(); ?><!--" href="--><?php //the_permalink() ?><!--" rel="">--><?php //_e('Read More ', 'creativ') ?><!--</a>-->
                                           </div>

                                           </article>
                                           <?php
                                        endwhile; endif;
                                           ?>
                                    </div>


                                    <div class="blog-title  title-latest ">
                                        <h2 class="gray"> Latest</h2>
                                        <hr>
                                    </div>
                                    <div class="row">
                                    <?php
                                    /* Start the Loop */
                                    while (have_posts()) : the_post();

                                        ?>


                                        <?php
                                        /* Include the post format-specific template for the content. If you want to
                                         * this in a child theme then include a file called called content-___.php
                                         * (where ___ is the post format) and that will be used instead.
                                         *
                                         */
                                        if (get_post_type(get_the_ID()) == 'portfolio') {
                                            get_template_part('single-templates/portfolio/content-style3', get_post_format());
                                        } else {
                                            get_template_part('single-templates/archive/content', get_post_format());
                                        }

                                        ?>

                                        <?php

                                    endwhile;
                                    ?>
                                    </div>
                                   <?php zo_paging_nav();?>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                <div class="sidebar-right-blog">
                                    <?php if (is_active_sidebar('sidebar-blog')) : ?>
                                        <div
                                            class="sidebar-right-blog-wrap"><?php dynamic_sidebar('sidebar-blog'); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <?php
                        if (get_post_type(get_the_ID()) == 'portfolio') {
                            ?>
                            <div class="clearfix portfolio-button text-center">
                                <a href="#" title=""
                                   class="btn btn-primary border-radius btn-lg"><?php echo esc_html_e('View all Items', 'creativ'); ?></a>
                            </div>
                            <?php
                        }
                        ?>

                    <?php else : ?>
                        <?php get_template_part('single-templates/content', 'none'); ?>
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