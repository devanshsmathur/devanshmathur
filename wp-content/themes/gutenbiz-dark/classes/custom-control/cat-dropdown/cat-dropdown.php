<?php
/** 
 * Customizer Control: darkbiz-category-dropdown
 *
 * @since 1.0.0
 * @package Darkbiz WordPress Theme
 */

# Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( class_exists( 'WP_Customize_Control' ) ) {
    class Gutenbiz_Dark_Category_Dropdown extends WP_Customize_Control {
        /**
         * Declare the control type.
         *
         * @access public
         * @var string
         */
        public $type = 'gutenbiz-category-dropdown';

        /**
         * Function to  render the content on the theme customizer page
         *
         * @access public
         * @since 1.0.0
         *
         * @param null
         * @return void
         * @package Darkbiz WordPress Theme
         *
         */
        public function render_content() {
            $dropdown_categories = wp_dropdown_categories(
                array(
                    'name' => $this->id,
                    'show_option_all'  => esc_html__( 'All', 'gutenbiz-dark' ),
                    'echo'              => 0,
                    'order'             => 'DESC',
                    'selected'          => $this->value()
                )
            );
            $dropdown_final = str_replace( '<select', '<select ' . $this->get_link(), $dropdown_categories );
            printf(
                '<label>
                    <span class="customize-control-title">%s</span>
                    <span class="customize-control-description">%s</span>
                    %s
                </label>',
                $this->label,
                $this->description,
                $dropdown_final
            );
        }
    }
}

Gutenbiz_Customizer::add_custom_control( array(
    'type'     => 'gutenbiz-category-dropdown',
    'class'    => 'Gutenbiz_Dark_Category_Dropdown',
    'sanitize' =>  'absint',
    'register_control_type' => false
));