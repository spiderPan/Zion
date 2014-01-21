<?php get_header(); ?>


<?php 
while(have_posts()) : the_post();
$page_heading      =  get_the_title($post->ID);
//$heading_highlight =  get_post_meta( $pag->ID,'heading_highlight',true); 
?>

<section id="portfolio-singa" class="band page top-space" style="background: #FFF " data-200="" data-450="">
    <section class="container-fluid">
    <div class="row-fluid">
        <section class="container">

            <div class="welcome row">
                <article class="span9">
                    <h1 class="text-left promo-caps"><?php the_title(); ?></h1>
                </article>
                <article class="span3">
                    <p class="text-right promo-text"></p>
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