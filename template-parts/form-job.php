<?php
isset($args['title']) ? $title = $args['title'] : $title = __('Candidature spontanée', 'acsep');
isset($args['title']) 
    ? $subtitle = __('Postulez à cette offre et rejoignez une entreprise et une équipe à taille humaine !', 'acsep')
    : $subtitle = __('Une réponse sera apportée à toutes les demandes.', 'acsep');


switch (pll_current_language()) {
    case 'fr':
        $form = get_field('form_job_fr', 'option');
        break;
    
    case 'en':
        $form = get_field('form_job_en', 'option');
        break;
    
    case 'es':
        $form = get_field('form_job_es', 'option');
        break;
    
    default:
        $form = null;
        break;
}

if($form):
?>
<section class="form-job bg-gradient-pink text-light py-section-mobile lg:py-section" id="form-candidature">
    <div class="container">
        <h2 class="text-center font-extrabold text-xl lg:text-2xl lg:w-1/2 lg:mx-auto"><?= $title; ?></h2>
        <div class="lg:w-1/3 lg:mx-auto">
            <p class="text-center text-lg mb-6 mt-3"><?= $subtitle; ?></p>
            <?= do_shortcode($form); ?>
            <p class="text-sm opacity-50"><?php _e('Conformément à la Loi Informatique et Libertés, vous disposez d’un droit d’accès, de rectification, de modification et de suppression des données qui vous concernent pour en savoir plus,', 'acsep'); ?> <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'politique-de-confidentialite' )->ID)); ?>"><?php _e('cliquez ici', 'acsep'); ?></a>.</p>
        </div>
    </div>
</section>
<?php endif; ?>