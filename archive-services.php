<?php get_header(); ?>

    <div class="page-services">


        <!-- Hero -->
        <section class='hero-3d pt-section-mobile lg:py-section relative'>
            <div class="container pt-section-mobile lg:pt-section">
                <h1 class="fade font-extrabold text-xl sm:text-2xl lg:text-3xl lg:w-2/3 xxl:w-1/2" data-translate="2">
                    <?php _e('Un accompagnement Supply Chain à 360°', 'acsep') ?>
                </h1>
                <p class="fade text-lg my-6 lg:w-1/2" data-translate="2" data-delay="0.1"><?php _e('Spécialiste de la Supply Chain digitale, ACSEP accompagne depuis 2005 ses clients dans l’amélioration de leur performance logistique.', 'acsep'); ?></p>
                <div class="fade" data-translate="2" data-delay="0.15">
                    <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'contact' )->ID)); ?>" class="btn-primary">
                        <?php _e('Parlez à un expert', 'acsep'); ?>
                    </a>
                </div>
            </div>
            <div class="fade back-3d back-3d-03" data-duration="2"></div>
        </section>


        <!-- Liste Services -->
        <section class='fade pb-section-mobile lg:pb-section'>
            <div class="container">
                <ul class="flex flex-col gap-y-12 md:grid md:grid-cols-2 md:gap-x-6 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-16">
                    <?php 
                    $args = array(
                        'post_type' => 'services',
                        'orderby'=>'menu_order',
                        'order'=>'ASC',
                        'posts_per_page' => -1
                    );
                    $services = new WP_Query($args); 

                    if($services->have_posts()):
                        while($services->have_posts()):
                            $services->the_post();
                    ?>

                    <li>
                        <?php get_template_part('/template-parts/item-service'); ?>
                    </li>

                    <?php 
                        endwhile; 
                    endif;

                    wp_reset_postdata(  );
                    ?>
                </ul>
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
        <section class="py-section-mobile lg:py-section border-t border-gray">
            <div class="container md:grid md:grid-cols-2 md:gap-x-6">
                <h2 class="section-title mb-6 md:w-5/6"><?php _e('Des services adaptés à tous les secteurs d’activités', 'acsep'); ?></h2>
                <ul class="md:grid md:grid-cols-2 md:gap-x-8">
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
        </section>
        <?php 
        endif; 
        wp_reset_postdata();
        ?>



        <!-- Contact -->
        <?php 
        get_template_part( 'template-parts/section-contact-sm' );
        ?>


    </div>

<?php get_footer(); ?>