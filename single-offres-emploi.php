<?php 
get_header(); 
?>

    <div class="page-offres-emploi">
        
    
         <!-- Content -->
         <article class='py-section-mobile lg:py-section relative'>
            <div class="container pt-section-mobile lg:pt-section">
                <a 
                    href="<?php echo get_post_type_archive_link( 'offres-emploi' ); ?>" 
                    class="btn-secondary back mb-6 lg:absolute">
                        <?php _e('Retour aux offres', 'acsep'); ?>
                </a>

                
                <div class="lg:w-1/2 lg:mx-auto">
                    <?php 
                    $labels = get_the_terms( $post->ID, 'jobs_types' ); 
                    if($labels):
                    ?>
                    <div class="fade mb-6 mt-1 lg:mt-0">
                        <?php
                        // var_dump($labels);
                        foreach($labels as $label){
                            echo '<span class="inline-block text-sm border border-pink px-2 py-1 mr-3 rounded-md">' . $label->name . '</span>';
                        }
                        ?>
                    </div>
                    <?php endif; ?>
                    <h1 class="fade text-pink font-extrabold text-xl sm:text-2xl">
                        <?php the_title(); ?>
                    </h1>
                    <div class="fade texte-enrichi accroche mt-12">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </article>


        <!-- Formulaire -->
        <section class='bg-gradient-pink py-section-mobile lg:py-section relative'>
            <div class="container text-light">
                <h2 class="text-xl text-center font-extrabold sm:text-2xl lg:w-1/2 lg:mx-auto"><?php the_title(); ?></h2>
                <div class="mt-6 lg:w-1/3 lg:mx-auto">
                    <h3 class="text-lg text-center"><?php _e('Postulez à cette offre et rejoignez une entreprise et une équipe à taille humaine !', 'acsep'); ?></h3>
                    <div class="form">

                    </div>
                    <p class="text-sm opacity-50 mt-6"><?php _e('Conformément à la Loi Informatique et Libertés, vous disposez d’un droit d’accès, de rectification, de modification et de suppression des données qui vous concernent pour en savoir plus, cliquez ici', 'acsep'); ?></p>
                </div>
            </div>
        </section>


    </div>

<?php get_footer(); ?>