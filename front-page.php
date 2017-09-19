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

      <section id="home-welcome">

        <div class="home-container">

          <object type="image/svg+xml" class="coco-logo" data=<?php echo get_template_directory_uri() . "/dist/images/coco_v2.svg" ?> alt=""></object>

          <h1 class="welcome-title"><?php echo $data['welcome']['en']['title'] ?></h1>
          <h3 class="welcome-subtitle"><?php echo $data['welcome']['en']['subtitle1'] ?></h3>
          <h3 class="welcome-subtitle"><?php echo $data['welcome']['en']['subtitle2'] ?></h3>

        </div>

      </section>


      <section id="home-location">

        <div class="home-container">

          <div class="location-info">
            <h1 class="location-title nowrap"><?php echo $data['location']['en']['title'] ?></h1>
            <h5 class="location-address">
              <div class="nowrap"><?php echo $data['location']['en']['address1'] ?></div>
              <div><?php echo $data['location']['en']['address2'] ?></div>
            </h5>
            <p class="location-description"><?php echo $data['location']['en']['description'] ?></p>
          </div>

          <div id="google-map">
            <?php
              if(get_field('google_map')){
                $location = get_field('google_map');
                echo "<div class=acf-map>";
                echo "<div class=marker data-lat=" . $location['lat'] . " data-lng=" . $location['lng'] . "></div>";
                echo "</div>";
              }
        		?>
          </div>
        </div>

      </section>



      <section id="home-about">

        <div id="f1_container">
        <div id="f1_card" class="shadow">
          <div class="front face">
            <img src="/images/Windows%20Logo.jpg"/>
          </div>
          <div class="back face center">
            <p>This is nice for exposing more information about an image.</p>
            <p>Any content can go here.</p>
          </div>
        </div>
        </div>


        <div class="home-container">

          <div class="about-info">
            <h1 class="about-title"><?php echo $data['about']['en']['title'] ?></h1>
            <p class="about-text"><?php echo $data['about']['en']['text'] ?></p>
          </div>

          <div class="about-image">

          </div>
        </div>

      </section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
