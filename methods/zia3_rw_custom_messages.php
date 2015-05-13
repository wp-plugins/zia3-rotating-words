<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	global $post, $post_ID;
	$messages['zia3_rw'] = array(
	0 => '', // Unused. Messages start at index 1.
	1 => sprintf( __('Rotating Words updated.') ),
	2 => __('Custom Field updated.'),
	3 => __('Custom Field deleted.'),
	4 => __('Rotating Words updated.'),
	/* translators: %s: date and time of the revision */
	5 => isset($_GET['revision']) ? sprintf( __('Rotating Words restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
	6 => sprintf( __('Rotating Words published.') ),
	7 => __('Rotating Words saved.'),
	8 => sprintf( __('Rotating Words submitted.') ),
	9 => sprintf( __('Rotating Words scheduled for: <strong>%1$s</strong>.'),
 	 // translators: Publish box date format, see http://php.net/date
  	date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
	10 => sprintf( __('Rotating Words draft updated.') )
	);