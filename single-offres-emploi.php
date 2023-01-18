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
                    <h1 class="job-title fade text-pink font-extrabold text-xl sm:text-2xl">
                        <?php the_title(); ?>
                    </h1>
                    <div class="fade texte-enrichi accroche mt-12">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </article>


        <!-- Formulaire -->
        <?php 
        $args = array(
            'title' => get_the_title(),
        );
        
        get_template_part('/template-parts/form-job', '', $args); 
        
        ?>


    </div>

<?php get_footer(); ?>