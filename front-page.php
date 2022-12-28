<?php get_header(); ?>

    <div class="page-home">
        
        <!-- Hero -->
        <section class="hero pt-12 lg:pt-section">
            <div class="container pt-section-mobile lg:pt-section relative z-10 lg:text-center">
                <div class="xl:w-2/3 xl:mx-auto">
                    <h1 class="fade font-extrabold text-2xl lg:text-4xl" data-translate="2">
                        <?php _e('Digitalisez <br>votre supply chain', 'acsep') ?>
                    </h1>
                    <p class="fade text-lg my-8 max-w-3xl lg:mx-auto" data-delay="0.1" data-translate="2">
                        <?php _e('Grâce à notre expertise, nous vous assurons un accompagnement Logistique et IT qui tient compte de votre métier, de vos exigences et de vos contraintes', 'acsep') ?>
                    </p>
                    <div class="fade" data-delay="0.15" data-translate="2">
                        <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'la-societe' )->ID)); ?>" class="btn-primary">
                            <?php _e('Découvrez ACSEP', 'acsep' ) ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="md:-my-16 fade" data-delay="0.25" data-duration="2">
                <img 
                    data-parallax
                    data-speed="22"
                    class="w-full" 
                    src="<?= get_template_directory_uri( ) ?>/src/img/illus/home-hero.jpg" 
                    srcset="<?= get_template_directory_uri( ) ?>/src/img/illus/home-hero.jpg 2070w,
                        <?= get_template_directory_uri( ) ?>/src/img/illus/home-hero.jpg 1024w"
                    sizes="100vw" 
                    alt="Illustration Acsep">
            </div>
        </section>
        

       <!-- Services -->
       <?php 
        get_template_part( '/template-parts/section-slider-services' );
        ?>


        <!-- IzyPro -->
        <?php 
        $args = array(
            'post_type'=>'solutions',
            'name'=>'izypro'
        );
        $izypro = get_posts( $args )[0];
        // Check if post exist in current language
        if(pll_get_post($izypro->ID)):
        ?>
        <section class="relative">
            <div class="container md:grid md:grid-cols-2 md:items-center md:gap-8  min-h-[28vw]">

                <div class="md:col-start-2 md:row-start-1 mb-12 md:mb-0 md:py-16 lg:w-5/6 lg:ml-auto lg:py-24">
                    <h2 data-translate="2" class="text-xl lg:text-2xl font-extrabold"><?php _e('Facilitez la gestion de votre entrepôt avec notre solution IzyPro WMS', 'acsep'); ?></h2>
                    <div data-delay="0.2" class="flex flex-col items-start lg:flex-row lg:items-center lg:gap-6">
                        <a href="<?= get_the_permalink(pll_get_post($izypro->ID)); ?>" class="btn-primary my-6"><?php _e('Découvrez IzyPro', 'acsep'); ?></a>
                        <a href="<?php echo get_post_type_archive_link( 'solutions' ); ?>" class="btn-secondary"><?php _e('Toutes nos solutions', 'acsep'); ?></a>
                    </div>
                </div>

                <div class="md:col-start-1 md:row-start-1 md:h-full md:relative overflow-hidden rounded-xl">
                    <img class="md:absolute w-full md:h-full md:object-cover" src="<?= get_template_directory_uri(); ?>/src/img/photos/visuel-izypro.jpg" alt="IzyPro">
                </div>

            </div>
        </section>
        <?php endif; ?>


        <!-- Secteurs d'activités -->
        <?php 
         $secteurs = get_terms(array(
            'taxonomy'      => 'secteurs',
            'hide_empty'    => false,
        ));
        if($secteurs):
        ?>
        <section class="py-section-mobile lg:py-section">
            <div class="container md:grid md:grid-cols-2 md:gap-x-6">
                <h2 class="section-title mb-6 md:w-5/6"><?php _e('Des services adaptés à tous les secteurs d’activités', 'acsep'); ?></h2>
                <ul class="md:grid md:grid-cols-2 md:gap-x-8">
                <?php 
                foreach ($secteurs as $secteur):
                    $secteur_name = $secteur->name;
                    $secteur_link = get_term_link( $secteur->term_id, 'secteurs' );
                ?>
                    <li>
                        <a class="btn-liste my-3" href="<?= $secteur_link; ?>"><?= $secteur_name; ?></a>
                    </li>
                <?php endforeach; ?>    
                </ul>
            </div>
        </section>
        <?php 
        endif; 
        ?>


        <!-- Contact -->
        <section class="section-contact section-contact__xl py-section-mobile lg:py-section">
            <div class="container relative">
                <div class="img -mt-36 lg:absolute lg:right-0 lg:-mt-48">
                    <img class="mx-auto" src="<?= get_template_directory_uri() ?>/src/img/illus/illu-contact.png" alt="Contact ACSEP">
                </div>
                <div class="lg:w-1/3">
                    <h2 class="section-title"><?php _e('Parlons-nous !', 'acsep'); ?></h2>
                    <p class="text-lg mt-4"><?php _e('Nous vous accompagnons sur vos projets d’optimisation logistique ou IT.', 'acsep'); ?></p>
                </div>
            </div>
            <div class="container lg:border-t lg:mt-24">
                <ul class="my-12 divide-y border-t border-b lg:divide-y-0 lg:border-0 lg:flex lg:justify-between lg:mb-20 lg:mt-0">
                    <li class="item-list grid grid-cols-4 py-2 lg:block lg:w-2/12 lg:pt-8" data-delay="">
                        <p class="text-xl lg:text-2xl font-extrabold lg:mb-4">01</p>
                        <p class="col-span-3 lg:text-lg"><?php _e('Contactez-nous pour nous parler de vos besoins', 'acsep'); ?></p>
                    </li>
                    <li class="item-list grid grid-cols-4 py-2 lg:block lg:w-2/12 lg:pt-8" data-delay="0.25">
                        <p class="text-xl lg:text-2xl font-extrabold lg:mb-4">02</p>
                        <p class="col-span-3 lg:text-lg"><?php _e('Nous étudions ensemble les meilleures solutions', 'acsep'); ?></p>
                    </li>
                    <li class="item-list grid grid-cols-4 py-2 lg:block lg:w-2/12 lg:pt-8" data-delay="0.5">
                        <p class="text-xl lg:text-2xl font-extrabold lg:mb-4">03</p>
                        <p class="col-span-3 lg:text-lg"><?php _e('Nous construisons le plan de déploiement de la solution', 'acsep'); ?></p>
                    </li>
                    <li class="item-list grid grid-cols-4 py-2 lg:block lg:w-2/12 lg:pt-8" data-delay="0.75">
                        <p class="text-xl lg:text-2xl font-extrabold lg:mb-4">04</p>
                        <p class="col-span-3 lg:text-lg"><?php _e('Nous déployons la solution et adaptons si besoin', 'acsep'); ?></p>
                    </li>
                </ul>
                <div class="text-center">
                    <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'contact' )->ID)); ?>" class="btn-primary white"><?php _e('Contactez-nous', 'acsep'); ?></a>
                </div>
            </div>
        </section>


        <!-- Notre histoire -->
        <section class="py-section-mobile lg:py-section">
            <div class="container lg:grid lg:grid-cols-2 lg:items-center">

                <!-- Histoire -->
                <div class="lg:w-5/6">
                    <h2 class="section-title"><?php _e('Notre histoire', 'acsep'); ?></h2>
                    <p class="text-lg my-4"><?php _e('Depuis 2005, ACSEP accompagne ses clients sur l’amélioration de leur organisation logistique. ', 'acsep'); ?></p>
                    <div class="pt-2 flex flex-col items-start lg:flex-row lg:items-center">
                        <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'la-societe' )->ID)); ?>" class="btn-primary"><?php _e('Découvrez ACSEP', 'acsep'); ?></a>
                        <a href="<?php echo get_post_type_archive_link( 'offres-emploi' ); ?>" class="btn-secondary mt-4 lg:mt-0 lg:ml-8"><?php _e('Rejoignez-nous', 'acsep'); ?></a>
                    </div>
                </div>

                <!-- Chiffres clés -->
                <div class="mt-12 lg:mt-0">
                    <ul class="grid grid-cols-2 gap-6 lg:text-right">
                        <?php
                        $chiffres = get_field('chiffres_cles');
                        if( $chiffres ) :
                            foreach( $chiffres as $key=>$row ) :
                                $chiffre = $row['item_chiffre'];
                                $description = $row['item_description'];
                                $delay = $key * 0.05;
                        ?>
                        <li data-delay="<?= $delay; ?>" data-translate="1">
                            <div class="text-2xl text-pink font-extrabold lg:text-3xl"><?php echo $chiffre; ?></div>
                            <div><?php echo $description; ?></div>
                        </li>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>

            </div>
        </section>


        <!-- Clients -->
        <?php 
        $clients = get_field('clients');
        if($clients): 
        ?>
        <section class='pb-section-mobile lg:pb-section'>
            <div class="container">
                <h2 class="section-title"><?php _e('Ils nous font confiance', 'acsep'); ?></h2>
                <ul class="mt-12 grid grid-cols-3 gap-x-6 gap-y-12 lg:grid-cols-4">
                    <?php 
                    foreach($clients as $key=>$item):
                        $client = $item['client'];
                        $permalink = get_permalink( $client->ID);
                        $title = get_the_title( $client->ID );
                        $logo = get_field('logo', $client->ID);
                        $delay = $key * 0.05;
                    ?>
                    <li class="text-center" data-delay="<?= $delay; ?>">
                        <a class="inline-block h-12 max-w-[60%] lg:h-16 xl:h-20 saturate-0 opacity-50 hover:saturate-100 hover:opacity-100 transition duration-200" href="<?= $permalink; ?>">
                            <?= wp_get_attachment_image($logo, 'medium', '', array('class' => 'object-contain object-center w-full h-full mx-auto')); ?>
                        </a>
                    </li>
                    <?php
                    endforeach;
                    ?>
                </ul>
                <div class="text-center mt-12">
                    <a href="<?php echo get_post_type_archive_link( 'clients' ); ?>" class="btn-primary"><?php _e('Toutes nos références', 'acsep'); ?></a>
                </div>
            </div>
        </section>
        <?php endif; ?>


        <!-- Témoignages -->
        <?php 
        $temoignages = get_field('temoignages');
        if($temoignages): 
        ?>
        <section class="bg-light-beige py-16">
            <div class="container">
                <h2 class="text-xl font-extrabold text-center mb-6 lg:text-2xl lg:mb-8"><?php _e('Témoignages', 'acsep'); ?></h2>
            </div>
            <div class="swiper slider-temoignages">
                <div class="swiper-wrapper">
                    <?php 
                    foreach ($temoignages as $temoignage):
                        $citation = $temoignage['temoignage'];
                        $nom = $temoignage['nom'];
                        $poste = $temoignage['poste'];
                    ?>

                    <div class="swiper-slide bg-light p-6 rounded-lg lg:p-12">
                        <div class="text-lg"><?php echo $citation; ?></div>
                        <div class="text-right mt-6">
                            <div class="text-pink font-extrabold"><?php echo $nom; ?></div>
                            <div class="text-sm opacity-50"><?php echo $poste; ?></div>
                        </div>
                    </div>

                    <?php 
                    endforeach;
                    ?>
                </div>
                <div class="hidden lg:flex justify-center gap-2">
                    <div class="slider-navigation prev"></div>
                    <div class="slider-navigation next"></div>
                </div>
            </div>
        </section>
        <?php endif; ?>
        

        <!-- Actualités -->
        <?php 
        $args = array(
            'post_type' => 'actualites',
            'posts_per_page' => 4,
        );
        $actualites = new WP_Query($args);
        if($actualites->have_posts()): 
        ?>
        <section class="py-section-mobile lg:py-section">
            <div class="container">
                <h2 class="section-title mb-6"><?php _e('Nos dernières actualités', 'acsep'); ?></h2>
            </div>
            <div class="swiper slider-actualites">
                <div class="swiper-wrapper">
                    <?php 
                    while($actualites->have_posts()):
                        $actualites->the_post();
                    ?>
                    <div class="swiper-slide">
                        <?php get_template_part('/template-parts/item-actualite'); ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="container text-center mt-8">
                <a href="<?= get_post_type_archive_link( 'actualites' ); ?>" class="btn-primary"><?php _e('Tous nos événements & actus', 'acsep'); ?></a>
            </div>
        </section>
        <?php 
        endif; 
        wp_reset_postdata();
        ?>


    </div>

<?php get_footer(); ?>