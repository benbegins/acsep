<?php 
get_header(); 
?>

    <div class="page-404">
        
    
        <section class='py-section-mobile lg:py-section relative'>
            <div class="container pt-6 lg:pt-section flex flex-col-reverse lg:flex-row lg:items-center">

                <div class="lg:w-7/12">
                    <img class="rounded-xl w-full" src="<?= get_template_directory_uri(  ); ?>/src/img/photos/404.jpg" alt="404">
                </div>
                
                <div class="text-center mb-12 lg:w-5/12 lg:px-12 lg:mb-0">
                    <h1 class="font-extrabold text-[8rem] leading-none lg:text-[13vw]">404</h1>
                    <p class="text-lg my-6 lg:w-2/3 lg:mx-auto"><?php _e('Oups ! La page que vous avez demandée n’existe pas…', 'acsep'); ?></p>
                    <a href="<?= get_site_url( ); ?>" class="btn-secondary"><?php _e('Retour à la page d’accueil', 'acsep'); ?></a>
                </div>


            </div>
        </section>
        
    </div>

<?php get_footer(); ?>