<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Marsh Corporate
 */

/**
 *
 * @hooked marsh_corporate_footer_start
 */
do_action( 'marsh_corporate_action_before_footer' );

/**
 * Hooked - marsh_corporate_footer_top_section -10
 * Hooked - marsh_corporate_footer_section -20
 */
do_action( 'marsh_corporate_action_footer' );

/**
 * Hooked - marsh_corporate_footer_end. 
 */
do_action( 'marsh_corporate_action_after_footer' );

wp_footer(); ?>

</body>  
</html>