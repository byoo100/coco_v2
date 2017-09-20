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

          <h1 class="welcome-title"><?php echo $data['welcome']['title']; ?></h1>
          <h3 class="welcome-subtitle"><?php echo $data['welcome']['subtitle1'] ?></h3>
          <h3 class="welcome-subtitle"><?php echo $data['welcome']['subtitle2'] ?></h3>

        </div>

      </section>




      <section id="home-about">

        <div class="home-container">

          <div class="about-info">
            <h1 class="home-title">
              <?php if( $lang_KOR ){
                echo $data['about']['kr']['title'];
              } else {
                echo $data['about']['en']['title'];
              } ?>
            </h1>
            <p class="about-text">
              <?php if( $lang_KOR ){
                echo $data['about']['kr']['text'];
              } else {
                echo $data['about']['en']['text'];
              } ?>
            </p>
          </div>
        </div>

      </section>




      <section id="home-location">

        <div class="home-container">

          <div class="location-info">
            <h1 class="home-title nowrap">
              <?php if( $lang_KOR ){
                echo $data['location']['kr']['title'];
                echo '<span class="title-translation">';
                echo $data['location']['en']['title'];
                echo '</span>';
              } else {
                echo $data['location']['en']['title'];
              } ?>
            </h1>

            <h5 class="location-address">
              <div class="nowrap"><?php echo $data['location']['address1'] ?></div>
              <div><?php echo $data['location']['address2'] ?></div>
            </h5>

            <p class="location-description">
              <?php if( $lang_KOR ){
                echo $data['location']['kr']['description'];
              } else {
                echo $data['location']['en']['description'];
              }
              ?>
            </p>

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




      <section id="home-resources">

        <div class="home-container">

          <?php
            $resources = array('resource1', 'resource2', 'resource3', 'resource4');

            for( $i=0; $i< count($resources); $i++ ) :

          ?>

            <div class="resource-outter">

              <div class="resource-inner shadow">

                <div class="front face">

                  <h3 class="resource-title">
                    <?php if( $lang_KOR ){
                      echo $data['resources']['kr'][$resources[$i]]['title'];
                      echo '<span class="title-translation">';
                      echo $data['resources']['en'][$resources[$i]]['title'];
                      echo '</span>';
                    } else {
                      echo $data['resources']['en'][$resources[$i]]['title'];
                    } ?>

                  </h3>


                  <?php
                    $imgLocation = get_template_directory_uri() . '/dist/images/';

                    $image_set = '<img src="%2$s" srcset="%1$s %2$s"></img>';

                    $image_set = sprintf( $image_set,
                      "{$imgLocation}{$resources[$i]}@xs.jpg 300w,",
                      "{$imgLocation}{$resources[$i]}@sm.jpg 768w"
          					);

                    echo $image_set;
                  ?>

                </div>

                <div class="back face center">
                  <p>
                    <?php if( $lang_KOR ){
                      echo $data['resources']['kr'][$resources[$i]]['text'];
                    } else {
                      echo $data['resources']['en'][$resources[$i]]['text'];
                    } ?>
                </div>
              </div>
            </div>

          <?php endfor; ?>


        </div>

      </section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
