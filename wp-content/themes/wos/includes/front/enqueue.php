<?php

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
