    <footer class="site-footer bg-dark text-light">
        <!-- 1ere partie -->
        <div class="container py-section-mobile lg:py-section flex flex-col-reverse lg:grid lg:grid-cols-4 lg:gap-x-8 lg:items-start">
            <div class="mt-12 lg:mt-0">
                <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'contact' )->ID)); ?>" class="btn-primary">
                    <svg class="inline mr-3" xmlns="http://www.w3.org/2000/svg" width="18.5" height="18.514" viewBox="0 0 18.5 18.514">
                        <path id="_1904663_bubble_chat_comment_communication_message_icon" data-name="1904663_bubble_chat_comment_communication_message_icon" d="M15.888,0H2.109A2.109,2.109,0,0,0,0,2.109v9.079A2.109,2.109,0,0,0,2.109,13.3H5.382a.141.141,0,0,1,.141.141v3.576a.984.984,0,0,0,1.68.7l4.37-4.37a.141.141,0,0,1,.1-.041h4.218A2.109,2.109,0,0,0,18,11.189V2.109A2.109,2.109,0,0,0,15.888,0Zm1.265,11.188a1.265,1.265,0,0,1-1.265,1.265H11.67a.984.984,0,0,0-.7.281L6.608,17.111a.141.141,0,0,1-.24-.1V13.437a.984.984,0,0,0-.984-.984H2.109A1.265,1.265,0,0,1,.844,11.188V2.109A1.265,1.265,0,0,1,2.109.844H15.888a1.265,1.265,0,0,1,1.265,1.265Z" transform="translate(0.25 0.25)" fill="#fff" stroke="#fff" stroke-linecap="round" stroke-width="0.5"/>
                    </svg>
                    <?php _e('Parlez à un expert', 'acsep'); ?>
                </a>
                <p class="mt-2">Tel. 
                    <?php 
                    // Check if current language is espagnol
                    if(pll_current_language() == 'es'):
                        echo '+34 912 844 369';
                    else :
                        echo '+33 (0) 4 42 50 96 48';
                    endif;
                    ?>
                </p>
            </div>
            <div class="lg:col-span-3 lg:grid lg:grid-cols-3 lg:gap-x-8">
                <div class="lg:col-span-2 lg:grid lg:grid-cols-3 lg:gap-x-8">
                    <div>
                        <p class="font-extrabold mb-6"><a href="<?php echo get_post_type_archive_link( 'services' ); ?>"><?php _e('Services', 'acsep'); ?></a></p>
                        <ul class="hidden lg:block">
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

                            <li>
                                <a class="inline-block opacity-50 hover:opacity-100 mb-3" href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </li>

                            <?php 
                                endwhile;
                            endif;
                            wp_reset_postdata(  );
                            ?>
                        </ul>
                    </div>
                    <div>
                        <p class="font-extrabold mb-6"><a href="<?php echo get_post_type_archive_link( 'solutions' ); ?>"><?php _e('Solutions', 'acsep'); ?></a></p>
                        <ul class="hidden lg:block">
                            <li>
                                <a class="inline-block opacity-50 hover:opacity-100 mb-3" href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'izysuite' )->ID)); ?>">
                                    IzySuite
                                </a>
                            </li>
                            <?php 
                            $args = array(
                                'post_type' => 'solutions',
                                'orderby'=>'menu_order',
                                'order'=>'ASC'
                            );
                            $solutions = new WP_Query($args);
                    
                            if($solutions->have_posts()): 
                                while($solutions->have_posts()):
                                    $solutions->the_post();
                                    $izysuite = get_field('izysuite');
                                    if(!$izysuite):
                            ?>

                            <li>
                                <a class="inline-block opacity-50 hover:opacity-100 mb-3" href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </li>

                            <?php 
                                    endif;
                                endwhile;
                            endif;
                            wp_reset_postdata(  );
                            ?>
                        </ul>
                    </div>
                            
                    <div>
                        <p class="font-extrabold mb-6"><a href="">ACSEP</a></p>
                        <ul class="hidden lg:block">
                            <li>
                                <a class="inline-block opacity-50 hover:opacity-100 mb-3" href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'la-societe' )->ID)); ?>"><?php _e('La société', 'acsep'); ?></a>
                            </li>
                            <li>
                                <a class="inline-block opacity-50 hover:opacity-100 mb-3" href="<?php echo get_post_type_archive_link( 'actualites' ); ?>"><?php _e('Actualités & événements', 'acsep'); ?></a>
                            </li>
                            <li>
                                <a class="inline-block opacity-50 hover:opacity-100 mb-3" href="<?php echo get_post_type_archive_link( 'clients' ); ?>"><?php _e('Nos références', 'acsep'); ?></a>
                            </li>
                            <li>
                            <a class="inline-block opacity-50 hover:opacity-100 mb-3" href="<?php echo get_post_type_archive_link( 'offres-emploi' ); ?>"><?php _e('Offres d\'emploi', 'acsep'); ?></a>
                            </li>
                            <?php
                            $menuAcsep = get_nav_menu_locations()['menu-acsep'];
                            $menuAcsepItems = wp_get_nav_menu_items($menuAcsep);
                            if($menuAcsepItems){
                                foreach($menuAcsepItems as $item){
                                    echo '<li>';
                                    echo '<a class="inline-block opacity-50 hover:opacity-100 mb-3" href="' . $item->url . '">';
                                    echo $item->title;
                                    echo '</a>';
                                    echo '</li>';
                                }     
                            }
                            ?>
                        </ul>
                    </div>
                    
                </div>
                <?php 
                $secteurs = get_terms(array(
                    'taxonomy'      => 'secteurs',
                    'hide_empty'    => false,
                ));
                if($secteurs):
                ?>
                <div>
                    <p class="font-extrabold mb-6"><?php _e('Secteurs d\'activités', 'acsep'); ?></p>
                    <ul>
                        <?php 
                        foreach ($secteurs as $secteur):
                            $secteur_name = $secteur->name;
                            $secteur_link = get_term_link( $secteur->term_id, 'secteurs' );
                        ?>
                        <li><a class="inline-block opacity-50 hover:opacity-100 mb-3" href="<?= $secteur_link; ?>"><?= $secteur_name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- 2eme partie -->
        <div class="container pb-section-mobile lg:grid lg:grid-cols-4 lg:gap-x-8 lg:items-start">
            <!-- Social -->
            <div class="flex items-center mb-12 lg:mb-0">
                <a href="<?php the_field('linkedin', 'option'); ?>" class="hover:opacity-50" target="_blank">
                    <img width="21" src="<?= get_template_directory_uri( ) ?>/src/img/icon-linkedin.svg" alt="Linkedin ACSEP">
                </a>
                <!-- <a href="<?php the_field('twitter', 'option'); ?>" class="mx-6 hover:opacity-50" target="_blank">
                    <img width="25" src="<?= get_template_directory_uri( ) ?>/src/img/icon-twitter.svg" alt="twitter ACSEP">
                </a> -->
                <a href="<?php the_field('youtube', 'option'); ?>" class="ml-6 hover:opacity-50" target="_blank">
                    <img width="25" src="<?= get_template_directory_uri( ) ?>/src/img/icon-youtube.svg" alt="youtube ACSEP">
                </a>
            </div>

            <!-- Adresse FR-->
            <div class="mb-6 lg:mb-0">
                <p><strong>Groupe ACSEP </strong><br> Siège social <br> Bâtiment A - Parc Cézanne 1 <br> 380 avenue Archimède <br> 13857 Aix-en-Provence Cedex 3 <br> France</p>
            </div>

            <!-- Adresse ES -->
            <div>
                <p><strong>ACSEP IBERIA </strong><br> Calle Anabel Segura, 10 <br>3<sup>a</sup> Planta <br> 28108 Alcobendas <br> Madrid <br> Spain</p>
            </div>

            <!-- Logo -->
            <div class="mt-12 lg:mt-0">
                <a href="<?= pll_home_url(); ?>"><img class="w-40 lg:w-2/3 lg:ml-auto" src="<?= get_template_directory_uri() ?>/src/img/logo-acsep-white.svg" alt="Logo ACSEP"></a>
            </div>
        </div>

        <!-- 3eme partie -->
        <div class="container border-t border-t-gray py-6 text-sm md:flex md:justify-between">
            <div class="opacity-50">
                <p class="py-1 md:py-0">© <?= date('Y'); ?> ACSEP</p>
            </div>
            <div class="md:flex">
                <p class="py-1 md:mr-6 md:py-0"><a class="opacity-50 hover:opacity-100" href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'mentions-legales' )->ID)); ?>"><?php _e('Mentions légales', 'acsep'); ?></a></p>
                <p class="py-1 md:py-0"><a class="opacity-50 hover:opacity-100" href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'politique-de-confidentialite' )->ID)); ?>"><?php _e('Politique de confidentialité', 'acsep'); ?></a></p>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>