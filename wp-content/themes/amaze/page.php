<?php get_header(); ?>


<?php 
while(have_posts()) : the_post();
$page_heading      =  get_the_title($post->ID);
$heading_highlight =  get_post_meta( $post->ID,'heading_highlight',true); 
 global $smof_data;
?>

<section id="single-page" class="band  top-space " style="background: #FFF; padding-bottom:30px;">
    <section class="container-fluid">
    <div class="row-fluid">
        <section class="container">

            <div class="welcome row">
                <article class="span4">
                    <h1 class="text-left promo-caps"><?php the_title(); ?></h1>
                </article>
                <article class="span8">
                    <p class="text-right promo-text"><?php if($smof_data['hh_switch'] == '1'){echo $heading_highlight;} ?></p>
                </article>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div>
            </div><!--/ row-->


            <?php the_content();?>

           

        </section><!--/ container-->        
    </div><!--/ row-fluid-->    
    </section>
</section><!--/ band-->


<?php 
endwhile;
get_footer(); ?>