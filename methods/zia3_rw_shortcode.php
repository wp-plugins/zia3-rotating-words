<?php
if ( ! defined( 'ABSPATH' ) ) exit;

    $atts = shortcode_atts(array('id' => '', 'font_family' => 'Trochhi', 'font_size' => '800', 'pos_left' => '220' , 'pos_top' => '220', 'rw_height' => '80', 'rw_width' => '400',
                                 'rwords_pos' => '3'), $atts);
    $phrases = get_post_meta( $atts['id'], 'phraseIDs', true );

    //Variables
    $prefix = 'custom_';
    $font_family = $atts['font_family'];
	$font_size = $atts['font_size'];
    $pos_top = $atts['pos_top'];
	$pos_left = $atts['pos_left'];
    $rw_height = $atts['rw_height'];
    $rw_width = $atts['rw_width'];
	$rwords_pos = $atts['rwords_pos'];
	$text_sent_1 = get_post_meta( $atts['id'], $prefix.'text_sent_1', true);
	$text_sent_2 = get_post_meta( $atts['id'], $prefix.'text_sent_2', true);
	$text_sent_3 = get_post_meta( $atts['id'], $prefix.'text_sent_3', true);
	$text_sent_4 = get_post_meta( $atts['id'], $prefix.'text_sent_4', true);
	$text_top_1 = get_post_meta( $atts['id'], $prefix.'text_top_1', true);
	$text_top_2 = get_post_meta( $atts['id'], $prefix.'text_top_2', true);
	$text_top_3 = get_post_meta( $atts['id'], $prefix.'text_top_3', true);
	$text_top_4 = get_post_meta( $atts['id'], $prefix.'text_top_4', true);
	$text_left_1 = get_post_meta( $atts['id'], $prefix.'text_left_1', true);
	$text_left_2 = get_post_meta( $atts['id'], $prefix.'text_left_2', true);
	$text_left_3 = get_post_meta( $atts['id'], $prefix.'text_left_3', true);
	$text_left_4 = get_post_meta( $atts['id'], $prefix.'text_left_4', true);
	$text_color_1 = get_post_meta( $atts['id'], $prefix.'text_color_1', true);
	$text_color_2 = get_post_meta( $atts['id'], $prefix.'text_color_2', true);
	$text_color_3 = get_post_meta( $atts['id'], $prefix.'text_color_3', true);
	$text_color_4 = get_post_meta( $atts['id'], $prefix.'text_color_4', true);


    //Enque Dynamic CSS specific to the chosen rotating words
    wp_register_style('zia3-rw-style', plugins_url('../css/zia3-rw-dynamic-style.css.php'."?zia3_rw_sequence_id=".$atts['id'], __FILE__), null, 'all');
    wp_enqueue_style('zia3-rw-style');


    $phrase = explode(",", $phrases);
    $phrasenum = count($phrase);

    $replacement = '';

    $replacement .= <<<HEREDOC


<!--  Start Zia3 Rotating Words -->
<div class="zia3-rw-container">
    <section class="zia3-rw-wrapper" id="zia3-rw-wrapper">
        <h2 class="zia3-rw-sentence">

HEREDOC;

    global $custom_meta_fields;
	$zia3_rw_phrases_meta_key = 'custom_repeatable';
    $my_zia3_rw_meta = get_post_meta($atts['id'], $zia3_rw_phrases_meta_key, true);
	//inset sentences
	if (is_page() || is_single()) {
		// loop through fields and insert the data
		if($text_sent_1) {
			$replacement .= "<span>" .$text_sent_1. "</span>\n";
			$rw_sent_pos =1;
			if($rwords_pos == $rw_sent_pos) {
				$replacement .= '<div class="zia3-rw-words">';
				if($my_zia3_rw_meta) {
					foreach ($my_zia3_rw_meta as $field) {
						$replacement .= "<span>" .$field. "</span>\n";
					}
				}
				rewind_posts();
				$replacement .= '</div>';
			}
		}
		if($text_sent_2) {
			$replacement .= "<span>" .$text_sent_2. "</span>\n";
			$rw_sent_pos =2;
			if($rwords_pos == $rw_sent_pos) {
				$replacement .= '<div class="zia3-rw-words">';
				if($my_zia3_rw_meta) {
					foreach ($my_zia3_rw_meta as $field) {
						$replacement .= "<span>" .$field. "</span>\n";
					}
				}
				rewind_posts();
				$replacement .= '</div>';
			}
		}
		if($text_sent_3) {
			$replacement .= "<span>" .$text_sent_3. "</span>\n";
			$rw_sent_pos =3;
			if($rwords_pos == $rw_sent_pos) {
				$replacement .= '<div class="zia3-rw-words">';
				if($my_zia3_rw_meta) {
					foreach ($my_zia3_rw_meta as $field) {
						$replacement .= "<span>" .$field. "</span>\n";
					}
				}
				rewind_posts();
				$replacement .= '</div>';
			}
		}
		if($text_sent_4) {
			$replacement .= "<span>" .$text_sent_4. "</span>\n";
			$rw_sent_pos =4;
			if($rwords_pos == $rw_sent_pos) {
				$replacement .= '<div class="zia3-rw-words">';
				if($my_zia3_rw_meta) {
					foreach ($my_zia3_rw_meta as $field) {
						$replacement .= "<span>" .$field. "</span>\n";
					}
				}
				rewind_posts();
				$replacement .= '</div>';
			}
		}
	}

    $replacement .= '</h2>
			</section>
		</div>';





