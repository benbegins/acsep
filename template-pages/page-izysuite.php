<?php 
/*
Template Name: IzySuite
*/
get_header(); 
?>

    <div class="page-izysuite">


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


        <!-- Description -->
        <section>
            <div class="container lg:grid lg:grid-cols-2 lg:gap-8">
                <div>

                </div>
                <div class="texte-enrichi accroche">
                    <?php the_field('description'); ?>
                </div>
            </div>
        </section>


        <!-- Suite -->
        <?php 
        $args = array(
            'post_type' => 'solutions',
            'orderby'=>'menu_order',
            'order'=>'ASC'
        );
        $solutions = new WP_Query($args); 

        if($solutions->have_posts()):
        ?>
        <section class='py-section-mobile lg:py-section'>
            <div class="container">
                <ul class="md:grid md:grid-cols-2 md:gap-x-6 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-16">
                    <?php
                    while($solutions->have_posts()):
                        $solutions->the_post();
                        $izysuite = get_field('izysuite');
                        if($izysuite):
                    ?>

                    <li>
                        <?php get_template_part('/template-parts/item-izysuite'); ?>
                    </li>

                    <?php 
                        endif;
                    endwhile; 
                    ?>
                </ul>
            </div>
        </section>
        <?php
        endif;
        wp_reset_postdata(  );
        ?>



        <!-- Développement applicatifs -->
        <?php 
        $args = array(
            'post_type'=>'services',
            'name'=>'developpement-applicatifs'
        );
        $developpement_applicatifs = get_posts( $args )[0];
        // Check if post exist in current language
        if(pll_get_post($developpement_applicatifs->ID)):
        ?>
        <section class="md:border-t md:border-b border-gray relative">
            <div class="container md:grid md:grid-cols-2 md:items-center md:gap-8 min-h-[33vw]">

                <div class="mb-12 md:mb-0 md:h-full md:relative">
                    <img class="md:absolute w-full md:h-full md:object-cover" src="<?= get_template_directory_uri(); ?>/src/img/photos/visuel-developpement-applicatifs.jpg" alt="<?= $developpement_applicatifs->post_title; ?>">
                </div>

                <div class="mb-12 md:mb-0 md:py-16 lg:w-5/6 lg:ml-auto lg:py-24">
                    <h2 class="text-xl lg:text-2xl font-extrabold"><?= $developpement_applicatifs->post_title; ?></h2>
                    <p class="my-6"><?php _e('Nous créons aussi des solutions logicielles clés en main. ACSEP prend en charge le développement et la maintenance de ces applications, quelle que soit la cible technique (application web, windows, mobile…), que ce soit pour créer une application de toute pièce ou une extension au SI existant.', 'acsep'); ?></p>
                    <div class="flex flex-col items-start lg:flex-row lg:items-center lg:gap-6">
                        <a href="<?= get_the_permalink(pll_get_post($developpement_applicatifs->ID)); ?>" class="btn-primary"><?php _e('Découvrez ce service', 'acsep'); ?></a>
                    </div>
                </div>

            </div>
        </section>
        <?php endif; ?>



        
        <!-- Autres Solutions -->
        <?php 
        $args = array(
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