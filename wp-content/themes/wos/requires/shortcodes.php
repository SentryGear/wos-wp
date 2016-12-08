<?php

function post_special( $atts = null, $content = null ) {
  $string = '<span class="container-overview-special">' . do_shortcode( $content ) . '</span>';

  return $string;
}

add_shortcode( "special", "post_special" );
