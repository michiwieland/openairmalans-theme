<?php
namespace Neocode\Theme;

class CPT {

    function __construct() {

    	add_action( 'init', array( $this, 'cpt_artists') );
      add_action( 'init', array( $this, 'cpt_infos') );
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

    // Information
    function cpt_infos() {

        $labels = array(
            'name'                => 'Infos',
            'singular_name'       => 'Info',
            'menu_name'           => 'Infos',
            'all_items'           => 'Alle Infos',
            'view_item'           => 'Infos ansehen',
            'add_new'             => 'Neue Info',
            'add_new_item'        => 'Neue Info hinzufügen',
            'edit_item'           => 'Info bearbeiten',
            'search_items'        => 'Info suchen',
            'not_found'           => 'Nichts gefunden',
        );
        $args = array(
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor'),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 22,
            'menu_icon'           => 'dashicons-info',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'rewrite'             => false,
            //'rewrite'             => array('slug'=>'angebot','with_front'=>true),
            'capability_type'     => 'page',
        );
        register_post_type( 'infos', $args );

    }

}
