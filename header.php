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
                    <a href="<?php the_field('linkedin', 'option'); ?>" class="hover:opacity-50">
                        <img width="12" src="<?= get_template_directory_uri( ) ?>/src/img/icon-linkedin.svg" alt="Linkedin ACSEP">
                    </a>
                    <a href="<?php the_field('twitter', 'option'); ?>" class="mx-3 hover:opacity-50">
                        <img width="14" src="<?= get_template_directory_uri( ) ?>/src/img/icon-twitter.svg" alt="twitter ACSEP">
                    </a>
                    <a href="<?php the_field('youtube', 'option'); ?>" class="hover:opacity-50">
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
        <div class="bg-light py-3">
            <div class="container relative flex justify-between items-center">
                <div>
                    <a href="<?= get_site_url(); ?>"><img src="<?= get_template_directory_uri() ?>/src/img/logo-acsep.svg" alt="Logo ACSEP" width="140"></a>
                </div>
                <button class="burger">
                    <div class="line line-1"></div>
                    <div class="line line-2"></div>
                    <div class="line line-3"></div>
                </button>
                <div class="main-menu">
                    <button class="btn-close"></button>
                    <button class="btn-back"></button>
                    <nav>
                        <!-- Services -->
                        <button class="btn-sub"><?php _e('Services', 'acsep'); ?></button>
                        <?php 
                        $args = array(
                            'theme_location'=>'menu-services',
                            'container_class'=>'submenu'
                        );
                        wp_nav_menu($args); 
                        ?>

                        <!-- Solutions -->
                        <button class="btn-sub"><?php _e('Solutions', 'acsep'); ?></button>
                        <?php 
                        $args = array(
                            'theme_location'=>'menu-solutions',
                            'container_class'=>'submenu'
                        );
                        wp_nav_menu($args); 
                        ?>

                        <!-- ACSEP -->
                        <button class="btn-sub">ACSEP</button>
                        <?php 
                        if(has_nav_menu( 'menu-acsep' )){
                            $args = array(
                                'theme_location'=>'menu-acsep',
                                'container_class'=>'submenu'
                            );
                            wp_nav_menu($args);     
                        }
                        ?>

                        <!-- Rejoignez-nous -->
                        <a href=""><?php _e('Rejoignez-nous', 'acsep'); ?></a>

                        <!-- Recherche -->
                        <button class="btn-search"></button>

                        <a href="" class="btn-contact">
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