<?php get_header(); ?>

    <div class="page-solutions">


        <!-- Hero -->
        <section class='hero-solutions py-section-mobile lg:py-section relative'>
            <div class="container flex flex-col-reverse lg:pt-section-mobile lg:flex-row lg:items-center">
                <div class="lg:w-5/12">
                    <h1 class="fade font-extrabold text-2xl lg:text-3xl lg:w-2/3 xxl:w-1/2" data-translate="2">
                        <?php the_title(); ?>
                    </h1>
                    <?php 
                    $introduction = get_field('introduction');
                    if($introduction):
                    ?>
                    <p class="fade text-lg my-6 lg:w-4/5" data-translate="2" data-delay="0.1"><?= $introduction['introduction_accroche']; ?></p>
                    <p class="fade lg:w-4/5" data-translate="2" data-delay="0.15"><?= $introduction['introduction_presentation']; ?></p>
                    <?php endif; ?>
                    <div class="fade" data-translate="2" data-delay="0.2">
                        <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'contact' )->ID)); ?>" class="btn-primary mt-8">
                            <?php _e('Parlez à un expert', 'acsep'); ?>
                        </a>
                    </div>
                </div>
                <div class="fade hero-solutions__img-container mb-12 lg:mb-0 lg:w-7/12">
                    <div class="laptop" data-delay="0.25">
                        <?php
                        $image = get_field('image');
                        if($image){
                            echo wp_get_attachment_image($image, 'large');
                        }
                        ?>    
                    </div>
                    <div class="tablette" data-delay="0.35" data-parallax data-speed="-15">
                        <?php
                        $image = get_field('image');
                        if($image){
                            echo wp_get_attachment_image($image, 'large');
                        }
                        ?>   
                    </div>
                </div>
            </div>
        </section>


         <!-- Content -->
         <?php 
        get_template_part( '/template-parts/content-services-solutions' );
        ?>


        <!-- Contact -->
        <?php 
        get_template_part( 'template-parts/section-contact-sm' );
        ?>



        <!-- IzySuite -->
        <?php 
        // Si la solution fait partie de la suite IzySuite, on affiche IzySuite
        if(get_field('izysuite', $post->ID)):
        ?>
        <section class="md:border-b border-gray relative">
            <div class="container md:grid md:grid-cols-2 md:items-center md:gap-8 min-h-[33vw]">

                <div class="mb-12 md:mb-0 md:h-full md:relative">
                    <img class="md:absolute w-full md:h-full md:object-cover" src="<?= get_template_directory_uri(); ?>/src/img/photos/visuel-izypro.jpg" alt="<?= $integration->post_title; ?>">
                </div>

                <div class="mb-12 md:mb-0 md:py-16 lg:w-5/6 lg:ml-auto lg:py-24">
                    <h2 class="text-xl lg:text-2xl font-extrabold"><?php _e('Explorez tous les modules de notre suite IzySuite !', 'acsep'); ?></h2>
                    <div class="mt-6">
                        <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'izysuite' )->ID)); ?>" class="btn-primary"><?php _e('Découvrez IzySuite', 'acsep'); ?></a>
                    </div>
                </div>

            </div>
        </section>
        <?php endif; ?>



        <!-- Autres Solutions -->
        <?php 
        $args = array(
            'post__not_in' => array($post->ID),
            'post_type' => 'solutions',
            'orderby'=>'menu_order',
            'order'=>'ASC'
        );
        $solutions = new WP_Query($args);
        if($solutions->have_posts()): 
        ?>
        <section class="py-section-mobile lg:py-section relative">
            <div class="relative">
                <div class="container">
                    <h2 class="section-title mb-6"><?php _e('Nos autres solutions', 'acsep'); ?></h2>
                </div>
                <div class="swiper slider-solutions">
                    <div class="swiper-wrapper">

                        <?php 
                        // Si la solution ne fait pas partie de la suite IzySuite, on affiche IzySuite
                        if(!get_field('izysuite', $post->ID)):
                        ?>
                        <div class="swiper-slide">
                            <div class="item-service">
                                <h3 class="text-xl font-extrabold mt-6 mb-4">IzySuite</h3>
                                <p><?php _e('Notre suite logicielle IzySuite constituée de 7 solutions qui participent activement au développement de votre supply chain.', 'acsep'); ?></p>
                                <a class="btn-secondary mt-4" href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'izysuite' )->ID)); ?>"><?php _e('Découvrir', 'acsep'); ?></a>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php
                        while($solutions->have_posts()):
                            $solutions->the_post();
                            $izysuite = get_field('izysuite');
                            if(!$izysuite):
                        ?>
                        <div class="swiper-slide">
                            <?php get_template_part('/template-parts/item-solution'); ?>
                        </div>
                        <?php 
                            endif;
                        endwhile; 
                        ?>
                    </div>
                </div>
                <div class="hidden lg:block absolute right-0 top-0 container -mt-4">
                    <div class="flex gap-2 justify-end">
                        <div class="slider-navigation prev slider-solutions-navigation"></div>
                        <div class="slider-navigation next slider-solutions-navigation"></div>
                    </div>
                </div>
            </div>
        </section>
        <?php 
        endif; 
        wp_reset_postdata();
        ?>                          

    </div>

<?php get_footer(); ?>