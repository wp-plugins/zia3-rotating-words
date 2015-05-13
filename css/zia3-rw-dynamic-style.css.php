<?php

    header("Content-type: text/css; charset: UTF-8");

    require_once('../../../../wp-load.php');
	require_once('../../../../wp-includes/post.php');

    global $custom_meta_fields;
	global $post;

    $sequence_id = $_GET["zia3_rw_sequence_id"];
    $atts = shortcode_atts(array('id' => '', 'font_family' => 'Trocchi', 'font_size' => '800', 'pos_left' => '220' , 'pos_top' => '220', 'rw_height' => '80',
            'rw_width' => '400', 'words_pos' => '3' ), $atts);
	$genShortcode = get_post_meta( $sequence_id, 'genShortcode', true );

    //Variables
    $genShortcodeArray = get_post_meta( $sequence_id, 'genShortcode', true );
	$genShortcodeArray = str_replace('"', "", $genShortcodeArray);
	$genShortcodeArray = str_replace("'", "", $genShortcodeArray);
	$genShortcodeArray = str_replace('[', "", $genShortcodeArray);
	$genShortcodeArray = str_replace(']', "", $genShortcodeArray);

    preg_match_all("/([^ = ]+)=([^ = ]+)/", $genShortcodeArray, $match);
    $result = array_combine($match[1], $match[2]);

    $prefix = 'custom_';
	$zia3_rw_phrases_meta_key = $prefix.'repeatable';
    $font_family = $result['font_family'];
	$font_size = $result['font_size'];
    $pos_top = $result['pos_top'];
	$pos_left = $result['pos_left'];
    $rw_height = $result['rw_height'];
    $rw_width = $result['rw_width'];
	$rwords_pos = $result['rwords_pos'];

	$text_sent_1 = get_post_meta( $sequence_id, $prefix.'text_sent_1', true);
	$text_sent_2 = get_post_meta( $sequence_id, $prefix.'text_sent_2', true);
	$text_sent_3 = get_post_meta( $sequence_id, $prefix.'text_sent_3', true);
	$text_sent_4 = get_post_meta( $sequence_id, $prefix.'text_sent_4', true);
	$text_top_1 = get_post_meta( $sequence_id, $prefix.'text_top_1', true);
	$text_top_2 = get_post_meta($sequence_id, $prefix.'text_top_2', true);
	$text_top_3 = get_post_meta( $sequence_id, $prefix.'text_top_3', true);
	$text_top_4 = get_post_meta( $sequence_id, $prefix.'text_top_4', true);
	$text_left_1 = get_post_meta( $sequence_id, $prefix.'text_left_1', true);
	$text_left_2 = get_post_meta( $sequence_id, $prefix.'text_left_2', true);
	$text_left_3 = get_post_meta( $sequence_id, $prefix.'text_left_3', true);
	$text_left_4 = get_post_meta( $sequence_id, $prefix.'text_left_4', true);
	$text_color_1 = get_post_meta( $sequence_id, $prefix.'text_color_1', true);
	$text_color_2 = get_post_meta( $sequence_id, $prefix.'text_color_2', true);
	$text_color_3 = get_post_meta( $sequence_id, $prefix.'text_color_3', true);
	$text_color_4 = get_post_meta( $sequence_id, $prefix.'text_color_4', true);
	$background_image = get_post_meta( $sequence_id, $prefix.'background_image', true);

    $words = get_post_meta( $sequence_id, $zia3_rw_phrases_meta_key, true );

    $my_zia3_rw_meta = get_post_meta($atts['id'], $zia3_rw_phrases_meta_key, true);

    $rw_height_max = $rw_height + $text_top_4;
	$wordenum = count($words);
    $counter = 0;
    $delay = 3;
	$animation_duration = $wordenum * $delay;



