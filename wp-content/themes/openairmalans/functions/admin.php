<?php
namespace Neocode\Theme;

class Admin {

    function __construct() {

        add_action( 'admin_menu', array( $this, 'remove_menus' ) );
        $this->wp_role();

        add_filter( 'tiny_mce_before_init', array( $this, 'force_paste_as_plain_text' ) );

        add_filter( 'tiny_mce_before_init', array( $this, 'mce_change_block_formats' ) );

        add_filter( 'mce_buttons', array( $this, 'mce_remove_buttons' ) );
        add_filter( 'mce_buttons_2', array( $this, 'mce_remove_buttons' ) );

        add_action( 'init', array( $this, 'register_menus' ) );

    }


    /**
     * Remove pages from admin menu;
     * http://codex.wordpress.org/Function_Reference/remove_menu_page
     */

    function remove_menus() {

        // Remove pages for editors
        if( current_user_can( 'editor' ) ) {
            // Appearance Menu
            remove_submenu_page( 'themes.php', 'themes.php' ); // Appearance -> Theme
            global $submenu;
            unset( $submenu['themes.php'][6] ); // Appearance -> Customize
        }

        // Remove pages for non-administrators
        if( ! current_user_can( 'administrator' ) ) {
            remove_menu_page( 'tools.php' );
        }

    }


    /**
     * Add permition to edit the menu
     */

    function wp_role() {
        // get the the role object
        $role_object = get_role( 'editor' );

        // add $cap capability to this role object
        $role_object->add_cap( 'edit_theme_options' );
    }


    /**
     * Force to paste text as plain text into the editor
     */

    function force_paste_as_plain_text($mceInit) {
        $mceInit['paste_as_text'] = true;
        return $mceInit;
    }


    /**
     * Change block formats in MCE editor
     * http://wordpress.stackexchange.com/questions/45815/disable-h1-and-h2-from-rich-text-editor-combobox
     */

    function mce_change_block_formats($arr) {
        $arr['block_formats'] = 'Paragraph=p;Heading 1=h2;Heading 2=h3';
        return $arr;
    }


    /**
     * Remove buttons from the editor;
     * http://codex.wordpress.org/Plugin_API/Filter_Reference/mce_buttons,_mce_buttons_2,_mce_buttons_3,_mce_buttons_4
     */

    function mce_remove_buttons( $buttons ) {

        // Buttons to remove
        $remove = array(
            // 'bold',
            // 'underline',
            'blockquote',
            'hr',
            'wp_more',
            'alignjustify',
            'forecolor',
            'alignright',
            'alignleft',
            'aligncenter',
            'indent',
            'outdent'
        );

        // Return buttons
        return array_diff( $buttons, $remove );
    }


    /**
     * Register menus
     */

    function register_menus() {
        register_nav_menus(
            array(
            	'top' => __('Top Menu', 'neocode')
            )
        );
    }

}