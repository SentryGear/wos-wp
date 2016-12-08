<?php

function render_contacts() {
  $query = array(
    'post_type'   => 'contact',
    'post_status' => 'publish'
  );

  $contact_list = new WP_Query( $query );

  if ($contact_list->have_posts()) {
    while ( $contact_list->have_posts() ) {
      $contact_list->the_post();
      $pods_contact = pods( get_post_type(), get_the_ID() );

      $pod_contact = $pods_contact->field( 'contact' );

      if ( $pods_contact->field( 'email' ) == 1 ) {
        echo "<p><a href=mailto:" . $pod_contact . ">" . $pod_contact . "</a></p>";
      } elseif ($pods_contact->field( 'email' ) == 0) {
        echo "<p>" . $pod_contact . "</p>";
      }
    }
  }

  wp_reset_query();
}

function render_intro() {
  $query = array(
    'post_type'   => 'intro_content',
    'post_status' => 'publish'
  );

  $content = new WP_Query( $query );

  $intro = array();

  if ($content->have_posts()) {
    while ( $content->have_posts() ) {
      $content->the_post();
      $post_content = do_shortcode(get_post_field('post_content'));

      if (get_the_title() == 'Image') {
        $pods_post = pods( get_post_type(), get_the_ID() );
        $image = $pods_post->field( 'image' );
        $post_content = $image['guid'];
      }

      $intro[get_the_title()] = $post_content;
    }
  }

  ?>

  <div class="container-overview-text"><?php echo $intro['Main text']; ?></div>
  <div class="container-overview-portrait">
    <div style="background-image:url( <?php echo $intro['Image']; ?> );" class="container-overview-portrait-image" id="container-overview-portrait-image"></div>
    <div class="container-overview-portrait-description"><?php echo $intro['Image caption']; ?></div>
  </div>

  <?php

  wp_reset_query();
}

function render_stores() {
  $query = array(
    'post_type'      => 'store',
    'posts_per_page' => -1,
    'orderby'        => 'ID',
    'order'          => 'ASC',
    'post_status'    => 'publish'
  );

  $store_list = new WP_Query( $query );

  $locations = array();
  $regions = array();
  $cities = array();

  $stores = array();

  if ($store_list->have_posts()) {
    while ( $store_list->have_posts() ) {
      $store_list->the_post();

      $terms_region_name = wp_get_post_terms( get_the_ID(), 'region', array("fields" => "names"));
      array_push($regions, $terms_region_name[0]);

      $terms_city_name = wp_get_post_terms( get_the_ID(), 'city', array("fields" => "names"));
      array_push($cities, $terms_city_name[0]);

      $temp = array($terms_region_name[0] => $terms_city_name[0]);
      array_push($locations, $temp);

      $pods_stores = pods( get_post_type(), get_the_ID() );
      $stores_link = $pods_stores->field( 'link' );

      $store = array(
        "name"   => get_the_title(),
        "region" => $terms_region_name[0],
        "city"   => $terms_city_name[0],
        "link"   => $stores_link
      );

      array_push($stores, $store);
    }
  }

  $locations = array_map("unserialize", array_unique(array_map("serialize", $locations)));

  $unique_regions = array_unique($regions);
  $unique_cities = array_unique($cities);

  foreach ($unique_regions as &$region) {
    ?>
    <div class="container-stores-zones-zone">
      <div class="container-stores-zones-zone-title"><?php echo $region; ?></div>
      <div class="container-stores-zones-zone-list">
        <?php
        foreach ($unique_cities as &$city) {

          foreach ($locations as &$location) {
            $key = array_search($city, $location);

            if ($key == $region) {
              echo '<h6>' . $city . '</h6>';
            }
          }

          foreach ($stores as $store) {
            if (($store['region'] == $region) && ($store['city']) == $city) {
              if ($store['link'] == '') {
                echo '<p>' . $store['name'] . '</p>';
              } else {
                echo '<a target="_blank" href="' . $store['link'] . '">' . $store['name'] . '</a>';
              }
            }
          }
        }
        ?>
      </div>
    </div>
    <?php
  }

  wp_reset_query();
}

function wos_get_media($media) {
  $query = array(
    'post_type'       => 'media_content',
    'post_status'     => 'publish',
    'post_title_like' => $media
  );

  $content = new WP_Query( $query );

  if ($content->have_posts()) {
    while ( $content->have_posts() ) {
      $content->the_post();

      $pods_post = pods( get_post_type(), get_the_ID() );
      $media_file = $pods_post->field( 'media_file' );
    }
  }

  wp_reset_query();

  return $media_file['guid'];
}
