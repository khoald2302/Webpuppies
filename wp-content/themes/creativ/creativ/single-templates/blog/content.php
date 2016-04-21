<?php 
$sizeimg = get_query_var('zo_image_style');
$sizeimg_timeline = get_query_var('zo_image_style_timeline');
$groups = get_query_var('zo_category_group');

?>
<div class="zo-blog-classic <?php if(!empty($atts['item_class'])){echo esc_attr($atts['item_class']);}?>" >
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
                        $class = ' has-thumbnail';

                            $thumbnail = (!empty($sizeimg)) ?  zo_get_images_style($sizeimg) : zo_post_thumbnail_width($sizeimg_timeline); ;
                    else:
                        $class = ' no-image';
                        $thumbnail = '<img src="'.ZO_IMAGES.'no-image.jpg" alt="'.get_the_title().'" />';
                    endif;
                  
                ?>
             
                    <div class="zo-grid-media <?php echo esc_attr($class);?>">
                       <?php echo  $thumbnail; ?>
                        <div class="zo-blog-overlay"></div>
                        <div class="zo-blog-overlay-inner">
                          <a href="#" title="Like it"> <?php echo  zo_get_post_like(); ?></a>
                          <a href="<?php echo the_permalink(); ?>" title="Permalink to : <?php the_title();?>"><span class="zo-comment"><i class="fa fa-comment-o"></i> <?php echo comments_number('0','1','%'); ?></span></a>
                        </div>
                      </div>
               
                <div class="zo-detail-post">
                    <div class="zo-meta">
                        <span>  <?php echo get_the_term_list( get_the_ID(), 'category', '', ', ', '' ); ?> <?php echo esc_html__( '|', 'creativ' );  the_time(' d-M-Y');?></span> 
                    </div>
                    <div class="zo-grid-title">
                      <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
                     </div>
                     <div class="zo-blog-content"><?php  echo zo_limit_words(strip_tags( get_the_excerpt()),44); ?></div>
                    <a href="<?php the_permalink() ?>" title="" class="btn btn-primary border-radius"><?php echo esc_html_e( 'Read More', 'creativ' ); ?></a>
                </div>
              
</div>    