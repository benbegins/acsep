
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
        'menu-solutions' => 'Menu Solutions',
        'menu-services' => 'Menu Services',
        'menu-acsep' => 'Menu ACSEP',
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