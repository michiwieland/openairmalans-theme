<?php
namespace Neocode\Theme;

class CPT {

    function __construct() {

        add_action( 'init', array( $this, 'cpt_artists') );
    	add_action( 'init', array( $this, 'cpt_impressions') );

    }

    /**
     * Custom Post Type
     */

    // Artist
    function cpt_artists() {

        $labels = array(
            'name'                => 'Künstler',
            'singular_name'       => 'Künstler',
            'menu_name'           => 'Künstler',
            'all_items'           => 'Alle Künstler',
            'view_item'           => 'Künstler ansehen',
            'add_new'             => 'Neuer Künstler',
            'add_new_item'        => 'Neue Künstler hinzufügen',
            'edit_item'           => 'Künstler bearbeiten',
            'search_items'        => 'Künstler suchen',
            'not_found'           => 'Nichts gefunden',
        );
        $args = array(
            'labels'              => $labels,
            'supports'            => array( 'title', 'thumbnail', 'revisions' ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 22,
            'menu_icon'           => 'dashicons-groups',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'rewrite'             => false,
            //'rewrite'             => array('slug'=>'angebot','with_front'=>true),
            'capability_type'     => 'page',
        );
        register_post_type( 'artists', $args );

    }


    // Impression
    function cpt_impressions() {

        $labels = array(
            'name'                => 'Impressionen',
            'singular_name'       => 'Impression',
            'menu_name'           => 'Impressionen',
            'all_items'           => 'Alle Impressionen',
            'view_item'           => 'Impression ansehen',
            'add_new'             => 'Neue Impressionen',
            'add_new_item'        => 'Neue Impression hinzufügen',
            'edit_item'           => 'Impression bearbeiten',
            'search_items'        => 'Impression suchen',
            'not_found'           => 'Nichts gefunden',
        );
        $args = array(
            'labels'              => $labels,
            'supports'            => array( 'title', 'thumbnail', 'revisions' ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 23,
            'menu_icon'           => 'dashicons-format-gallery',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'rewrite'             => false,
            //'rewrite'             => array('slug'=>'angebot','with_front'=>true),
            'capability_type'     => 'page',
        );
        register_post_type( 'impressions', $args );

    }

}
