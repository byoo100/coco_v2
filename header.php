<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coco_v2
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'coco_v2' ); ?></a>


	<header id="masthead" class="site-header">

		<div class="nav-container">


			<div class="nav-header">
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				</div><!-- .site-branding -->

				<!-- drop-down -->

			</div>


			<nav id="site-navigation" class="nav-left">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'main-menu',
						'menu_id'        => 'primary-menu',
					) );
				?>
			</nav><!-- #site-navigation -->


			<div id="side-navigation" class="nav-right">
				<?php
					if( function_exists('pll_the_languages') ) :

						$args = array(
							'dropdown' => 1,
							'show_names'	=> 1,
						);

						pll_the_languages($args);

					endif;
				?>
			</div>

		</div>

	</header><!-- #masthead -->




	<div id="content" class="site-content">
