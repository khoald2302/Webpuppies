<?php
/**
 * Template Name: Blog Timeline
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 * @author ZoTheme
 */

get_header(); ?>
<?php  
$year = date('Y');
global $wpdb;
$months = $wpdb->get_col("SELECT DISTINCT MONTH(post_date) FROM $wpdb->posts WHERE     post_status = 'publish' AND YEAR(post_date) = '".$year."'  ORDER BY post_date ASC");
?>

<div id="page-front-page">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="content" role="main">

                <div class="timeline-wrapper clearfix">
                <ul class="timeline">
                    <?php  foreach($months as $month) : ?>
                    <li> <div class="tldate border-radius"><?php echo date( 'F Y', mktime(0, 0, 0, $month) );?></div> </li>
                        <?php 
                        $args  = array(
                            'post_type'=>'post',
                            'MONTH(post_date)'=>$month,
                            'relation' => 'AND',
                            'orderby' => 'post_date', 
                            'order' => 'ASC',
                            'year' => $year, 
                            
                        );
                    
                        ?>
                        <?php $loop = new WP_Query( $args );?>
                   
                    
                   
<?php 
                       /*  $theids = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_type='post' AND post_status = 'publish' AND MONTH(post_date)= '".$month."' AND YEAR(post_date) = '".$year."' ORDER BY post_date ASC");*/
                        ?>
                        <?php 
                        $i =0;
                         while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <li class="<?php if($i%2==0) {echo "left";} else {echo "right";}?>">
                                <div class="tl-circ"></div>
                                <div class="timeline-panel">
                                    <div class="item">
                                        <?php  get_template_part( 'single-templates/content/content', get_post_format() ); ?>
                                    </div>
                                </div>
                            </li>
                        <?php
                            $i++; ?>
                        <?php endwhile; ?>
                         <?php wp_reset_query(); ?>
                    <?php endforeach; ?>
                </ul>
</div>
           <?php
                        /* Include the post format-specific template for the content. If you want to
                         * this in a child theme then include a file called called content-___.php
                         * (where ___ is the post format) and that will be used instead.
                         */
                      //  get_template_part( 'single-templates/content/content', get_post_format() );
                 ?>
                    
                    <?php zo_paging_nav(); ?>
                    
               
                
                </div><!-- #content -->
            </div><!-- #primary -->
            
        </div>
    </div>
</div>
<?php get_footer(); ?>