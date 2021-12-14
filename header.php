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
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/0d55835ef38be4e02b8a2e9d2/c4ae2935bae56386c7b926d2a.js");</script>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav id="main-nav" class="navbar navbar-expand-md" >

		    <div class="row header">
                <div class="col-md-3">
                    <div class="title">
                        <a href="<?php echo site_url();?>">
                            <h1>
                                <span class="anti">ANTI</span>
                                <span class="racism">RACISM</span>
                            <!-- <span class="midd">@Middlebury</span> -->
                            </h1>
                        </a>
                    </div>
                </div>
            <!--end title block-->
            <div class="col-md-4">
            	<?php wp_nav_menu( array( 'theme_location' => 'home-menu' ) ); ?>
            </div>
            <!--end menu block-->
            <div class="col-md-5">
                <div class="etc">
                   <?php echo ar_random_quote();?>
            </div>
            <div class="col-md-12">
                <div class="tag-line">
                    &nbsp;
                </div>
            </div>
        </div>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
