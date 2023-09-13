<?php
function fwd_register_custom_post_types()
{

    // Register Works
    $labels = array(
        'name' => _x('Works', 'post type general name'),
        'singular_name' => _x('Work', 'post type singular name'),
        'menu_name' => _x('Works', 'admin menu'),
        'name_admin_bar' => _x('Work', 'add new on admin bar'),
        'add_new' => _x('Add New', 'work'),
        'add_new_item' => __('Add New Work'),
        'new_item' => __('New Work'),
        'edit_item' => __('Edit Work'),
        'view_item' => __('View Work'),
        'all_items' => __('All Works'),
        'search_items' => __('Search Works'),
        'parent_item_colon' => __('Parent Works:'),
        'not_found' => __('No works found.'),
        'not_found_in_trash' => __('No works found in Trash.'),
        'archives' => __('Work Archives'),
        'insert_into_item' => __('Insert into work'),
        'uploaded_to_this_item' => __('Uploaded to this work'),
        'filter_item_list' => __('Filter works list'),
        'items_list_navigation' => __('Works list navigation'),
        'items_list' => __('Works list'),
        'featured_image' => __('Work featured image'),
        'set_featured_image' => __('Set work featured image'),
        'remove_featured_image' => __('Remove work featured image'),
        'use_featured_image' => __('Use as featured image'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'works'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 50,
        'menu_icon' => 'dashicons-archive',
        'supports' => array('title', 'thumbnail', 'editor'),
    );

    register_post_type('fwd-work', $args);

    // Register Testimonials
    $labels = array(
        'name' => _x('Testimonials', 'post type general name'),
        'singular_name' => _x('Testimonial', 'post type singular name'),
        'menu_name' => _x('Testimonials', 'admin menu'),
        'name_admin_bar' => _x('Testimonial', 'add new on admin bar'),
        'add_new' => _x('Add New', 'testimonial'),
        'add_new_item' => __('Add New Testimonial'),
        'new_item' => __('New Testimonial'),
        'edit_item' => __('Edit Testimonial'),
        'view_item' => __('View Testimonial'),
        'all_items' => __('All Testimonials'),
        'search_items' => __('Search Testimonials'),
        'parent_item_colon' => __('Parent Testimonials:'),
        'not_found' => __('No testimonials found.'),
        'not_found_in_trash' => __('No testimonials found in Trash.'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'testimonials'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 51,
        'menu_icon' => 'dashicons-heart',
        'supports' => array('title', 'editor'),
        'template' => array(array('core/quote')),
    );

    register_post_type('fwd-testimonial', $args);

    $labels = array(
        'name' => _x('Our Services', 'post type general name'),
        'singular_name' => _x('Service', 'post type singular name'),
        'menu_name' => _x('Our Services', 'admin menu'),
        'name_admin_bar' => _x('Job Posting', 'add new on admin bar'),
        'add_new' => _x('Add New', 'service'),
        'add_new_item' => __('Add New Service'),
        'new_item' => __('New Service'),
        'edit_item' => __('Edit Service'),
        'view_item' => __('View Service'),
        'all_items' => __('All Services'),
        'search_items' => __('Search Services'),
        'parent_item_colon' => __('Parent Services:'),
        'not_found' => __('No Services found.'),
        'not_found_in_trash' => __('No Services found in Trash.'),
        'insert_into_item' => __('Insert into Our Services'),
        'uploaded_to_this_item' => __('Uploaded to this Our Services'),
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'our-services'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 52,
        'menu_icon' => 'dashicons-universal-access-alt',
        'supports' => array('title'),
        'template' => array(),
        'template_lock' => 'all',
    );
    register_post_type('fwd-our-services', $args);
}
add_action('init', 'fwd_register_custom_post_types');

function change_add_post_placeholder_title($title)
{
    $screen = get_current_screen();

    if ('fwd-our-services' == $screen->post_type) {
        $title = 'Add Service name';
    }
    return $title;
}

// Register taxonomy
function fwd_register_taxonomies()
{
    // Add Work Category taxonomy
    $labels = array(
        'name' => _x('Work Categories', 'taxonomy general name'),
        'singular_name' => _x('Work Category', 'taxonomy singular name'),
        'search_items' => __('Search Work Categories'),
        'all_items' => __('All Work Category'),
        'parent_item' => __('Parent Work Category'),
        'parent_item_colon' => __('Parent Work Category:'),
        'edit_item' => __('Edit Work Category'),
        'view_item' => __('Vview Work Category'),
        'update_item' => __('Update Work Category'),
        'add_new_item' => __('Add New Work Category'),
        'new_item_name' => __('New Work Category Name'),
        'menu_name' => __('Work Category'),
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menu' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'work-categories'),
    );
    register_taxonomy('fwd-work-category', array('fwd-work'), $args);

    // Add Featured taxonomy
    $labels = array(
        'name' => _x('Featured', 'taxonomy general name'),
        'singular_name' => _x('Featured', 'taxonomy singular name'),
        'search_items' => __('Search Featured'),
        'all_items' => __('All Featured'),
        'parent_item' => __('Parent Featured'),
        'parent_item_colon' => __('Parent Featured:'),
        'edit_item' => __('Edit Featured'),
        'update_item' => __('Update Featured'),
        'add_new_item' => __('Add New Featured'),
        'new_item_name' => __('New Work Featured'),
        'menu_name' => __('Featured'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'featured'),
    );

    register_taxonomy('fwd-featured', array('fwd-work'), $args);

    // Add Services taxonomy
    $labels = array(
        'name' => _x('Our Services', 'taxonomy general name'),
        'singular_name' => _x('Services', 'taxonomy singular name'),
        'search_items' => __('Search Services'),
        'all_items' => __('All Services'),
        'parent_item' => __('Parent Services'),
        'parent_item_colon' => __('Parent Services:'),
        'edit_item' => __('Edit Services'),
        'update_item' => __('Update Services'),
        'add_new_item' => __('Add New Services'),
        'new_item_name' => __('New Work Services'),
        'menu_name' => __('Our Services'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'our-services'),
    );

    register_taxonomy('fwd-our-services', array('fwd-our-services'), $args);
}
add_action('init', 'fwd_register_taxonomies');

// Flush rewrites when changing themes
add_filter('enter_title_here', 'change_add_post_placeholder_title');
function fwd_rewrite_flush()
{
    fwd_register_custom_post_types();
    fwd_register_taxonomies();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'fwd_rewrite_flush');