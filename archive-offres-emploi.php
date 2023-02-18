<?php 
get_header(); 
?>

    <div class="page-offres-emploi">
        
    
         <!-- Hero -->
         <section class='py-section-mobile lg:py-section relative'>
            <div class="container pt-section-mobile lg:pt-section">
                <h1 class="fade font-extrabold text-xl sm:text-2xl lg:text-3xl lg:w-2/3 xxl:w-1/2" data-translate="2">
                    <?php _e('Nos offres du moment', 'acsep') ?>
                </h1>
                <p class="fade text-lg my-6 lg:w-1/2" data-translate="2" data-delay="0.1"><?php _e('Nous assemblons l’équipe la plus innovante en matière de logistique pour réinventer la façon dont le monde bouge.', 'acsep'); ?></p>
                <p class="fade lg:w-1/2" data-translate="2" data-delay="0.15"><?php _e('Prêt.e à faire avancer votre carrière au sein d’une équipe collaborative et passionnée ? Consultez nos offres du moment ou envoyez-nous votre candidature spontanée.', 'acsep'); ?></p>
                <div class="fade" data-translate="2" data-delay="0.2"><a href="#" class="btn-primary mt-8"><?php _e('Candidature spontanée', 'acsep'); ?></a></div>
            </div>
        </section>


        <!-- Liste offres -->
        <section class='fade pb-section-mobile lg:pb-section relative' data-delay="0.5">
            <div class="container">
                <div class="border-t border-gray">
                    <?php
                    if(have_posts()){
                        while(have_posts()){
                            the_post();
                            get_template_part( '/template-parts/item-offre-emploi' );
                        }
                    } else {
                    ?>

                    <div class="pt-section-mobile lg:pt-section text-center">
                        <p class="text-lg font-extrabold"><?php _e('Aucune offre d\'emploi pour le moment.', 'acsep'); ?></p>
                        <p><?php _e('Vous pouvez néanmoins nous envoyer une candidature spontanée.', 'acsep'); ?></p>
                    </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>

        <!-- Candidature Spontanée -->
        <?php get_template_part('/template-parts/form-job'); ?>


    </div>

<?php get_footer(); ?>