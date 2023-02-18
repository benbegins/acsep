<?php get_header(); ?>

    <div class="page-solutions">


        <!-- Hero -->
        <section class='hero-3d pt-section-mobile lg:py-section relative'>
            <div class="container pt-section-mobile lg:pt-section">
                <h1 class="fade font-extrabold text-xl sm:text-2xl lg:text-3xl lg:w-3/5" data-translate="2">
                    <?php _e('Nos solutions logicielles pour développer votre performance', 'acsep') ?>
                </h1>
                <p class="fade text-lg my-6 lg:w-1/2" data-translate="2" data-delay="0.1"><?php _e('Spécialiste de la Supply Chain digitale, ACSEP accompagne ses clients dans l’amélioration de leur performance logistique et IT.', 'acsep'); ?></p>
                <div class="fade" data-translate="2" data-delay="0.15">
                    <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'contact' )->ID)); ?>" class="btn-primary">
                        <?php _e('Parlez à un expert', 'acsep'); ?>
                    </a>
                </div>
            </div>
            <div class="fade back-3d back-3d-01" data-duration="2"></div>
        </section>


        <!-- Liste Services -->
        <section class='fade pb-section-mobile lg:pb-section'>
            <div class="container">
                <ul class="flex flex-col gap-y-12 md:grid md:grid-cols-2 md:gap-x-6 lg:grid-cols-3 lg:gap-x-8 lg:gap-y-16">
                    <!-- IzySuite -->
                    <li>
                        <div class="item-service">
                            <h3 class="text-xl font-extrabold mt-6 mb-4">IzySuite</h3>
                            <p><?php _e('Notre suite logicielle IzySuite constituée de 7 solutions qui participent activement au développement de votre supply chain.', 'acsep'); ?></p>
                            <a class="btn-secondary mt-4" href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'izysuite' )->ID)); ?>"><?php _e('Découvrir', 'acsep'); ?></a>
                        </div>
                    </li>
                    <?php 
                    $args = array(
                        'post_type' => 'solutions',
                        'orderby'=>'menu_order',
                        'order'=>'ASC',
                        'posts_per_page' => -1,
                    );
                    $solutions = new WP_Query($args); 

                    if($solutions->have_posts()):
                        while($solutions->have_posts()):
                            $solutions->the_post();
                            $izysuite = get_field('izysuite');
                            if(!$izysuite):
                    ?>

                    <li>
                        <?php get_template_part('/template-parts/item-solution'); ?>
                    </li>

                    <?php 
                            endif;
                        endwhile; 
                    endif;

                    wp_reset_postdata(  );
                    ?>
                </ul>
            </div>
        </section>



        <!-- Intégration -->
        <?php 
        $args = array(
            'post_type'=>'services',
            'name'=>'integration'
        );
        $integration = get_posts( $args )[0];
        // Check if post exist in current language
        if(pll_get_post($integration->ID)):
        ?>
        <section class="pb-section-mobile lg:pb-section relative">
            <div class="container md:grid md:grid-cols-2 md:items-center md:gap-8 min-h-[28vw]">

                <div class="mb-12 md:mb-0 md:h-full md:relative rounded-xl overflow-hidden">
                    <img class="md:absolute w-full md:h-full md:object-cover" src="<?= get_template_directory_uri(); ?>/src/img/photos/visuel-integration.jpg" alt="<?= $integration->post_title; ?>">
                </div>

                <div class="mb-12 md:mb-0 md:py-16 lg:w-5/6 lg:ml-auto lg:py-24">
                    <h2 class="text-xl lg:text-2xl font-extrabold"><?php _e('L’intégration clés en main', 'acsep'); ?></h2>
                    <p class="my-6"><?php _e('L’intégration est l’un des premiers métiers d’ACSEP. Ainsi, notre équipe intègre indifféremment nos propres logiciels comme IzySuite et le WMS IzyPro, mais aussi celles de nos éditeurs partenaires.', 'acsep'); ?></p>
                    <div class="flex flex-col items-start lg:flex-row lg:items-center lg:gap-6">
                        <a href="<?= get_the_permalink(pll_get_post($integration->ID)); ?>" class="btn-primary"><?php _e('Découvrez ce service', 'acsep'); ?></a>
                    </div>
                </div>

            </div>
        </section>
        <?php endif; ?>



        <!-- Contact -->
        <?php 
        get_template_part( 'template-parts/section-contact-sm' );
        ?>


    </div>

<?php get_footer(); ?>