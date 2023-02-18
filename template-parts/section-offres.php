<section class="bg-gradient-pink text-light md:grid md:grid-cols-2 md:relative">
    <div class="md:absolute md:w-1/2 md:h-full md:right-0">
        <img class="w-full md:h-full md:object-cover" src="<?= get_template_directory_uri(); ?>/src/img/photos/img-menu-rejoignez-nous.jpg" alt="">
    </div>
    <div class="container">
        <div class="py-section-mobile xl:w-5/6">
            <h2 class="text-xl sm:text-2xl font-extrabold"><?php _e('Envie de rejoindre l’équipe ?', 'acsep'); ?></h2>
            <p class="my-6"><?php _e('Vous souhaitez booster votre carrière entouré de collègues bienveillants et passionnés ? Consultez nos offres du moment ou envoyez-nous votre candidature spontanée.', 'acsep'); ?></p>
            <a href="<?php echo get_post_type_archive_link( 'offres-emploi' ); ?>" class="btn-primary white mt-2"><?php _e('Découvrez nos offres d’emploi', 'acsep'); ?></a>
        </div>
    </div>
</section>