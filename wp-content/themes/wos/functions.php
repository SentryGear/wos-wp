<?php

require get_template_directory() . '/requires/shortcodes.php';

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

function special()
{
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

add_action("admin_print_footer_scripts", "special");

add_action( 'wp_enqueue_scripts', 'wos_enqueue' );
