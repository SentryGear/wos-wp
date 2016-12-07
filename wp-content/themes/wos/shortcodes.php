<?php

function post_lead( $atts = null, $content = null ) {
  $string = '<span class="container-overview-special">' . do_shortcode( $content ) . '</span>';

  return $string;
}

add_shortcode( "lead", "post_lead" );
