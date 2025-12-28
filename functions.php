<?php
/**
 * Tamim Wahid Portfolio functions and definitions
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Implement the theme support
 */
require get_template_directory() . '/inc/theme-support.php';

/**
 * Implement the wp enqueue script.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Implement the codestar framework.
 */
require get_template_directory() . '/inc/csf-customize.php';

/**
 * Implement the codestar framework.
 */
require get_template_directory() . '/inc/csf-meta.php';

/**
 * Implement the TGM plugin.
 */
require_once get_template_directory() . '/inc/tgm/myactiveplugin.php';

// Add custom class in wp_nav_menu list item
if ( ! function_exists( 'tw_custom_menu_item_class' ) ) {
    function tw_custom_menu_item_class($classes, $item, $args) {
        if($args->theme_location == 'primary') {
            $classes[] = 'icon-box';
        }
        return $classes;
    }
    add_filter('nav_menu_css_class','tw_custom_menu_item_class', 10, 3);
}

/**
 * Add custom body classes based on the current page.
 *
 * @param array $classes Existing body classes.
 * @return array Modified body classes.
 */

if ( ! function_exists( 'tw_custom_body_classes' ) ) {
    function tw_custom_body_classes( $classes ) {
        if ( is_front_page() && is_home() ) {
            // Default homepage
            $classes = array( 'homepage' );
        } elseif ( is_front_page() ) {
            // static homepage
            $classes[] = 'home';
        } elseif ( is_home() || is_archive() ) {
            // blog page
            $classes[] = 'blog';
        } elseif ( is_single() ) {
            // archive page
            $classes[] = 'blog-post';
        } elseif ( is_page('my-portfolio') ) {
            // portfolio page
            $classes[] =  'portfolio';
        }  elseif ( is_page('hire-me') ) {
            // hire me page
            $classes[] = 'contact';
        } elseif ( is_page( 'about-me' ) ) {
            // contact page
            $classes[] = 'about';
        } else {
            //everything else
            $classes[] = 'tw-class';
        }
        return $classes;
    }
    add_filter( 'body_class', 'tw_custom_body_classes' );
}



// Add form handling hook
add_action( 'admin_post_nopriv_handle_contact_form', 'handle_contact_form' );
add_action( 'admin_post_handle_contact_form', 'handle_contact_form' );

function handle_contact_form() {
    // Sanitize form data
    $name = sanitize_text_field( $_POST['name'] );
    $email = sanitize_email( $_POST['email'] );
    $subject = sanitize_text_field( $_POST['subject'] );
    $message = sanitize_textarea_field( $_POST['message'] );

    // Process the form (e.g., send an email or store data in the database)
    $to = get_option( 'admin_email' ); // Send to site admin
    $headers = array( 'Content-Type: text/html; charset=UTF-8', "From: $name <$email>" );
    $mail_sent = wp_mail( $to, $subject, $message, $headers );

    // Redirect after form submission
    if ( $mail_sent ) {
        wp_redirect( home_url( '/thank-you/' ) ); // Redirect to a Thank You page
        exit;
    } else {
        wp_redirect( home_url( '/error/' ) ); // Redirect to an error page
        exit;
    }
}
