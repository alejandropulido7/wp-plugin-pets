<?php
/*
Plugin Name: Pet Calculator
Plugin URI: ''
Description: Calculator of pet food
Author: Alejandro Pulido
Version: 1
Author URI: https://alejandropulido7.github.io/
*/

//Archivo de shortcode

function activate(){
 
}

function desactivate()
{
    flush_rewrite_rules();
}

//activa el plugin
register_activation_hook(__FILE__,'activate');
// desactiva el plugin
register_deactivation_hook(__FILE__,'desactivate');

//Taxonomias
require_once 'taxonomies/pets_taxonomies.php';

function pets_post() {
    $labels = array(
        'name'           => __('Post para mascotas'),
        'singular_name'  => __('Post para mascotas'),
        'menu_name'      => __('Post para mascotas'),
        'name_admin_bar' => __('Post para mascotas'),
        'add_new'        => __('Añadir nueva'),
        'add_new_item'   => __('Añadir nueva sugerencia mascotas'),
        'new_item'       => __('Nuevas sugerencias mascotas'),
        'edit_item'      => __('Editar sugerencia mascotas'),
        'view_item'      => __('Ver sugerencia mascotas'),
        'all_items'      => __('Todos los post de mascotas'),
        'search_items'        => __('Buscar post de mascotas'),
        'parent_item_colon'   => __('Parent post de mascotas'),
        'not_found'           => __('No se han encontrado post de mascotas'),
        'not_found_in_trash'  => __('No se han encontrado post de mascotas en la papelera'),
    );

    $args = array(
        'hierarchical'  => false, 
        'labels' => $labels,
        'description' => __('Description.'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'pets'),
        'capability_type' => 'post',
        'has_archive' => true,
        'menu_position' => 4,
        'menu_icon'   => 'dashicons-pets',
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail'),
        'taxonomies' => array('post_tag'),
    );  

    register_post_type( 'mascotas', $args);

}
add_action( 'init', 'pets_post' );

//CREACION DEL SHORTCODE (TODO LO QUE SE MOSTARÁ)
function showShortcode(){
    require dirname(__FILE__).'/classes/shortcodes.php';
}

function showPostPets()
{
    require dirname(__FILE__).'/classes/content.php';
}

add_action('wp_ajax_nopriv_receive-action', 'showPostPets');
add_action('wp_ajax_receive-action', 'showPostPets');
add_shortcode("PETS_CALCULATOR","showShortcode");

//Redimensionar las imagenes
function resizeImages()
{
    add_image_size('imgPets', 100,100, false);
}

add_action('after_setup_theme','resizeImages');


//Referenciar bootstrap JS
function BootstrapRefJS(){
    wp_enqueue_script('bootstrapJs', plugins_url('admin/bootstrap/js/bootstrap.min.js',__FILE__),array('jquery'), '4.6.0', true);
}

add_action('wp_enqueue_scripts','BootstrapRefJS');

//Referenciar bootstrap CSS
function BootstrapRefCSS(){
    wp_enqueue_style('bootstrapCSS', plugins_url('admin/bootstrap/css/bootstrap.min.css',__FILE__),array(),'4.6.0');
}

add_action('wp_enqueue_scripts','BootstrapRefCSS');

// //Referenciar custom JS
function CustomRefJS(){

    wp_register_script('custom-ajax', plugins_url('admin/js/custom.js',__FILE__), array('jquery'),'1.0',true);
    wp_enqueue_script('custom-ajax');

    wp_localize_script('custom-ajax', 'ajax_object', array(
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax-nonce'),
        'hook' => 'receive-action',
    ));    
}

add_action('wp_enqueue_scripts','CustomRefJS');

//Referenciar bootstrap CSS
function CustompRefCSS(){
    wp_enqueue_style('CustompRefCSS', plugins_url('admin/css/custom.css',__FILE__),array());
}

add_action('wp_enqueue_scripts','CustompRefCSS');