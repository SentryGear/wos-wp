<?php

require get_template_directory() . '/requires/shortcodes.php';

add_filter( 'posts_where', 'title_like_posts_where', 10, 2 );

function title_like_posts_where( $where, &$wp_query ) {
  global $wpdb;

  if ( $post_title_like = $wp_query->get( 'post_title_like' ) ) {
    $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
  }

  return $where;
}

function wos_enqueue() {
  wp_register_style( 'wos_style', get_template_directory_uri() . '/style.css' );

  wp_enqueue_style( 'wos_style' );

  wp_register_script( 'wos_jquery', get_template_directory_uri() . '/public/scripts/jquery.min.js' );
  wp_register_script( 'wos_jquery_mousewheel', get_template_directory_uri() . '/public/scripts/jquery.mousewheel.min.js' );
  wp_register_script( 'wos_choreographer', get_template_directory_uri() . '/public/scripts/choreographer.min.js', array(), false, true );
  wp_register_script( 'wos_platform', get_template_directory_uri() . '/public/scripts/platform.min.js', array(), false, true );
  wp_register_script( 'wos_slick', get_template_directory_uri() . '/public/scripts/slick.min.js', array(), false, true );
  wp_register_script( 'wos_main', get_template_directory_uri() . '/public/scripts/main.js', array(), false, true );

  wp_enqueue_script( 'wos_jquery' );
  wp_enqueue_script( 'wos_jquery_mousewheel' );
  wp_enqueue_script( 'wos_choreographer' );
  wp_enqueue_script( 'wos_platform' );
  wp_enqueue_script( 'wos_slick' );
  wp_enqueue_script( 'wos_main' );
}

function special() {
  if(wp_script_is("quicktags")) {
    ?>
    <script type="text/javascript">

    function getSel() {
      var txtarea = document.getElementById("content");
      var start = txtarea.selectionStart;
      var finish = txtarea.selectionEnd;
      return txtarea.value.substring(start, finish);
    }

    QTags.addButton( "special_shortcode", "special", callback );

    function callback() {
      var selected_text = getSel();
      QTags.insertContent( '[special]' +  selected_text + '[/special]' );
    }
    </script>
    <?php
  }
}

function remove_menus() {
  remove_menu_page( 'edit-comments.php' );
  remove_menu_page( 'edit.php?post_type=page' );
  remove_menu_page( 'edit.php' );
  remove_menu_page( 'themes.php' );
  remove_menu_page( 'users.php' );
}

add_action( 'admin_menu', 'remove_menus' );

add_action("admin_print_footer_scripts", "special");

add_action( 'wp_enqueue_scripts', 'wos_enqueue' );
