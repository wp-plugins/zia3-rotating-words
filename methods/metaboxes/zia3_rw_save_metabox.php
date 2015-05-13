<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    global $post;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
  	return;

    // OK, we're authenticated: we need to find and save the data

    if (!current_user_can('edit_post', $post_id))
  	return;

    if( !isset( $_POST['phraseIDs'] ) )
	$phraseIDs = '';

    if( !isset( $_POST['genShortcode'] ) )
	$genShortcode = '';

	// Field Array
	$prefix = 'custom_';
    $custom_meta_fields = array(
	        array(
				'label'=> 'Sentence 1',
				'desc'  => 'Enter Sentence 1',
				'id'    => $prefix.'text_sent_1',
				'type'  => 'text'
		    ),
		    array(
				'label'=> 'Sentence 1 Position Top',
				'desc'  => 'Enter Position in Pixels from Top for Sentence 1',
				'id'    => $prefix.'text_top_1',
				'type'  => 'text'
		    ),
		    array(
				'label'=> 'Sentence 1 Position Left',
				'desc'  => 'Enter Position in Pixels from Left for Sentence 1',
				'id'    => $prefix.'text_left_1',
				'type'  => 'text'
		    ),
		    array(
				'label'=> 'Sentence 1 Color',
				'desc'  => 'Enter Color in RGBA (255,255,255,0.5) for Sentence 1',
				'id'    => $prefix.'text_color_1',
				'type'  => 'text'
		    ),
		    array(
				'label'=> 'Sentence 2',
				'desc'  => 'Enter Sentence 2',
				'id'    => $prefix.'text_sent_2',
				'type'  => 'text'
		    ),
		    array(
				'label'=> 'Sentence 2 Position Top',
				'desc'  => 'Enter Position in Pixels from Top for Sentence 2',
				'id'    => $prefix.'text_top_2',
				'type'  => 'text'
		    ),
		    array(
				'label'=> 'Sentence 2 Position Left',
				'desc'  => 'Enter Position in Pixels from Left for Sentence 2',
				'id'    => $prefix.'text_left_2',
				'type'  => 'text'
		    ),
		    array(
				'label'=> 'Sentence 2 Color',
				'desc'  => 'Enter Color in RGBA (255,255,255,0.5) for Sentence 2',
				'id'    => $prefix.'text_color_2',
				'type'  => 'text'
		    ),
		    array(
				'label'=> 'Sentence 3',
				'desc'  => 'Enter Sentence 3',
				'id'    => $prefix.'text_sent_3',
				'type'  => 'text'
		    ),
		    array(
				'label'=> 'Sentence 3 Position Top',
				'desc'  => 'Enter Position in Pixels from Top for Sentence 3',
				'id'    => $prefix.'text_top_3',
				'type'  => 'text'
		    ),
		    array(
				'label'=> 'Sentence 3 Position Left',
				'desc'  => 'Enter Position in Pixels from Left for Sentence 3',
				'id'    => $prefix.'text_left_3',
				'type'  => 'text'
		    ),
		    array(
				'label'=> 'Sentence 3 Color',
				'desc'  => 'Enter Color in RGBA (255,255,255,0.5) for Sentence 3',
				'id'    => $prefix.'text_color_3',
				'type'  => 'text'
		    ),
		    array(
				'label'=> 'Sentence 4',
				'desc'  => 'Enter Sentence 4',
				'id'    => $prefix.'text_sent_4',
				'type'  => 'text'
		    ),
		    array(
				'label'=> 'Sentence 4 Position Top',
				'desc'  => 'Enter Position in Pixels from Top for Sentence 4',
				'id'    => $prefix.'text_top_4',
				'type'  => 'text'
		    ),
		    array(
				'label'=> 'Sentence 4 Position Left',
				'desc'  => 'Enter Position in Pixels from Left for Sentence 4',
				'id'    => $prefix.'text_left_4',
				'type'  => 'text'
		    ),
		    array(
				'label'=> 'Sentence 4 Color',
				'desc'  => 'Enter Color in RGBA (255,255,255,0.5) for Sentence 4',
				'id'    => $prefix.'text_color_4',
				'type'  => 'text'
		    ),
		    array(
				'label'=> 'Background Image Url',
				'desc'  => 'Enter Background Image Url',
				'id'    => $prefix.'background_image',
				'type'  => 'text'
		    ),
	        array(
					'label'      => 'Rotating Words',
					'desc'       => 'Enter Words you want to rotate.',
					'id'         => $prefix.'repeatable',
					'link'       => '<a href="http://zia3.com">Zia3</a>',
					'type'       => 'rw_sentence_repeatable_combo'
			)
	);

	// loop through fields and save the data
	foreach ($custom_meta_fields as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	} // end foreach

    if( isset( $_POST['phraseIDs'] ) )
	$phraseIDs = sanitize_text_field( $_POST['phraseIDs'] );
	add_post_meta($post_id, "phraseIDs", $phraseIDs, true) or update_post_meta( $post_id, "phraseIDs", $phraseIDs );

    if( isset( $_POST['genShortcode'] ) )
	$genShortcode = sanitize_text_field( $_POST['genShortcode'] );
	add_post_meta($post_id, "genShortcode", $genShortcode, true) or update_post_meta( $post_id, "genShortcode", $genShortcode );
