<?php

if ( ! function_exists( 'unsinnig_block_styles' ) ) :
    function unsinnig_block_styles()
    {
        register_block_style(
			'core/heading',
            array(
                "name" => "boxed",
                "label" => __("Boxed Text", "unsinnig"),
                "inline_style" => "
                    .is-style-boxed {
                        background-color: black;
                        padding: .7rem 0 0.5rem 0;
                        color: white;
                        -webkit-box-shadow: .7rem 0 0 black -.7rem 0 0 black;
                        box-shadow: .7rem 0 0 black, -.7rem 0 0 black;
                        -webkit-box-decoration-break: clone;
                        -moz-box-decoration-break: clone;
                        box-decoration-break: clone;
                        line-height: 1.25;
                        width: fit-content;
                        display: inline;
                    }
                "
            )
        );
    }
endif;

add_action('init', 'unsinnig_block_styles');

$blocks = glob(__DIR__ . '/blocks/*', GLOB_ONLYDIR);

foreach($blocks as $block) {
    add_action( 'init', function() use ($block) {
        register_block_type( $block );
    });
}

/** Register child theme style */
function unsinnig_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'unsinnig-child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
}
add_action( 'wp_enqueue_scripts', 'unsinnig_child_enqueue_styles' );

add_action( 'init', 'unsinnig_add_excerpts_to_pages' );
function unsinnig_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}