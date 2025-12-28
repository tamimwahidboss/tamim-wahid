<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Tamim_Wahid_Portfolio
 */
get_header();
get_template_part('template-parts/global/title');
?>
<!-- Main Content Starts -->
<section class="main-content revealator-slideup revealator-once revealator-delay1">
    <div class="container">
        <!-- Articles Starts -->
        <div class="row">
            <div class="col-md-12">
                <div class="error-404 not-found">
                    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'tamim-wahid' ); ?></h1>
                    <p><?php esc_html_e( 'It looks like nothing was found at this location.', 'tamim-wahid' ); ?></p>
                    <a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <span class="button-text">Home Page</span>
                        <span class="button-icon fa fa-arrow-right"></span>
                    </a>
        </div>
    </div>
</section>
<?php
get_footer();