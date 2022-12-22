<?php 
/*
Template Name: Page RH - Humain
*/
get_header(); 
?>

    <div class="page-rh-humain">
        
    
        <!-- Hero -->
        <section class='pt-section-mobile lg:pt-section relative'>
            <div class="container flex flex-col-reverse lg:pt-section-mobile lg:flex-row lg:items-center">
                <div class="lg:w-5/12">
                    <h1 class="fade font-extrabold text-2xl lg:text-3xl lg:w-4/5" data-translate="2">
                        <?php the_title(); ?>
                    </h1>
                    <p class="fade text-lg my-6 lg:w-4/5" data-translate="2" data-delay="0.1"><?php the_field('accroche'); ?></p>
                    <p class="fade lg:w-4/5" data-translate="2" data-delay="0.15"><?php the_field('intro'); ?></p>
                </div>
                <div class="fade img-hero my-12 lg:my-0 lg:w-7/12" data-duration="2">
                    <?php
                        the_post_thumbnail( 'large' );
                    ?>
                </div>
            </div>
        </section>


        <!-- Section Bloc Text -->
        <?php 
        if(get_field('contenu')):
            foreach(get_field('contenu') as $key=>$bloc):
                $title = $bloc['contenu_titre'];
                $texte = $bloc['contenu_texte'];
        ?>
        <section class='pt-section-mobile lg:pt-section'>
            <div class="container">
                <h2 class="section-title-sm"><?= $title; ?></h2>
                <div class="lg:grid grid-cols-6">
                    <div class="texte-enrichi mt-6 lg:mt-8 lg:col-span-3 lg:col-start-3">
                        <?= $texte; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php 
            endforeach;
        endif; 
        ?>


        <!-- Témoignages -->
        <?php 
        $page_temoignage_id = get_page_by_path( 'mon-job-chez-acsep-temoignages' )->ID;
        $current_language = pll_current_language();
        $page_temoignage_translations = pll_get_post_translations( $page_temoignage_id );

        // Check if page "Temoignage" exists in current language
        if(array_key_exists($current_language, $page_temoignage_translations)):
        ?>
        <section class="bg-lines py-section-mobile lg:py-section">
            <div class="container">
                <div class="text-center lg:w-1/2 lg:mx-auto">
                    <p class="text-lg font-extrabold italic mb-6"><?php _e('Enfin, nous avons voulu mettre à l’honneur nos collaboratrices et collaborateurs à travers notre série “Les Talents d’ACSEP”.', 'acsep'); ?></p>
                    <a href="<?php echo get_the_permalink(pll_get_post($page_temoignage_id)); ?>" class="btn-primary"><?php _e('Découvrez nos talents', 'acsep'); ?></a>
                </div>
            </div>
        </section>
        <?php else: ?>
        <section class="pt-section-mobile lg:pt-section"></section>
        <?php endif; ?>



        <!-- Offres d'emploi -->
        <?php 
        $args= array(
            'post_type'=>'offres-emploi',
        );
        $offres = new WP_Query($args);
        if($offres->posts){
            get_template_part( '/template-parts/section-offres' );
        }
        ?>



        <!-- Egalite -->
        <?php 
        $egalite = get_field('egalite');
        if($egalite):
        ?>
        <section class="py-section-mobile lg:py-section">
            <div class="container lg:grid lg:grid-cols-2 lg:items-center">
                <div class="xl:w-5/6">
                    <h2 class="text-xl font-extrabold mb-6"><?php _e('Index égalité Femmes - Hommes', 'acsep'); ?></h2>
                    <p><?= $egalite['description']; ?></p>
                </div>
                <div class="mt-12 lg:mt-0">
                    <div class="bg-gradient-pink text-light text-center py-12 lg:py-section rounded-xl">
                        <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="99.464" height="91.002" viewBox="0 0 99.464 91.002">
                            <defs>
                                <clipPath id="clip-path">
                                <rect id="Rectangle_706" data-name="Rectangle 706" width="99.464" height="91.002" fill="none" stroke="#f8f9fa" stroke-width="3"/>
                                </clipPath>
                            </defs>
                            <g id="Groupe_1132" data-name="Groupe 1132" transform="translate(0 2.515)">
                                <g id="Groupe_de_masques_1131" data-name="Groupe de masques 1131" transform="translate(0 -2.515)" clip-path="url(#clip-path)">
                                <path id="Tracé_2232" data-name="Tracé 2232" d="M0,64.94V54.727" transform="translate(49.732 -2.125)" fill="none" stroke="#f8f9fa" stroke-width="3"/>
                                <path id="Tracé_2224" data-name="Tracé 2224" d="M124.8,165.95v5.264a7.97,7.97,0,0,0-2.124-.289H108.265a7.97,7.97,0,0,0-2.124.289V165.95a7,7,0,0,1,7-7H117.8A7,7,0,0,1,124.8,165.95Z" transform="translate(-65.739 -96.135)" fill="none" stroke="#f8f9fa" stroke-linejoin="round" stroke-width="3"/>
                                <path id="Tracé_2225" data-name="Tracé 2225" d="M121.19,198.3v4.9H91v-4.9a7.878,7.878,0,0,1,7.887-7.887H113.3a7.878,7.878,0,0,1,7.887,7.887Z" transform="translate(-56.362 -115.62)" fill="none" stroke="#f8f9fa" stroke-linejoin="round" stroke-width="3"/>
                                <path id="Tracé_2227" data-name="Tracé 2227" d="M56.331,38.9h0a11.676,11.676,0,0,1-9.574-4.993l-3.633-5.2a11.675,11.675,0,0,0-9.574-4.993h-22.9" transform="translate(-6.599 14.202)" fill="none" stroke="#f8f9fa" stroke-linejoin="round" stroke-width="3"/>
                                <path id="Tracé_2229" data-name="Tracé 2229" d="M130.651,38.9h0a11.676,11.676,0,0,0,9.574-4.993l3.633-5.2a11.675,11.675,0,0,1,9.574-4.993h22.9" transform="translate(-80.919 14.202)" fill="none" stroke="#f8f9fa" stroke-linejoin="round" stroke-width="3"/>
                                <circle id="Ellipse_111" data-name="Ellipse 111" cx="6.753" cy="6.753" r="6.753" transform="translate(6.103 13.383)" fill="none" stroke="#f8f9fa" stroke-linejoin="round" stroke-width="3"/>
                                <line id="Ligne_362" data-name="Ligne 362" x1="6.378" y2="6.378" transform="translate(17.632 8.982)" fill="none" stroke="#f8f9fa" stroke-linejoin="round" stroke-width="3"/>
                                <path id="Tracé_2230" data-name="Tracé 2230" d="M213.433,95.695a6.753,6.753,0,1,1-9.55,0A6.753,6.753,0,0,1,213.433,95.695Z" transform="translate(-125.05 -86.531)" fill="none" stroke="#f8f9fa" stroke-linejoin="round" stroke-width="3"/>
                                <line id="Ligne_363" data-name="Ligne 363" y1="9.019" transform="translate(83.608 20.692)" fill="none" stroke="#f8f9fa" stroke-linejoin="round" stroke-width="3"/>
                                <line id="Ligne_364" data-name="Ligne 364" x2="6.96" transform="translate(80.128 25.972)" fill="none" stroke="#f8f9fa" stroke-linejoin="round" stroke-width="3"/>
                                <path id="Tracé_2231" data-name="Tracé 2231" d="M46.32,105.677H52.7v6.379" transform="translate(-28.689 -96.695)" fill="none" stroke="#f8f9fa" stroke-linejoin="round" stroke-width="3"/>
                                </g>
                            </g>
                        </svg>
                        <p class="text-3xl font-extrabold mt-6 mb-2"><?= $egalite['chiffre']; ?></p>
                        <p class="text-sm opacity-50 w-1/2 mx-auto max-w-[250px]"><?= $egalite['legende']; ?></p>
                    </div>
                </div>
            </div>
        </section>

        <?php endif; ?>


        
    </div>

<?php get_footer(); ?>