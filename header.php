<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

    <header class="site-header fixed w-full z-50">

        <!-- Topbar -->
        <div class="hidden lg:block bg-dark text-light text-sm py-2">
            <div class="container flex justify-end items-center">
                <!-- Phone -->
                <div>
                    +33 (0) 4 42 50 96 48
                </div>
                <!-- Social -->
                <div class="flex mx-6 items-center">
                    <a href="<?php the_field('linkedin', 'option'); ?>" class="hover:opacity-50" target="_blank">
                        <img width="12" src="<?= get_template_directory_uri( ) ?>/src/img/icon-linkedin.svg" alt="Linkedin ACSEP">
                    </a>
                    <a href="<?php the_field('twitter', 'option'); ?>" class="mx-3 hover:opacity-50" target="_blank">
                        <img width="14" src="<?= get_template_directory_uri( ) ?>/src/img/icon-twitter.svg" alt="twitter ACSEP">
                    </a>
                    <a href="<?php the_field('youtube', 'option'); ?>" class="hover:opacity-50" target="_blank">
                        <img width="14" src="<?= get_template_directory_uri( ) ?>/src/img/icon-youtube.svg" alt="youtube ACSEP">
                    </a>
                </div>
                <!-- Language switcher -->
                <div>
                    <?php
                    $translations = pll_the_languages( array( 'raw' => 1 ) );
                    foreach($translations as $lang):
                    ?>
                    <a href="<?= $lang['url'] ?>" class="ml-2 opacity-50 hover:opacity-100<?php if($lang['current_lang']){echo ' opacity-100';} ?>"><?= ucfirst($lang['slug']); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Main Nav -->
        <div class="main-nav py-3">
            <div class="container relative flex justify-between items-center">
                <div>
                    <a href="<?= pll_home_url(); ?>"><img src="<?= get_template_directory_uri() ?>/src/img/logo-acsep.svg" alt="Logo ACSEP" width="140"></a>
                </div>
                <button class="burger">
                    <div class="line line-1"></div>
                    <div class="line line-2"></div>
                    <div class="line line-3"></div>
                </button>
                <div class="main-menu">
                    <button class="btn-close"></button>
                    <button class="btn-back"></button>
                    <nav class="inner-menu">


                        <!-- Services -->
                        <button class="btn-sub"><?php _e('Services', 'acsep'); ?></button>
                        <div class="submenu lg:grid lg:grid-cols-2">
                            <div>
                                <p class="submenu__title"><?php _e('Services', 'acsep'); ?></p>
                                <ul class="inner-submenu">
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
                                        <a href="<?php the_permalink(); ?>">
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
                            <div class="submenu__image">
                                <a class="img-container img-transition" href="<?php echo get_post_type_archive_link( 'services' ); ?>">
                                    <div class="img-container img-transition"><img src="<?= get_template_directory_uri(  ); ?>/src/img/photos/img-menu-services.jpg" alt="services acsep"></div>
                                </a>
                                <a class="btn-secondary" href="<?php echo get_post_type_archive_link( 'services' ); ?>"><?php _e('Tous nos services', 'acsep'); ?></a>
                            </div>
                        </div>


                        <!-- Solutions -->
                        <button class="btn-sub"><?php _e('Solutions', 'acsep'); ?></button>
                        <div class="submenu lg:grid lg:grid-cols-2">
                            <div>
                                <p class="submenu__title"><?php _e('Solutions', 'acsep'); ?></p>
                                <ul class="inner-submenu">
                                    <li>
                                        <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'izysuite' )->ID)); ?>">
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
                                        <a href="<?php the_permalink(); ?>">
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
                            <div class="submenu__image">
                                <a class="img-container img-transition" href="<?php echo get_post_type_archive_link( 'solutions' ); ?>">
                                    <div class="img-container img-transition"><img src="<?= get_template_directory_uri(  ); ?>/src/img/photos/img-menu-solutions.jpg" alt="solutions acsep"></div>
                                </a>
                                <a class="btn-secondary" href="<?php echo get_post_type_archive_link( 'solutions' ); ?>"><?php _e('Toutes nos solutions', 'acsep'); ?></a>
                            </div>
                        </div>


                        <!-- ACSEP -->
                        <button class="btn-sub">ACSEP</button>
                        <div class="submenu lg:grid lg:grid-cols-2">
                            <div>
                                <p class="submenu__title">ACSEP</p>
                                <ul class="inner-submenu">
                                    <li>
                                        <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'la-societe' )->ID)); ?>"><?php _e('La société', 'acsep'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo get_post_type_archive_link( 'actualites' ); ?>"><?php _e('Actualités & événements', 'acsep'); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo get_post_type_archive_link( 'clients' ); ?>"><?php _e('Nos références', 'acsep'); ?></a>
                                    </li>
                                    <?php
                                    $menuAcsep = get_nav_menu_locations()['menu-acsep'];
                                    $menuAcsepItems = wp_get_nav_menu_items($menuAcsep);
                                    if($menuAcsepItems){
                                        foreach($menuAcsepItems as $item){
                                            echo '<li>';
                                            echo '<a href="' . $item->url . '">';
                                            echo $item->title;
                                            echo '</a>';
                                            echo '</li>';
                                        }     
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="submenu__image">
                                <a class="img-container img-transition" href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'la-societe' )->ID)); ?>">
                                    <div class="img-container img-transition"><img src="<?= get_template_directory_uri(  ); ?>/src/img/photos/img-menu-acsep.jpg" alt="acsep"></div>
                                </a>
                                <a class="btn-secondary" href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'la-societe' )->ID)); ?>"><?php _e('La société', 'acsep'); ?></a>
                            </div>
                        </div>


                        <!-- Rejoignez-nous -->
                        <button class="btn-sub"><?php _e('Rejoignez-nous', 'acsep'); ?></button>
                        <div class="submenu lg:grid lg:grid-cols-2">
                            <div>
                                <p class="submenu__title"><?php _e('Rejoignez-nous', 'acsep'); ?></p>
                                <ul class="inner-submenu">
                                    <li>
                                        <a href="<?php echo get_post_type_archive_link( 'offres-emploi' ); ?>"><?php _e('Offres d\'emploi', 'acsep'); ?></a>
                                    </li>
                                    <?php
                                    $menuRejoignezNous = get_nav_menu_locations()['menu-rejoignez-nous'];
                                    $items = wp_get_nav_menu_items($menuRejoignezNous);
                                    if($items){
                                        foreach($items as $item){
                                            echo '<li>';
                                            echo '<a href="' . $item->url . '">';
                                            echo $item->title;
                                            echo '</a>';
                                            echo '</li>';
                                        }     
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="submenu__image">
                                <a class="img-container img-transition" href="<?php echo get_post_type_archive_link( 'offres-emploi' ); ?>">
                                    <div class="img-container img-transition"><img src="<?= get_template_directory_uri(  ); ?>/src/img/photos/img-menu-rejoignez-nous.jpg" alt="acsep"></div>
                                </a>
                                <a class="btn-secondary" href="<?php echo get_post_type_archive_link( 'offres-emploi' ); ?>"><?php _e('Offres d\'emploi', 'acsep'); ?></a>
                            </div>
                        </div>


                        <!-- Recherche -->
                        <button class="btn-sub btn-search"></button>
                        <div class="submenu submenu-search">
                            <div class="lg:w-2/3 lg:mx-auto lg:pb-6">
                                <p class="submenu__title"><?php _e('Que cherchez-vous ?', 'acsep'); ?></p>
                                <form action="/" method="get" class="form-search">
                                    <div class="input-container"><input type="text" placeholder="" name="s" /></div>
                                    <div class="submit-container"><input type="submit" value="Rechercher"></div>
                                </form>
                            </div>
                        </div>

                        <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'contact' )->ID)); ?>" class="btn-contact">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.5" height="18.514" viewBox="0 0 18.5 18.514">
                                <path id="_1904663_bubble_chat_comment_communication_message_icon" data-name="1904663_bubble_chat_comment_communication_message_icon" d="M15.888,0H2.109A2.109,2.109,0,0,0,0,2.109v9.079A2.109,2.109,0,0,0,2.109,13.3H5.382a.141.141,0,0,1,.141.141v3.576a.984.984,0,0,0,1.68.7l4.37-4.37a.141.141,0,0,1,.1-.041h4.218A2.109,2.109,0,0,0,18,11.189V2.109A2.109,2.109,0,0,0,15.888,0Zm1.265,11.188a1.265,1.265,0,0,1-1.265,1.265H11.67a.984.984,0,0,0-.7.281L6.608,17.111a.141.141,0,0,1-.24-.1V13.437a.984.984,0,0,0-.984-.984H2.109A1.265,1.265,0,0,1,.844,11.188V2.109A1.265,1.265,0,0,1,2.109.844H15.888a1.265,1.265,0,0,1,1.265,1.265Z" transform="translate(0.25 0.25)" fill="#fff" stroke="#fff" stroke-linecap="round" stroke-width="0.5"/>
                            </svg>
                            <?php _e('Parlez à un expert', 'acsep'); ?>
                        </a>
                    </nav>
                    
                </div>
            </div>
        </div>

        <div class="overlay"></div>

        
        
    </header>