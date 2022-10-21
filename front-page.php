<?php get_header(); ?>

    <div class="page-home">
        <!-- Hero -->
        <section class="hero pt-12 lg:pt-section">
            <div class="container pt-section-mobile lg:pt-section relative z-10 lg:text-center">
                <div class="xl:w-2/3 xl:mx-auto">
                    <h1 class="font-extrabold text-2xl lg:text-4xl">
                        <?php _e('Digitalisez <br>votre supply chain', 'acsep') ?>
                    </h1>
                    <p class="text-lg my-8">
                        <?php _e('Grâce à notre expertise, nous vous assurons un accompagnement Logistique et IT qui tient compte de votre métier, de vos exigences et de vos contraintes', 'acsep') ?>
                    </p>
                    <a href="" class="btn-primary">
                        <?php _e('Découvrez ACSEP', 'acsep' ) ?>
                    </a>
                </div>
            </div>
            <div class="md:-my-16 lg:-my-24">
                <img class="w-full" src="<?= get_template_directory_uri( ) ?>/src/img/home-hero.jpg" alt="Illustration Acsep">
            </div>
        </section>

        <!-- Services -->
        <section class="pb-section-mobile lg:pb-section">
            <div class="container">
                <h2 class="section-title mb-6"><?php _e('Nos services', 'acsep'); ?></h2>
            </div>
            <div class="swiper slider-services">
                <div class="swiper-wrapper">
                    <?php 
                    $args = array(
                        'post_type' => 'services',
                        'orderby'=>'menu_order',
                        'order'=>'ASC'
                    );
                    $services = new WP_Query($args);

                    if($services->have_posts()):
                        while($services->have_posts()):
                            $services->the_post();
                    ?>

                    <div class="swiper-slide">
                        <a href="<?php the_permalink() ?>">
                            <div class="img">
                            <?php
                            $image = get_field('image');
                            if($image){
                                echo wp_get_attachment_image($image, 'medium_large');
                            }
                            ?>
                            </div>
                        </a>
                        <h3 class="text-lg mt-6 mb-4"><?= get_the_title(); ?></h3>
                        <p><?= get_field('description'); ?></p>
                        <a class="btn-secondary mt-4" href="<?php the_permalink() ?>"><?php _e('Découvrir', 'acsep'); ?></a>
                    </div>

                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </section>


        <!-- IzyPro -->
        <section class="md:border-t md:border-b border-gray">
            <div class="container md:grid md:grid-cols-2 md:items-center md:gap-8">

                <div class="md:col-start-2 md:row-start-1 mb-12 md:mb-0 md:py-16 lg:w-5/6 lg:ml-auto lg:py-24">
                    <h2 class="text-xl lg:text-2xl font-extrabold"><?php _e('Facilitez la gestion de votre entrepôt avec notre solution IzyPro WMS', 'acsep'); ?></h2>
                    <div class="flex flex-col items-start">
                        <a href="" class="btn-primary my-6"><?php _e('Découvrez IzyPro', 'acsep'); ?></a>
                        <a href="" class="btn-secondary"><?php _e('Toutes nos solutions', 'acsep'); ?></a>
                    </div>
                </div>

                <div class="md:col-start-1 md:row-start-1 md:h-full md:relative">
                    <img class="md:absolute w-full md:h-full md:object-cover" src="<?= get_template_directory_uri(); ?>/src/img/photos/visuel-izypro.jpg" alt="IzyPro">
                </div>

            </div>
        </section>


        <!-- Secteurs d'activités -->
        <?php 
        $args = array(
            'post_type'=>'secteurs_activites',
            'orderby'=>'menu_order',
                'order'=>'ASC'
        );
        $secteurs = new WP_Query($args); 
        
        if($secteurs->have_posts()):
        ?>
        <section class="py-section-mobile lg:py-section relative overflow-hidden">
            <div class="container md:grid md:grid-cols-2 md:gap-x-6">
                <h2 class="section-title mb-6 md:w-5/6"><?php _e('Des services adaptés à tous les secteurs d’activités', 'acsep'); ?></h2>
                <ul class="md:grid md:grid-cols-2 md:gap-x-6">
                <?php 
                while($secteurs->have_posts()):
                    $secteurs->the_post();
                ?>
                    <li>
                        <a class="btn-liste my-3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                <?php endwhile; ?>    
                </ul>
            </div>
            <div class="halo bottom-0 lg:bottom-auto lg:top-0 right-0 translate-y-1/2 lg:translate-y-0 translate-x-1/4"></div>
        </section>
        <?php endif; ?>


        <!-- Contact -->
        <section class="section-contact section-contact__xl py-section-mobile lg:py-section">
            <div class="container">
                <div class="img -mt-36">
                    <img src="<?= get_template_directory_uri() ?>/src/img/illus/illu-contact.png" alt="Contact ACSEP">
                </div>
                <div>
                    <h2 class="section-title"><?php _e('Parlons-nous', 'acsep'); ?></h2>
                    <p class="text-lg"><?php _e('Nous vous accompagnons sur vos projets d’optimisation logistique ou IT', 'acsep'); ?></p>
                </div>
                <ul class="mt-12 divide-y border-t border-b">
                    <li class="grid grid-cols-4 py-2">
                        <p class="text-xl font-extrabold">01</p>
                        <p class="col-span-3"><?php _e('Contactez-nous pour nous parler de vos besoins', 'acsep'); ?></p>
                    </li>
                    <li class="grid grid-cols-4 py-2">
                        <p class="text-xl font-extrabold">01</p>
                        <p class="col-span-3"><?php _e('Contactez-nous pour nous parler de vos besoins', 'acsep'); ?></p>
                    </li>
                    <li class="grid grid-cols-4 py-2">
                        <p class="text-xl font-extrabold">01</p>
                        <p class="col-span-3"><?php _e('Contactez-nous pour nous parler de vos besoins', 'acsep'); ?></p>
                    </li>
                    <li class="grid grid-cols-4 py-2">
                        <p class="text-xl font-extrabold">01</p>
                        <p class="col-span-3"><?php _e('Contactez-nous pour nous parler de vos besoins', 'acsep'); ?></p>
                    </li>
                </ul>
            </div>
        </section>
    </div>

<?php get_footer(); ?>