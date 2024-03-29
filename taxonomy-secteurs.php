<?php 
get_header(); 
$term = $wp_query->queried_object;

$photo = get_field("photo", "secteurs_" . $term->term_id);
$intro = get_field("intro", "secteurs_" . $term->term_id);
$content = get_field("contenu", "secteurs_" . $term->term_id);
?>

    <div class="page-services">


        <!-- Hero -->
        <section class='py-section-mobile lg:py-section relative'>
            <div class="container flex flex-col-reverse lg:pt-section-mobile lg:flex-row lg:items-center">
                <div class="lg:w-1/2 xl:w-5/12">
                    <h1 class="fade font-extrabold text-2xl lg:text-3xl lg:w-4/5" data-translate="2">
                        <?php single_term_title(); ?>
                    </h1>

                    <?php if($intro): ?>
                    <div class="fade text-lg my-6 lg:w-4/5" data-translate="2" data-delay="0.1"><?= $intro; ?></div>
                    <?php endif; ?>

                    <div class="fade" data-translate="2" data-delay="0.2">
                        <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'contact' )->ID)); ?>" class="btn-primary mt-8">
                            <?php _e('Parlez à un expert', 'acsep'); ?>
                        </a>
                    </div>
                </div>


                <div class="fade img-hero my-12 lg:my-0 lg:w-1/2 xl:w-7/12" data-duration="2">
                    <?php
                    if($photo){
                        echo wp_get_attachment_image($photo, 'large');
                    }
                    ?>
                </div>
            </div>
        </section>  


        <?php 
        if($content):
            foreach($content as $section):
                $titre = $section['contenu_titre'];
                $paragraphe = $section['contenu_paragraphe'];
        ?>
        <section class='pb-section-mobile lg:pb-section relative'>
            <div class="container">
                <h2 class="section-title-sm"><?= $titre; ?></h2>
                <div class="lg:grid grid-cols-6">
                    <div class="texte-enrichi mt-6 lg:mt-8 lg:col-span-3 lg:col-start-3">
                        <?= $paragraphe; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php 
            endforeach;
        endif; 
        ?>



        <!-- Services -->
        <?php 
        get_template_part( '/template-parts/section-slider-services' );
        ?>


        <!-- Solutions -->
        <?php 
        $args = array(
            'post_type' => 'solutions',
            'orderby'=>'menu_order',
            'order'=>'ASC',
            'posts_per_page' => -1
        );
        $solutions = new WP_Query($args);
        if($solutions->have_posts()): 
        ?>
        <section class="pb-section-mobile lg:pb-section relative">
            <div class="relative">
                <div class="container">
                    <h2 class="section-title mb-6"><?php _e('Nos solutions', 'acsep'); ?></h2>
                </div>
                <div class="swiper slider-solutions">
                    <div class="swiper-wrapper">
                        <!-- Izysuite -->
                        <div class="swiper-slide">
                            <div class="item-service">
                                <h3 class="text-xl font-extrabold mt-6 mb-4">IzySuite</h3>
                                <p><?php _e('Notre suite logicielle IzySuite constituée de 7 solutions qui participent activement au développement de votre supply chain.', 'acsep'); ?></p>
                                <a class="btn-secondary mt-4" href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'izysuite' )->ID)); ?>"><?php _e('Découvrir', 'acsep'); ?></a>
                            </div>
                        </div>
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


        <!-- Références -->
        <?php 
        $args= array(
            'post_type'=>'clients',
        );
        $references = new WP_Query($args); 
        if($references->posts):
        ?>
        <section class="pb-section-mobile lg:pb-section relative">
            <div class="container md:grid md:grid-cols-2 md:items-center md:gap-8 min-h-[28vw]">

                <div class="mb-12 md:mb-0 md:h-full md:relative rounded-xl overflow-hidden">
                    <img class="md:absolute w-full md:h-full md:object-cover" src="<?= get_template_directory_uri(); ?>/src/img/photos/img-menu-acsep.jpg" alt="clients acsep">
                </div>

                <div class="mb-12 md:mb-0 md:py-16 lg:w-5/6 lg:ml-auto lg:py-24">
                    <h2 class="text-xl lg:text-2xl font-extrabold"><?php _e('Nos références', 'acsep'); ?></h2>
                    <p class="my-6"><?php _e('Le groupe ACSEP accompagne une centaine de clients actifs parmi lesquels Auchan, Boulanger, Carrefour, C-Log, DHL Supply Chain, Distrimag, Geodis, Habitat, ID Logistics, Lustucru, Metro, Panzani, Petit Bateau, Samsung Electronics France, Sonepar et XPO Logistics.', 'acsep'); ?></p>
                    <div class="flex flex-col items-start lg:flex-row lg:items-center lg:gap-6">
                        <a href="<?php echo get_post_type_archive_link( 'clients' ); ?>" class="btn-primary"><?php _e('Découvrez nos références', 'acsep'); ?></a>
                    </div>
                </div>

            </div>
        </section>
        <?php endif; ?>


        <!-- Contact -->
        <?php 
        get_template_part( '/template-parts/section-contact-sm' );
        ?>

    </div>

<?php get_footer(); ?>