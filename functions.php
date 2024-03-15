<?php
function luminus_enqueue_styles() {
    wp_enqueue_style('luminus-core-style', get_template_directory_uri() . '/assets/css/core.css');
}
add_action('wp_enqueue_scripts', 'luminus_enqueue_styles');

function luminus_enqueue_scripts() {
    wp_enqueue_script('luminus-core-script', get_template_directory_uri() . "/assets/js/core.js");
}

add_action('wp_enqueue_scripts', 'luminus_enqueue_scripts');

function luminus_setup() {
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'luminus_setup');

function luminus_register_menus() {
    register_nav_menus(array(
        'header' => esc_html__('Header Menu', 'luminus'),
        'footer' => esc_html__('Footer Menu', 'luminus'),
    ));
}
add_action('after_setup_theme', 'luminus_register_menus');

class Custom_Nav_Walker extends Walker_Nav_Menu {
    // Add classes to the ul sub-menus
    function start_lvl( &$output, $depth = 0, $args = null ) {
        // Depth-dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $classes = array(
            'dropdown-menu'
        );
        $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        // Build HTML for output
        $output .= "\n" . $indent . '<ul' . $class_names . ' aria-labelledby="navbarDropdown">' . "\n";
    }

    // Add main menu and sub-menu classes to li items
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        // Depth-dependent classes
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'nav-item';
        if (in_array('menu-item-has-children', $classes) || in_array('page_item_has_children', $classes)) {
            $classes[] = 'dropdown';
        }
        if (in_array('current-menu-item', $classes)) {
            $classes[] = 'active';
        }
        // Add 'dropdown' class to li items with children
        $classes[] = ( $args->has_children ? 'dropdown' : '' );
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        // Build HTML for output
        $output .= $indent . '<li' . $class_names . '>';

        // Link attributes
        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        $atts['class']  = 'nav-link';
        // If item has_children add atts to a.
        if ( $args->has_children && $depth === 0 ) {
            $atts['class']            = 'nav-link dropdown-toggle';
            $atts['id']               = 'navbarDropdown';
            $atts['role']             = 'button';
            $atts['data-bs-toggle']   = 'dropdown';
            $atts['aria-haspopup']    = 'true';
            $atts['aria-expanded']    = 'false';
        }

        // Build HTML for output
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        // Add 'active' class to current menu item
        $class_names = $args->has_children ? 'dropdown-toggle' : '';
        if (in_array('current-menu-item', $classes) && $depth === 0) {
            $class_names .= ' active';
        }

        // Build HTML for output
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        // Output
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

function custom_echo_header_menu() {
    wp_nav_menu(array(
        'theme_location' => 'header',
        'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
        'walker' => new Custom_Nav_Walker()
    ));
}
