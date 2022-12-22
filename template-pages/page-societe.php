<?php 
/*
Template Name: Page Société
*/
get_header(); 
?>

    <div class="page-texte">
        
    
        <!-- Intro -->
        <section class='py-section-mobile lg:py-section relative'>
            <div class="container pt-12 lg:pt-section text-center">
                <h1 class="fade text-2xl md:text-3xl font-extrabold mb-6 md:w-3/4 md:mx-auto lg:w-7/12" data-translate="2"><?php the_field('titre'); ?></h1>
                <?php if(get_field('introduction')): ?>
                <p class="fade text-lg md:w-3/4 md:mx-auto lg:w-1/2" data-delay="0.1" data-translate="2">
                    <?php  the_field('introduction');  ?>
                </p>
                <?php endif; ?>
            </div>
        </section>


        <!-- Photo équipe -->
        <?php if(get_field('photo_dequipe')): ?>
        <section class='fade pb-section-mobile lg:pb-section relative' data-duration="2" data-delay="0.5">
            <div class="container">
                <?php 
                $photo = get_field('photo_dequipe');

                echo wp_get_attachment_image($photo['ID'], 'large', '', array('class'=>'w-full rounded-xl'));

                if($photo['description']){
                    echo '<p class="text-sm opacity-50 italic mt-2">' . $photo['description'] . '</p>';
                }
                ?>
            </div>
        </section>
        <?php endif; ?>


        <!-- 3 objectifs -->
        <?php 
        $objectifs = get_field('objectifs');
        if($objectifs):
        ?>
        <section class='list-icones-societe'>
            <div class="container">
                <h2 class="section-title-sm"><?php _e('ACSEP vise 3 objectifs majeurs', 'acsep'); ?></h2>
                <ul class="pt-12 lg:grid lg:grid-cols-3 lg:gap-x-8">
                    <li class="list-icones-societe__item">
                        <div class="icone-container"><?= wp_get_attachment_image($objectifs['icone_objectif_1'], 'thumbnail'); ?></div>
                        <p class="lg:text-lg"><?= $objectifs['texte_objectif_1']; ?></p>
                    </li>
                    <li class="list-icones-societe__item">
                        <div class="icone-container"><?= wp_get_attachment_image($objectifs['icone_objectif_2'], 'thumbnail'); ?></div>
                        <p class="lg:text-lg"><?= $objectifs['texte_objectif_2']; ?></p>
                    </li>
                    <li class="list-icones-societe__item">
                        <div class="icone-container"><?= wp_get_attachment_image($objectifs['icone_objectif_3'], 'thumbnail'); ?></div>
                        <p class="lg:text-lg"><?= $objectifs['texte_objectif_3']; ?></p>
                    </li>
                </ul>
            </div>
        </section>
        <?php endif; ?>



        <!-- Contenu -->
        <?php 
        if (have_rows('contenu')):
            while (have_rows('contenu')):
                the_row(); 
        ?>

        <?php 
        // 
        // Bloc Texte
        // 
        if(get_row_layout() == 'bloc_texte'):
            $titre = get_sub_field('titre');
            $contenu = get_sub_field('contenu');
            $link = get_sub_field('bouton');
            $linkText = get_sub_field('texte_bouton');
        ?>
         <section class='pt-section-mobile lg:pt-section'>
            <div class="container">
                <h2 class="section-title-sm"><?= $titre; ?></h2>
                <div class="lg:grid grid-cols-6">
                    <div class="mt-6 lg:mt-8 lg:col-span-3 lg:col-start-3">
                        <p><?= $contenu; ?></p>
                        <?php if($link): ?>
                        <div>
                            <a href="<?= $link ?>" class="btn-primary mt-6"><?= $linkText; ?></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?php 
        // 
        // Bloc Image
        // 
        if(get_row_layout() == 'bloc_image'):
            $image = get_sub_field('image');
        ?>
        <section class='pt-section-mobile lg:pt-section'>
            <div class="container">
                <div class="img lg:w-2/3 lg:mx-auto rounded-2xl overflow-hidden">
                    <?php echo wp_get_attachment_image($image, 'large', '', array('class'=>'w-full')); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>


        <?php 
            endwhile;
        endif;
        ?>


        <!-- Citation -->
        <section class="bg-lines py-section-mobile lg:py-section"">
            <div class="container">
                <div class="lg:w-2/3 lg:mx-auto bg-lightgray rounded-xl shadow-xl shadow-dark/10 flex overflow-hidden">
                    <div class="relative w-1/3 h-auto flex items-end lg:w-1/4">
                        <img src="<?= get_template_directory_uri(  ); ?>/src/img/photos/thierry.jpg" alt="Thierry Puharrée" class="w-full">
                    </div>
                    <div class="w-2/3 p-6 h-auto flex items-center text-beige lg:w-3/4">
                        <div class="lg:w-2/3 lg:mx-auto lg:max-w-[450px]">
                            <p class="text-base sm:text-lg font-extrabold italic">&ldquo;<?= get_field('citation_thierry'); ?>&rdquo;.</p>
                            <div class="flex items-center mt-3">
                                <div class="h-px bg-beige w-8 mr-3"></div>
                                <p>Thierry Puharré</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="background"></div>
        </section>


        <!-- Contact -->
        <?php 
        get_template_part( 'template-parts/section-contact-sm' );
        ?>
        
    </div>

<?php get_footer(); ?>