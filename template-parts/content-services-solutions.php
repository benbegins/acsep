<?php 
        if (have_rows('details')):
            while (have_rows('details')):
                the_row();
        ?>

        <!-- Section Liste Icônes -->
        <?php 
        if(get_row_layout() == 'liste_icones'):
            $title = get_sub_field('liste_icones_titre');
            $items = get_sub_field('liste_icones_item');
        ?>
        <section class='list-icones pb-section-mobile lg:pb-section'>
            <div class="container">
                <h2 class="section-title-sm"><?= $title; ?></h2>
                <ul class="pt-12 lg:pt-section-mobile flex flex-wrap justify-center">
                    <?php 
                    if($items):
                        foreach($items as $item):
                    ?>
                    <li class="list-icones__item">
                        <div class="icone-container"><?php echo wp_get_attachment_image($item['liste_icones_item_icone'], 'thumbnail'); ?></div>
                        <p class="lg:text-lg"><?= $item['liste_icones_item_nom']; ?></p>
                    </li>
                    <?php 
                        endforeach;
                    endif; 
                    ?>
                </ul>
            </div>
        </section>
        <?php endif; ?>

        
        <!-- Section Bloc Text -->
        <?php 
        if(get_row_layout() == 'bloc_texte'):
            $title = get_sub_field('bloc_texte_titre');
            $content = get_sub_field('bloc_texte_contenu');
        ?>
        <section class='pb-section-mobile lg:pb-section'>
            <div class="container">
                <h2 class="section-title-sm"><?= $title; ?></h2>
                <div class="lg:grid grid-cols-6">
                    <div class="texte-enrichi mt-6 lg:mt-8 lg:col-span-3 lg:col-start-3">
                        <?= $content; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        
        <!-- Section Liste 2 colonnes -->
        <?php 
        if(get_row_layout() == 'liste_2_colonnes'):
            $title = get_sub_field('liste_2_colonnes_titre');
            $intro = get_sub_field('liste_2_colonnes_intro');
            $items = get_sub_field('liste_2_colonnes_items');
        ?>
        <section class='pb-section-mobile lg:pb-section'>
            <div class="container">
                <h2 class="section-title-sm"><?= $title; ?></h2>
                <div class="lg:grid grid-cols-6">
                    <div class="mt-6 lg:mt-8 lg:col-span-3 lg:col-start-3">
                        <?php if($intro): ?>
                        <div class="texte-enrichi mb-6">
                            <?= $intro; ?>
                        </div>
                        <?php endif; ?>

                        <ul class="liste_2_colonnes lg:grid lg:grid-cols-2 lg:gap-x-8 lg:gap-y-3">
                            <?php 
                            foreach($items as $item):
                            ?>
                            <li><?= $item['element']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
       
       
       
        <!-- Section Bloc Image -->
        <?php 
        if(get_row_layout() == 'bloc_image'):
            $image = get_sub_field('image');
        ?>
        <section class='pb-section-mobile lg:pb-section'>
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



        <!-- Témoignages / FAQ -->
        <?php 
        $temoignage = get_field('temoignage');
        $faq = get_field('faq');

        if($temoignage['temoignage_citation'] || $faq):
        ?>
        <section class='bg-light-beige py-section-mobile lg:py-section'>
            <div class="container">
                <div class="lg:w-2/3 lg:mx-auto">

                    <?php 
                    if($temoignage['temoignage_citation']):
                    ?>
                    <div class="temoignage-card">
                        <p class="temoignage-card__citation text-pink text-lg md:text-xl"><?= $temoignage['temoignage_citation']; ?></p>
                        <div class="text-right mt-6">
                            <p class="font-extrabold"><?= $temoignage['temoignage_nom']; ?></p>
                            <p class="text-sm opacity-50"><?= $temoignage['temoignage_intitule']; ?></p>
                        </div>
                    </div>
                    <?php endif; 
                    
                    if($faq):
                    ?>
                    <div class="faq<?php if($temoignage){echo " pt-section-mobile lg:pt-section";} ?>">
                        <h2 class="section-title text-center mb-8 lg:w-1/2 lg:mx-auto"><?php _e('Les experts d’ACSEP répondent à vos questions', 'acsep'); ?></h2>
                        <ul class="border-t border-dark">
                            <?php 
                            foreach($faq as $item):
                            ?>
                            <li class="faq__item border-b border-dark">
                                <h3 class="question text-lg font-extrabold"><?= $item['faq_question']; ?></h3>
                                <p class="reponse w-5/6"><?= $item['faq_reponse']; ?></p>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>