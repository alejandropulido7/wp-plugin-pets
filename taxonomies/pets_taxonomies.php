<?php

//Taxonomia del tipo de mascota
function taxonomy_pets() {

    //Taxonomia tipo de mascota
    $type_pet = array(
        'hierarchical'  => true, 
        'labels' => array(
            'name' => __( 'Tipo de mascota'),
            'singular_name' => __('Tipo de mascota'),
            'search_items' => __('Buscar tipo de mascota'),
            'all_items' => __('Todos los tipos de mascotas'),
            'parent_item' => __('Padre tipo de mascota'),
            'parent_item_colon' => __('Padre tipo de mascota:'),
            'edit_item' => __('Editar tipo de mascota'),
            'update_item' => __('Actualizar tipo de mascota'),
            'add_new_item' => __('Añadir nuevo tipo de mascota'),
            'menu_name' => ('Tipo mascota'),
        ),
        'show_ui' => true,
        'public' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'type_pet'),
        'query_var' => true,
        'show_in_rest' => true,
        'show_in_nav_menu' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy('type-pet', array('mascotas'), $type_pet);

    //Taxonomia peso de mascota
    $weight_pet = array(
        'hierarchical'  => true, 
        'labels' => array(
            'name' => __( 'Peso de la mascota' ),
            'add_new_item' => __('Añadir nuevo peso de mascota'),
            'edit_item' => __('Editar peso de mascota'),
            'update_item' => __('Actualizar peso de mascota'),
            'menu_name' => ('Peso de mascota'),
        ),
        'public' => false,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'weight_pet'),
        'query_var' => true,
    );
    register_taxonomy('weight-pet', array('mascotas'), $weight_pet);

    //Taxonomia edad de mascota
    $age_pet = array(
        'hierarchical'  => true, 
        'labels' => array(
            'name' => __( 'Edad de la mascota' ),
            'search_items' => __('Buscar edad mascota'),
            'add_new_item' => __('Añadir nueva edad de mascota'),
            'edit_item' => __('Editar edad de mascota'),
            'update_item' => __('Actualizar edad de mascota'),
            'menu_name' => ('Edad de mascota'),
        ),
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'age_pet'),
        'query_var' => true,
    );

    register_taxonomy('age-pet', array('mascotas'), $age_pet);
}
add_action( 'init', 'taxonomy_pets' );
?>