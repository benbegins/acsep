<?php get_header(); ?>

    <div class="page-services">


        <!-- Hero -->
        <section class='py-section-mobile lg:py-section relative'>
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
                <div class="fade img-hero my-12 lg:my-0 lg:w-7/12" data-duration="2">
                    <?php
                    $image = get_field('image');
                    if($image){
                        echo wp_get_attachment_image($image, 'large');
                    }
                    ?>
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



        <!-- Autres Services -->
        <?php 
        $args = array(
            'post__not_in' => array($post->ID),
            'post_type' => 'services',
            'orderby'=>'menu_order',
            'order'=>'ASC'
        );
        $services = new WP_Query($args);
        if($services->have_posts()): 
        ?>
        <section class="py-section-mobile lg:py-section relative">
            <div class="relative">
                <div class="container">
                    <h2 class="section-title mb-6"><?php _e('Nos autres services', 'acsep'); ?></h2>
                </div>
                <div class="swiper slider-services">
                    <div class="swiper-wrapper">
                        <?php
                        while($services->have_posts()):
                            $services->the_post();
                        ?>
                        <div class="swiper-slide">
                            <?php get_template_part('/template-parts/item-service'); ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <div class="hidden lg:block absolute right-0 top-0 container -mt-4">
                    <div class="flex gap-2 justify-end">
                        <div class="slider-navigation prev slider-services-navigation"></div>
                        <div class="slider-navigation next slider-services-navigation"></div>
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