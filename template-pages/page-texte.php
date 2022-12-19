<?php 
/*
Template Name: Page texte
*/
get_header(); 
?>

    <div class="page-texte">
        
    
        <section class='py-section-mobile lg:py-section relative'>
            <div class="container pt-12 lg:pt-16">


                <div class="lg:w-1/2 lg:mx-auto">
                    <h1 class="fade text-2xl font-extrabold mb-12 mt-4"><?php the_title(); ?></h1>
                    <div class="fade texte-enrichi accroche" data-delay="0.1">
                        <?php
                        the_content();
                        ?>
                    </div>
                </div>


            </div>
        </section>


        <!-- Contact -->
        <?php 
        get_template_part( 'template-parts/section-contact-sm' );
        ?>
        
    </div>

<?php get_footer(); ?>