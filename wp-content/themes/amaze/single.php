<?php get_header(); ?>


<?php 
while(have_posts()) : the_post();
$page_heading      =  get_the_title($post->ID);
//$heading_highlight =  get_post_meta( $pag->ID,'heading_highlight',true); 
?>

<section id="blog-signle" class="band page top-space" style="background: #FFF " data-200="" data-450="">

 <section class="container-fluid pad-bottom-main full-bg">
                <div class="row-fluid">
                    <section class="container">
                        <div class="row add-top add-bottom-half">
                            <article class="span9 blog-block">
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
                                <section class="add-bottom">
                                    <h2 class="blog-caps"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                     <?php if(has_post_thumbnail()): the_post_thumbnail( 'full', array( 'class' => "", ) ); endif; ?>
                                    <div class="blog-stats">
                                        <h5 class="blog-date"><?php the_date() ?></h5>
                                        <h5 class="blog-author"><?php the_author(); ?></h5>
                    <h5 class="blog-category"><?php 
                                            $post_categories = get_the_category();
                                            $c    = array_shift($post_categories);
                                            $cats = $c->cat_name;
                                            if (count($post_categories) > 0 ) 
                                            {
                                              foreach( $post_categories as $c ) 
                                              {
                                                $cats .=  ', '.$c->cat_name;
                                              }
                                            }
                                            printf( __( $cats ));?></h5>
                    <h5 class="blog-comments"><a href="#"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a></h5>
                  </div>
                  <div class="blog-para"><?php the_content(); ?></div>
                         <?php  the_tags(); ?>  
                     </section>



                                <!-- Comments View -->
                                <div class="comments">
                                      <?php comments_template(); ?>   
                                </div>



                                
                            </article><!-- left-side : ends-->

                            <article class="span3 blog-block">
                             <?php get_sidebar('aura_side'); ?>
                            </article><!-- right-side : ends-->

                            
                        </div><!-- row : ends -->

                    </section><!-- container : ends -->
                </div><!-- row-fuild : ends -->
            </section> <!-- container-fluid : ends-->







</section><!--/ band-->


<?php 
endwhile;
get_footer(); ?>