?>
@import url(http://fonts.googleapis.com/css?family=<?php echo $font_family; ?>);

/* Clearfix hack by Nicolas Gallagher: http://nicolasgallagher.com/micro-clearfix-hack/ */
.clearfix:before, .clearfix:after { content: " "; display: table; }
.clearfix:after { clear: both; }

.zia3-rw-container{
	background: #fff url(<?php echo $background_image; ?>) no-repeat top right;
	background-attachment: fixed;
	background-size: cover;
	width: 100%;
	height: 100%;
}

.zia3-rw-wrapper{
	width: 80%;
	height:<?php echo $rw_height_max; ?>px;
	position: relative;
	margin: 0px auto 0 auto;
	padding: 10px;
}
.zia3-rw-sentence{
	margin: 0;
}
.zia3-rw-sentence span{
	text-align: center;
	color: rgba(<?php echo $text_color_1; ?>);
	font-family: '<?php echo $font_family; ?>';
	white-space: nowrap;
	text-shadow: 2px 5px 10px rgba(0,0,0,0.1);
}
.zia3-rw-sentence > span{
	position: absolute;
}
.zia3-rw-sentence > span:first-child{
	top: <?php echo $text_top_1; ?>px;
	left: <?php echo $text_left_1; ?>px;
	font-size: 100%;
	color: rgba(<?php echo $text_color_1; ?>);
}
.zia3-rw-sentence > span:nth-child(2){
	top: <?php echo $text_top_2; ?>px;
	left: <?php echo $text_left_2; ?>px;
	font-size: 100%;
	color: rgba(<?php echo $text_color_2; ?>);
}
.zia3-rw-sentence > span:nth-child(3){
	top: <?php echo $text_top_3; ?>px;
	left: <?php echo $text_left_3; ?>px;
	font-size: 100%;
	color: rgba(<?php echo $text_color_3; ?>);
}
.zia3-rw-sentence > span:last-child{
	top: <?php echo $text_top_4; ?>px;
	left: <?php echo $text_left_4; ?>px;
	font-size: 100%;
	color: rgba(<?php echo $text_color_4; ?>);
}
.zia3-rw-words{
	position: absolute;
	left: <?php echo $pos_left; ?>px;
	top: <?php echo $pos_top; ?>px;
	height: <?php echo $rw_height; ?>px;
	width: <?php echo $rw_width; ?>px;
	-webkit-perspective: 800px;
	-moz-perspective: 800px;
	-o-perspective: 800px;
	-ms-perspective: 800px;
	perspective: 800px;
}

<?php while($counter < $wordenum)  {
	if($counter == 0) {
?>
.zia3-rw-words span{
	position: absolute;
	font-size: <?php echo $font_size; ?>%;
	color: transparent;
	text-shadow: 0px 0px 80px rgba(255,255,255,1);
	opacity: 0;
	-webkit-animation: rotateWord <?php echo $animation_duration; ?>s linear infinite 0s;
	-moz-animation: rotateWord <?php echo $animation_duration; ?>s linear infinite 0s;
	-o-animation: rotateWord <?php echo $animation_duration; ?>s linear infinite 0s;
	-ms-animation: rotateWord <?php echo $animation_duration; ?>s linear infinite 0s;
	animation: rotateWord <?php echo $animation_duration; ?>s linear infinite 0s;
}
<?php  }

	else {
?>
.zia3-rw-words span:nth-child(<?php echo ($counter+1); ?>) {
    -webkit-animation-delay: <?php echo ($counter*$delay); ?>s;
	-moz-animation-delay: <?php echo ($counter*$delay); ?>s;
	-o-animation-delay: <?php echo ($counter*$delay); ?>s;
	-ms-animation-delay: <?php echo ($counter*$delay); ?>s;
	animation-delay: <?php echo ($counter*$delay); ?>s;
}
<?php  }

    $counter++;
 }
?>

@-webkit-keyframes rotateWord {
    0% { opacity: 0; -webkit-animation-timing-function: ease-in; -webkit-transform: translateY(-200px) translateZ(300px) rotateY(-120deg); }
    5% { opacity: 1; -webkit-animation-timing-function: ease-out; -webkit-transform: translateY(0px) translateZ(0px) rotateY(0deg); }
	6% { text-shadow: 0px 0px 0px rgba(255,255,255,1); color #fff; }
    17% { opacity: 1; text-shadow: 0px 0px 0px rgba(255,255,255,1); color #fff; }
    20% { opacity: 0; }
    100% { opacity: 0; }
}
@-moz-keyframes rotateWord {
    0% { opacity: 0; -moz-animation-timing-function: ease-in; -moz-transform: translateY(-200px) translateZ(300px) rotateY(-120deg); }
    5% { opacity: 1; -moz-animation-timing-function: ease-out; -moz-transform: translateY(0px) translateZ(0px) rotateY(0deg); }
	6% { text-shadow: 0px 0px 0px rgba(255,255,255,1); color #fff; }
    17% { opacity: 1; text-shadow: 0px 0px 0px rgba(255,255,255,1); color #fff; }
    20% { opacity: 0; }
    100% { opacity: 0; }
}
@-o-keyframes rotateWord {
    0% { opacity: 0; -o-animation-timing-function: ease-in; -o-transform: translateY(-200px) translateZ(300px) rotateY(-120deg); }
    5% { opacity: 1; -o-animation-timing-function: ease-out; -o-transform: translateY(0px) translateZ(0px) rotateY(0deg); }
	6% { text-shadow: 0px 0px 0px rgba(255,255,255,1); color #fff; }
    17% { opacity: 1; text-shadow: 0px 0px 0px rgba(255,255,255,1); color #fff; }
    20% { opacity: 0; }
    100% { opacity: 0; }
}
@-ms-keyframes rotateWord {
    0% { opacity: 0; -ms-animation-timing-function: ease-in; -ms-transform: translateY(-200px) translateZ(300px) rotateY(-120deg); }
    5% { opacity: 1; -ms-animation-timing-function: ease-out; -ms-transform: translateY(0px) translateZ(0px) rotateY(0deg); }
	6% { text-shadow: 0px 0px 0px rgba(255,255,255,1); color #fff; }
    17% { opacity: 1; text-shadow: 0px 0px 0px rgba(255,255,255,1); color #fff; }
    20% { opacity: 0; }
    100% { opacity: 0; }
}
@keyframes rotateWord {
    0% { opacity: 0; animation-timing-function: ease-in; transform: translateY(-200px) translateZ(300px) rotateY(-120deg); }
    5% { opacity: 1; animation-timing-function: ease-out; transform: translateY(0px) translateZ(0px) rotateY(0deg); }
	6% { text-shadow: 0px 0px 0px rgba(255,255,255,1); color #fff; }
    17% { opacity: 1; text-shadow: 0px 0px 0px rgba(255,255,255,1); color #fff; }
    20% { opacity: 0; }
    100% { opacity: 0; }
}



