
<?php

// Configure les fonctionnalités de bases
function acsep_theme_setup(){

    // Prise en charge des images de mise en avant
    add_theme_support('post-thumbnails');

    // Ajouter automatiquement le titre du site dans l'entete
    add_theme_support('title-tag');

    // Support pour ordonner les pages par attributs
    add_post_type_support( 'post', 'page-attributes' );

    // Ajouts des menus
    register_nav_menus( array(
        'menu-acsep' => 'Menu ACSEP',
        'menu-rejoignez-nous' => 'Menu Rejoignez-nous',
    ) );

}
add_action( 'after_setup_theme', 'acsep_theme_setup' );

// Ajout des scripts
function acsep_theme_register_assets(){

    // CSS
    wp_enqueue_style( 
        'style', 
        get_template_directory_uri() . '/dist/main.css',
        array(),
        '1.0'
    );

    // JS
    wp_enqueue_script( 
        'app', 
        get_template_directory_uri() . '/dist/main.js', 
        array(),
        '1.0',
        true
    );

}
add_action( 'wp_enqueue_scripts', 'acsep_theme_register_assets');


// Custom image size
add_image_size( 'xl', 1440);
add_image_size( 'xxl', 2048);


// Create option page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

//Disable plugin auto-update email notification
add_filter('auto_plugin_update_send_email', '__return_false');

// Cleanup Wordpress
require get_template_directory() . '/inc/cleanup.php';

// Text domain folder
load_theme_textdomain( 'acsep', get_template_directory() . '/languages' );

// Excerpt length
function mytheme_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );


// Remove Articles & Commentaires from admin bar
function post_remove (){ 
   remove_menu_page('edit.php');
   remove_menu_page( 'edit-comments.php' );
}
add_action('admin_menu', 'post_remove'); 



include_once('pll/polylang-translate-rewrite-slugs.php');

function acsep_rewrite_post_type_slug($post_type_translated_slugs)
{
    $post_type_translated_slugs = array(
        'actualites' => array(
            'fr' => array(
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'actualites'
                )
            ),
            'en' => array(
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'news'
                )
            ),
            'es' => array(
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'noticias'
                )
            )
        ),
        'solutions' => array(
            'fr' => array(
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'solutions'
                )
            ),
            'en' => array(
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'solutions'
                )
            ),
            'es' => array(
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'soluciones'
                )
            )
        ),
        'offres-emploi' => array(
            'fr' => array(
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'offres-emploi'
                )
            ),
            'en' => array(
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'job-offers'
                )
            ),
            'es' => array(
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'ofertas-de-empleo'
                )
            )
        ),
        'clients' => array(
            'fr' => array(
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'clients'
                )
            ),
            'en' => array(
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'customers'
                )
            ),
            'es' => array(
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'clientes'
                )
            )
        ),
        'services' => array(
            'fr' => array(
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'services'
                )
            ),
            'en' => array(
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'services'
                )
            ),
            'es' => array(
                'has_archive' => true,
                'rewrite' => array(
                    'slug' => 'servicios'
                )
            )
        ),
    );

    return $post_type_translated_slugs;
}
add_filter('pll_translated_post_type_rewrite_slugs', 'acsep_rewrite_post_type_slug');

