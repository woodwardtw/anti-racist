<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav id="main-nav" class="navbar navbar-expand-md" aria-labelledby="main-nav-label">

			    <div class="row header">
            <div class="col-md-3">
                <div class="title">
                    <a href="<?php echo site_url();?>">
                        <h1>
                            <span class="anti">ANTI</span>
                            <span class="racism">RACISM</span>
                        </h1>
                    </a>
                </div>
            </div>
            <!--end title block-->
            <div class="col-md-4">
            	<?php wp_nav_menu( array( 'theme_location' => 'home-menu' ) ); ?>
                   <!--  <ul>
                        <li><a href="#events">Live Events</a></li>
                        <li><a href="#resources">Learning Opportunities</a></li>
                        <li><a href="#funding">Transformative Projects</a></li>
                        <li><a href="#stories">Stories of Progress</a></li>
                    </ul> -->
            </div>
            <!--end menu block-->
            <div class="col-md-5">
                <div class="etc">
                    <div class="quote">"To be antiracist is a radical choice in the face of history, requiring a radical reorientation of our consciousness."
                    </div>
                    <div class="quote-source">IBRAM X. KENDI</div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="tag-line">
                    &nbsp;
                </div>
            </div>
        </div>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
