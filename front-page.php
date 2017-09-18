<?php
/**
 * The front page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package coco_v2
 */

get_header();

$lang_KOR = false;

if (function_exists('pll_current_language')) :

  if( pll_current_language() === 'ko' ) {
    $lang_KOR = true;
  }

endif;


include_once('page-data/data-frontpage.php');


?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

      <section id="welcome">

        <div class="home-container">

          <object type="image/svg+xml" class="coco-logo" data=<?php echo get_template_directory_uri() . "/dist/images/coco_v2.svg" ?> alt=""></object>

          <h1 class="welcome-title"><?php echo $data['welcome']['en']['title'] ?></h1>
          <h3 class="welcome-subtitle"><?php echo $data['welcome']['en']['subtitle1'] ?></h3>
          <h3 class="welcome-subtitle"><?php echo $data['welcome']['en']['subtitle2'] ?></h3>

        </div>

      </section>


      <section id="location">

        <div class="home-container">

          <h1 class="location-title"><?php echo $data['location']['en']['title'] ?></h1>
          <h3 class="location-address"><?php echo $data['location']['en']['address1'] ?></h3>
          <h3 class="location-address"><?php echo $data['location']['en']['address2'] ?></h3>
          <p class="location-description"><?php echo $data['location']['en']['description'] ?></p>

        </div>

      </section>

		<?php

    echo $data['welcome']['title'];


		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
