<?php
/**
 * Create options for posts.
 *
 * @since 1.0.0
 *
 * @package Gutenbiz WordPress theme
 */

function gutenbiz_post_options(){  
    Gutenbiz_Customizer::set(array(
    	# Theme Options
    	'panel'   => 'panel',
    	# Theme Options > Page Options > Settings
    	'section' => array(
    		'id'    => 'post-options',
    		'title' => esc_html__( 'Post Options','gutenbiz' ),
    	),
    	'fields' => array(
            array(
                'id'      => 'post-category',
                'label'   =>  esc_html__( 'Show Categories', 'gutenbiz' ),
                'default' => 1,
                'type'    => 'toggle',
            ),
            array(
                'id'      => 'post-date',
                'label'   => esc_html__( 'Show Date', 'gutenbiz' ),
                'default' => 1,
                'type'    => 'toggle',
            ),
            array(
                'id'      => 'post-author',
                'label'   =>  esc_html__( 'Show Author', 'gutenbiz' ),
                'default' => 1,
                'type'    => 'toggle',
            ),
            array(
                'id'      => 'excerpt_length',
                'label'   => esc_html__( 'Excerpt Length', 'gutenbiz' ),
                'description' => esc_html__( 'Defaults to 10.', 'gutenbiz' ),
                'default' => 10,
                'type'    => 'number',
            ),
            array(
                'id'      => 'read-more-text',
                'label'   => esc_html__( 'Read More Text', 'gutenbiz' ),
                'default' => esc_html__( 'Read More', 'gutenbiz' ),
                'type'    => 'text'
            ),
            array(
                'id' => 'post-per-row',
                'label' => esc_html__( 'Post Per Row', 'gutenbiz' ),
                'type' => 'buttonset',
                'default' => '3',
                'choices' => array(
                    '1' => esc_html__( '1', 'gutenbiz' ),
                    '2' => esc_html__( '2', 'gutenbiz' ),
                    '3' => esc_html__( '3', 'gutenbiz' ),
                    '4' => esc_html__( '4', 'gutenbiz' )
                )
            ),
     	),
    ) );
}
add_action( 'init', 'gutenbiz_post_options' );