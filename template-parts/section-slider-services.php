
        <?php 
        $args = array(
            'post_type' => 'services',
            'orderby'=>'menu_order',
            'order'=>'ASC',
            'posts_per_page' => -1,
        );
        $services = new WP_Query($args);
        if($services->have_posts()): 
        ?>
        <section class="pb-section-mobile lg:pb-section relative">
            <div class="container">
                <h2 class="section-title mb-6"><?php _e('Nos services', 'acsep'); ?></h2>
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
        </section>
        <?php 
        endif; 
        wp_reset_postdata();
        ?>