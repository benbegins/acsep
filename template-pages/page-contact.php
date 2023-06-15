<?php 
/*
Template Name: Page Contact
*/
get_header(); 
?>

    <div class="page-contact">
        
    
        <!-- main -->
        <section class='py-section-mobile lg:py-section relative'>
            <div class="container lg:flex pt-section-mobile lg:pt-section">
                <div class="lg:w-7/12">
                    <h1 class="fade font-extrabold text-2xl lg:text-3xl lg:w-4/5" data-translate="2">
                        <?php the_field('titre'); ?>
                    </h1>
                    <div class="fade text-lg my-6 lg:w-4/5" data-translate="2" data-delay="0.1"><?php the_field('chapeau'); ?></div>
                    <div class="fade lg:w-4/5" data-translate="2" data-delay="0.15"><?php the_field('paragraphe'); ?></div>
                </div>
                <?php if(get_field('formulaire')): ?>
                <div class="fade bg-gradient-pink text-light rounded-xl p-6 lg:px-12 lg:py-8 my-12 lg:my-0 lg:w-5/12" data-duration="2">
                    <?= do_shortcode(get_field('formulaire')); ?>
                    <p class="text-sm opacity-50"><?php _e('Conformément à la Loi Informatique et Libertés, vous disposez d’un droit d’accès, de rectification, de modification et de suppression des données qui vous concernent pour en savoir plus,', 'acsep'); ?> <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'politique-de-confidentialite' )->ID)); ?>"><?php _e('cliquez ici', 'acsep'); ?></a>.</p>
                </div>
                <?php endif; ?>
            </div>
        </section>



        <!-- Map -->
        <section class='pb-section-mobile lg:pb-section'>
            <div class="container lg:grid lg:grid-cols-2 lg:gap-8">
                <!-- France -->
                <div class="bg-[#F8F9FA] shadow-lg rounded-lg overflow-hidden border-b-8 border-pink mb-12 lg:mb-0">
                    <a href="https://www.google.fr/maps/place/ACSEP/@43.4894781,5.3374429,17z/data=!3m1!4b1!4m5!3m4!1s0x12c9edbce796eb7b:0x3c870e05aa94cdb9!8m2!3d43.4894781!4d5.3395388" target="_blank">
                        <div class="img-transition relative w-full h-0 pb-[40%] overflow-hidden cursor-pointer">
                            <img src="<?= get_template_directory_uri(); ?>/src/img/illus/map-france.png" alt="Google map France" class="absolute w-full h-full object-cover">
                        </div>
                    </a>
                    <div class="py-8 px-6 md:grid md:grid-cols-2">
                        <h2 class="font-extrabold text-xl mb-3"><?php _e('Groupe ACSEP', 'acsep'); ?></h2>
                        <div>
                            <p class="mb-3"><?php _e('Siège social', 'acsep'); ?>  <br>
                                Bâtiment A - Parc Cézanne 1 <br>
                                380 avenue Archimède <br>
                                13857 Aix-en-Provence Cedex 3 <br>
                                France</p>
                            <p>Tel. : +33 (0) 4 42 50 96 48</p>
                        </div>
                    </div>
                </div>
                <!-- Espagne -->
                <div class="bg-[#F8F9FA] shadow-lg rounded-lg overflow-hidden border-b-8 border-pink">
                    <a href="https://goo.gl/maps/mrTyAnrWczZrfH97A" target="_blank">
                        <div class="img-transition relative w-full h-0 pb-[40%] overflow-hidden cursor-pointer">
                            <img src="<?= get_template_directory_uri(); ?>/src/img/illus/map-spain.png" alt="Google map France" class="absolute w-full h-full object-cover">
                        </div>
                    </a>
                    <div class="py-8 px-6 md:grid md:grid-cols-2">
                        <h2 class="font-extrabold text-xl mb-3"><?php _e('ACSEP Iberia', 'acsep'); ?></h2>
                        <div>
                            <p class="mb-3">Calle Anabel Segura, 10<br>
                                3ª Planta <br>
                                28108 Alcobendas <br>
                                Madrid <br>
                                Spain</p>
                            <p>Tel. : +34 912 844 369</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        


        
    </div>

<?php get_footer(); ?>