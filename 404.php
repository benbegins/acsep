<?php 
get_header(); 
?>

    <div class="page-404">
        
    
        <section class='py-section-mobile lg:py-section relative'>
            <div class="container pt-6 lg:pt-section flex flex-col-reverse lg:flex-row lg:items-center">

                <div class="lg:w-7/12">
                    <img class="rounded-xl w-full saturate-50 opacity-75" src="<?= get_template_directory_uri(  ); ?>/src/img/photos/404.gif" alt="404">
                </div>
                
                <div class="text-center mb-12 lg:w-5/12 lg:px-12 lg:mb-0">
                    <h1 class="font-extrabold text-[8rem] leading-none lg:text-[13vw]">404</h1>
                    <p class="text-lg my-6 lg:w-2/3 lg:mx-auto"><?php _e('Oups ! La page que vous avez demandée n’existe pas…', 'acsep'); ?></p>
                    <div><a href="<?= pll_home_url( ); ?>" class="btn-secondary"><?php _e('Retour à la page d’accueil', 'acsep'); ?></a></div>
                    <?php 
                    $args = array(
                        'post_type'=>'solutions',
                        'name'=>'wms-izypro'
                    );
                    $izypro = get_posts( $args )[0];
                    // Check if post exist in current language
                    if(pll_get_post($izypro->ID)):
                    ?>
                    <div class="mt-3"><a href="<?= get_the_permalink(pll_get_post($izypro->ID)); ?>" class="btn-secondary"><?php _e('Découvrez notre WMS IzyPro', 'acsep'); ?></a></div>
                    <?php endif; ?>
                    <div class="mt-3">
                        <a class="btn-secondary" href="<?php echo get_post_type_archive_link( 'services' ); ?>"><?php _e('Découvrez nos services', 'acsep'); ?></a>
                    </div>
                </div>


            </div>
        </section>
        
    </div>

<?php get_footer(); ?>