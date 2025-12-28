<?php
// Retrieve the csf saved option value
$options = get_option( 'tw_portfolio' );

// Get the values
$hero_profile_img = isset( $options['hero-profile-img'] ) ? $options['hero-profile-img']['url'] : '';
$avatar = isset( $options['avatar'] ) ? $options['avatar']['url'] : '';
$profile_name = isset( $options['profile-name'] ) ? $options['profile-name'] : '';
$profile_desc = isset( $options['profile-desc'] ) ? $options['profile-desc'] : '';
$profile_btn_title = isset( $options['profile-btn'] ) ? $options['profile-btn']['text'] : '';
$profile_btn_link = isset( $options['profile-btn'] ) ? $options['profile-btn']['url'] : '';


if ( isset( $hero_profile_img ) && ! empty( $hero_profile_img ) ) :
    // Main Content Starts
    echo '<section class="container-fluid main-container container-home p-0 revealator-slideup revealator-once revealator-delay1">';
    echo '<div class="color-block d-none d-lg-block"></div>';
    echo '<div class="row home-details-container align-items-center">';
    echo '<div class="col-lg-4 position-fixed d-none d-lg-block" style="background-image: url('. $hero_profile_img .'); background-size: cover;background-repeat: no-repeat;background-position: top;height: calc(100vh - 80px);z-index: 111;border-radius: 30px;left: 40px;top: 40px;box-shadow: 0 0 7px rgba(0,0,0,.9); "></div>';
    echo '<div class="col-12 col-lg-8 offset-lg-4 home-details text-left text-sm-center text-lg-left">';
    echo '<div>';

    if ( isset( $avatar ) && ! empty( $avatar ) ) :
        echo '<img src="' . $avatar . '" class="img-fluid main-img-mobile d-none d-sm-block d-lg-none"/>';
    endif;

    if ( isset( $profile_name ) && ! empty( $profile_name ) ) :
        echo '<h1 class="text-uppercase poppins-font">' . $profile_name . ' <span> '. $options['profile-profe'] .' </span></h1>';
    endif;

    if ( isset( $profile_desc ) && ! empty( $profile_desc ) ) :
        echo '<p class="open-sans-font">'. $profile_desc .'</p>';
    endif;

    if ( ! empty( $profile_btn_title ) && ! empty( $profile_btn_link ) ) :
        echo '<a class="button" href="' . $profile_btn_link . '">';
        echo '<span class="button-text">' . $profile_btn_title . '</span>';
        echo '<span class="button-icon fa fa-arrow-right"></span>';
        echo '</a>';
    endif;
    
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</section>';
    // Main Content Ends
endif;