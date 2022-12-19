<section class="section-contact py-section-mobile lg:py-12">
    <div class="container relative md:flex md:flex-row-reverse md:items-center md:justify-center">
        <div class="img -mt-36 md:mt-0 lg:w-1/3">
            <img class="" src="<?= get_template_directory_uri() ?>/src/img/illus/illu-contact.png" alt="Contact ACSEP">
        </div>
        <div class="lg:w-1/3">
            <h2 class="section-title"><?php _e('Parlons-nous !', 'acsep'); ?></h2>
            <p class="text-lg mt-4"><?php _e('Contactez-nous pour étudier ensemble la solution qui correspond le mieux à vos objectifs.', 'acsep'); ?></p>
            <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'contact' )->ID)); ?>" class="btn-primary white mt-6"><?php _e('Contactez-nous', 'acsep'); ?></a>
        </div>
    </div>
</section>