<?php

include ( get_template_directory() . '/includes/front/enqueue.php' );

add_action( 'wp_enqueue_scripts', 'wos_enqueue' );
