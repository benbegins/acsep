<?php 
/*
Template Name: Témoignages
*/
get_header(); 
?>

    <div class="page-temoignages">
        
    
         <!-- Hero -->
         <section class='py-section-mobile lg:py-section relative'>
            <div class="container pt-section-mobile lg:pt-section">
                <h1 class="fade font-extrabold text-xl sm:text-2xl lg:text-3xl lg:w-2/3 xxl:w-1/2" data-translate="2">
                    <?php the_title(); ?>
                </h1>
                <p class="fade text-lg mt-6 lg:w-1/2" data-translate="2" data-delay="0.1"><?php _e('Nos collaborateurs ont du talent.', 'acsep'); ?></p>
            </div>
        </section>


        <!-- Liste vidéos -->
        <section class='fade pb-section-mobile lg:pb-section relative'>
            <div class="container">
                <ul class="md:grid md:grid-cols-2 md:gap-x-6 md:gap-y-12 lg:grid-cols-3 lg:gap-x-8 lg:gap-y-16">
                    <?php 
                    if(have_rows('videos')):
                        while(have_rows('videos')):
                            the_row();
                            
                            $video = get_sub_field('lien_youtube');
                            $collaborateur = get_sub_field('collaborateur');
                            $poste = get_sub_field('poste');
                    ?>

                    <li class="mb-12 md:mb-0">
                        <div>
                            <div class="iframe-container"><?= $video; ?></div>
                        </div>
                        <h2 class="font-extrabold text-xl text-pink mt-4"><?= $collaborateur; ?></h2>
                        <p><?= $poste; ?></p>
                    </li>

                    <?php 
                        endwhile;
                    endif;
                    ?>
                </ul>
            </div>
        </section>

        <?php 
        get_template_part( '/template-parts/section-offres' );
        ?>


    </div>

<?php get_footer(); ?>