<?php
/**
 * This is a global title template part for the Tamim Wahid Portfolio theme.
 * It displays the page title dynamically based on the context of the page.
 * If the page is a specific type (like a page, home, or portfolio), it retrieves the title accordingly.
 * If no specific title is set, it defaults to a predefined title.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Page Title Function
 */
function tw_display_page_title() {
    if ( is_page() ) {
        $title = get_the_title();
    } elseif ( is_home() && ! is_front_page() ) {
        $title = get_the_title( get_option( 'page_for_posts' ) );
    } elseif ( is_single( 'portfolio' ) ) {
        $title = get_the_title();
    } elseif ( is_404() ) {
        $title = esc_html__( '404 Page Found', 'tamim-wahid' );
    } else {
        $title = esc_html__( 'My Published Post', 'tamim-wahid' );
    }
    $page_title = explode( ' ', $title );
    $str_page_title = count( $page_title ) > 3;
    

    echo '<section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-12">';
    if ( is_singular( 'post' ) ) {
        echo '<h1>' . get_the_title() . '</h1>';
    } elseif ( ! ($str_page_title) ) {
        echo '<h1>';
        echo isset( $page_title[0] ) ? esc_html( $page_title[0] ) : '';
        echo '<span>' . ' '.( isset( $page_title[1] ) ? esc_html( $page_title[1] ) : '' ) . '</span>';
        echo '</h1>';
        echo '<span class="title-bg">' . ( isset( $page_title[2] ) ? esc_html( $page_title[2] ) : '' ) . '</span>';
    } else {
        echo '<h1>' . get_the_title() . '</h1>';
    }
    echo '</div>'; // .col-12
    echo '</div>'; // .row
    echo '</div>'; // .container
    echo '</section>';
}
tw_display_page_title();