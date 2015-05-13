<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	global $post;
	$id = get_the_ID();
    wp_register_script('zia3-rw-shortcode-generator', plugins_url('../../js/shortcodegenerator.js',__FILE__), array('jquery'), null, 1 );
	wp_register_style('zia3-rw-admin', plugins_url('../../css/zia3.rw.admin.css', __FILE__), null, 1);

    wp_enqueue_style('zia3-rw-admin');
    wp_enqueue_script('zia3-rw-shortcode-generator');



    //Variables
    $genShortcodeArray = get_post_meta( $id, 'genShortcode', true );
	$genShortcodeArray = str_replace('"', "", $genShortcodeArray);
	$genShortcodeArray = str_replace("'", "", $genShortcodeArray);
	$genShortcodeArray = str_replace('[', "", $genShortcodeArray);
	$genShortcodeArray = str_replace(']', "", $genShortcodeArray);

    preg_match_all("/([^ = ]+)=([^ = ]+)/", $genShortcodeArray, $match);
    $result = array_combine($match[1], $match[2]);


    $font_family = $result['font_family'];
	$font_size = $result['font_size'];
    $pos_top = $result['pos_top'];
	$pos_left = $result['pos_left'];
    $rw_height = $result['rw_height'];
    $rw_width = $result['rw_width'];
	$rwords_pos = $result['rwords_pos'];

    $genShortcode = get_post_meta( $id, 'genShortcode', true );


	$genShortcode = str_replace('"', "'", $genShortcode);
	$exampleGenShortcode = str_replace('"', "'", $exampleGenShortcode);

	if ( !isset( $genShortcode ) || empty( $genShortcode ) ){
		echo '<form><input type="button" class="button" name="zia3_rw_shortcodeg_button" id="zia3_rw_shortcodeg_button" value="Generate Your Own Shortcode" /><br><br>';
		echo '<div id="zia3_rw_example_shortcode">Example Shortcode: <input type="text" spellcheck="false" onclick="this.focus();this.select()" readonly="readonly" style="width:650px;max-width:100%" value="[ zia3-rw id=\'' . $id .
		     '\' font_family=\'Trocchi\' font_size=\'800\' pos_top=\'220\' pos_left=\'220\' rw_height=\'80\' rw_width=\'400\' rwords_pos=\'1\' ]"/> </div>';
		$exampleGenShortcode = '[ zia3-rw id=\'' . $id . '\' font_family=\'Trocchi\' font_size=\'800\' pos_top=\'220\' pos_left=\'220\' rw_height=\'80\' rw_width=\'400\' rwords_pos=\'1\' ]';
		$genShortcode = $exampleGenShortcode;
	}
	else{
		echo '<form><input type="button" class="button" name="zia3_rw_shortcodeg_button" id="zia3_rw_shortcodeg_button" value="Generate a New Shortcode" /><br><br>';
		echo '<div id="zia3_rw_example_shortcode">Your Custom Shortcode: <input type="text" spellcheck="false" onclick="this.focus();this.select()" readonly="readonly" style="width:650px;max-width:100%" value="' . $genShortcode .'"/></div>';
		$exampleGenShortcode = $genShortcode;
		$exampleGenShortcode = str_replace('"', "'", $exampleGenShortcode);
	}


?>

<div id="zia3_rw_shortcode_generator">
	<?php echo "debug: ".$rwords_pos; ?>
	<h3>Shortcode Generator</h3><br>
	Shortcode ID: <input type="text" id="id" spellcheck="false" readonly="readonly" value="<?php echo $id ?>" />
	<h3>Zia3 Rotating Words Appearance Setttings</h3><br>
	Rotating Words Position: <select name="rwords_pos" id="rwords_pos" disabled>
		<option value="1">After Sentence 1</option>
		<option value="2">After Sentence 2</option>
		<option value="3" selected="selected">After Sentence 3</option>
		<option value="4">After Sentence 4</option>
	 </select><br>
	Font: <select name="font_family" id="font_family">
	 <option value="Aclonica">Aclonica</option>
	 <option value="Allan">Allan</option>
	 <option value="Annie+Use+Your+Telescope">Annie Use Your Telescope</option>
	 <option value="Anonymous+Pro">Anonymous Pro</option>
	 <option value="Allerta+Stencil">Allerta Stencil</option>
	 <option value="Allerta">Allerta</option>
	 <option value="Amaranth">Amaranth</option>
	 <option value="Anton">Anton</option>
	 <option value="Architects+Daughter">Architects Daughter</option>
	 <option value="Arimo">Arimo</option>
	 <option value="Artifika">Artifika</option>
	 <option value="Arvo">Arvo</option>
	 <option value="Asset">Asset</option>
	 <option value="Astloch">Astloch</option>
	 <option value="Bangers">Bangers</option>
	 <option value="Bentham">Bentham</option>
	 <option value="Bevan">Bevan</option>
	 <option value="Bigshot+One">Bigshot One</option>
	 <option value="Bowlby+One">Bowlby One</option>
	 <option value="Bowlby+One+SC">Bowlby One SC</option>
	 <option value="Brawler">Brawler </option>
	 <option value="Buda:300">Buda</option>
	 <option value="Cabin">Cabin</option>
	 <option value="Calligraffitti">Calligraffitti</option>
	 <option value="Candal">Candal</option>
	 <option value="Cantarell">Cantarell</option>
	 <option value="Cardo">Cardo</option>
	 <option value="Carter One">Carter One</option>
	 <option value="Caudex">Caudex</option>
	 <option value="Cedarville+Cursive">Cedarville Cursive</option>
	 <option value="Cherry+Cream+Soda">Cherry Cream Soda</option>
	 <option value="Chewy">Chewy</option>
	 <option value="Coda">Coda</option>
	 <option value="Coming+Soon">Coming Soon</option>
	 <option value="Copse">Copse</option>
	 <option value="Corben:700">Corben</option>
	 <option value="Cousine">Cousine</option>
	 <option value="Covered+By+Your+Grace">Covered By Your Grace</option>
	 <option value="Crafty+Girls">Crafty Girls</option>
	 <option value="Crimson+Text">Crimson Text</option>
	 <option value="Crushed">Crushed</option>
	 <option value="Cuprum">Cuprum</option>
	 <option value="Damion">Damion</option>
	 <option value="Dancing+Script">Dancing Script</option>
	 <option value="Dawning+of+a+New+Day">Dawning of a New Day</option>
	 <option value="Didact+Gothic">Didact Gothic</option>
	 <option value="Droid+Sans">Droid Sans</option>
	 <option value="Droid+Sans+Mono">Droid Sans Mono</option>
	 <option value="Droid+Serif">Droid Serif</option>
	 <option value="EB+Garamond">EB Garamond</option>
	 <option value="Expletus+Sans">Expletus Sans</option>
	 <option value="Fontdiner+Swanky">Fontdiner Swanky</option>
	 <option value="Forum">Forum</option>
	 <option value="Francois+One">Francois One</option>
	 <option value="Geo">Geo</option>
	 <option value="Give+You+Glory">Give You Glory</option>
	 <option value="Goblin+One">Goblin One</option>
	 <option value="Goudy+Bookletter+1911">Goudy Bookletter 1911</option>
	 <option value="Gravitas+One">Gravitas One</option>
	 <option value="Gruppo">Gruppo</option>
	 <option value="Hammersmith+One">Hammersmith One</option>
	 <option value="Holtwood+One+SC">Holtwood One SC</option>
	 <option value="Homemade+Apple">Homemade Apple</option>
	 <option value="Inconsolata">Inconsolata</option>
	 <option value="Indie+Flower">Indie Flower</option>
	 <option value="IM+Fell+DW+Pica">IM Fell DW Pica</option>
	 <option value="IM+Fell+DW+Pica+SC">IM Fell DW Pica SC</option>
	 <option value="IM+Fell+Double+Pica">IM Fell Double Pica</option>
	 <option value="IM+Fell+Double+Pica+SC">IM Fell Double Pica SC</option>
	 <option value="IM+Fell+English">IM Fell English</option>
	 <option value="IM+Fell+English+SC">IM Fell English SC</option>
	 <option value="IM+Fell+French+Canon">IM Fell French Canon</option>
	 <option value="IM+Fell+French+Canon+SC">IM Fell French Canon SC</option>
	 <option value="IM+Fell+Great+Primer">IM Fell Great Primer</option>
	 <option value="IM+Fell+Great+Primer+SC">IM Fell Great Primer SC</option>
	 <option value="Irish+Grover">Irish Grover</option>
	 <option value="Irish+Growler">Irish Growler</option>
	 <option value="Istok+Web">Istok Web</option>
	 <option value="Josefin+Sans">Josefin Sans Regular 400</option>
	 <option value="Josefin+Slab">Josefin Slab Regular 400</option>
	 <option value="Judson">Judson</option>
	 <option value="Jura"> Jura Regular</option>
	 <option value="Jura:500"> Jura 500</option>
	 <option value="Jura:600"> Jura 600</option>
	 <option value="Just+Another+Hand">Just Another Hand</option>
	 <option value="Just+Me+Again+Down+Here">Just Me Again Down Here</option>
	 <option value="Kameron">Kameron</option>
	 <option value="Kenia">Kenia</option>
	 <option value="Kranky">Kranky</option>
	 <option value="Kreon">Kreon</option>
	 <option value="Kristi">Kristi</option>
	 <option value="La+Belle+Aurore">La Belle Aurore</option>
	 <option value="Lato:100">Lato 100</option>
	 <option value="Lato:100italic">Lato 100 (plus italic)</option>
	 <option value="Lato:300">Lato Light 300</option>
	 <option value="Lato">Lato</option>
	 <option value="Lato:bold">Lato Bold 700</option>
	 <option value="Lato:900">Lato 900</option>
	 <option value="League+Script">League Script</option>
	 <option value="Lekton"> Lekton </option>
	 <option value="Limelight"> Limelight </option>
	 <option value="Lobster">Lobster</option>
	 <option value="Lobster Two">Lobster Two</option>
	 <option value="Lora">Lora</option>
	 <option value="Love+Ya+Like+A+Sister">Love Ya Like A Sister</option>
	 <option value="Loved+by+the+King">Loved by the King</option>
	 <option value="Luckiest+Guy">Luckiest Guy</option>
	 <option value="Maiden+Orange">Maiden Orange</option>
	 <option value="Mako">Mako</option>
	 <option value="Maven+Pro"> Maven Pro</option>
	 <option value="Maven+Pro:500"> Maven Pro 500</option>
	 <option value="Maven+Pro:700"> Maven Pro 700</option>
	 <option value="Maven+Pro:900"> Maven Pro 900</option>
	 <option value="Meddon">Meddon</option>
	 <option value="MedievalSharp">MedievalSharp</option>
	 <option value="Megrim">Megrim</option>
	 <option value="Merriweather">Merriweather</option>
	 <option value="Metrophobic">Metrophobic</option>
	 <option value="Michroma">Michroma</option>
	 <option value="Miltonian Tattoo">Miltonian Tattoo</option>
	 <option value="Miltonian">Miltonian</option>
	 <option value="Modern Antiqua">Modern Antiqua</option>
	 <option value="Monofett">Monofett</option>
	 <option value="Molengo">Molengo</option>
	 <option value="Mountains of Christmas">Mountains of Christmas</option>
	 <option value="Muli:300">Muli Light</option>
	 <option value="Muli">Muli Regular</option>
	 <option value="Neucha">Neucha</option>
	 <option value="Neuton">Neuton</option>
	 <option value="News+Cycle">News Cycle</option>
	 <option value="Nixie+One">Nixie One</option>
	 <option value="Nobile">Nobile</option>
	 <option value="Nova+Cut">Nova Cut</option>
	 <option value="Nova+Flat">Nova Flat</option>
	 <option value="Nova+Mono">Nova Mono</option>
	 <option value="Nova+Oval">Nova Oval</option>
	 <option value="Nova+Round">Nova Round</option>
	 <option value="Nova+Script">Nova Script</option>
	 <option value="Nova+Slim">Nova Slim</option>
	 <option value="Nova+Square">Nova Square</option>
	 <option value="Nunito:light"> Nunito Light</option>
	 <option value="Nunito"> Nunito Regular</option>
	 <option value="OFL+Sorts+Mill+Goudy+TT">OFL Sorts Mill Goudy TT</option>
	 <option value="Old+Standard+TT">Old Standard TT</option>
	 <option value="Open+Sans:300">Open Sans light</option>
	 <option value="Open+Sans">Open Sans regular</option>
	 <option value="Open+Sans:600">Open Sans 600</option>
	 <option value="Open+Sans:800">Open Sans bold</option>
	 <option value="Open+Sans+Condensed:300">Open Sans Condensed</option>
	 <option value="Orbitron">Orbitron Regular (400)</option>
	 <option value="Orbitron:500">Orbitron 500</option>
	 <option value="Orbitron:700">Orbitron Regular (700)</option>
	 <option value="Orbitron:900">Orbitron 900</option>
	 <option value="Oswald">Oswald</option>
	 <option value="Over+the+Rainbow">Over the Rainbow</option>
	 <option value="Reenie+Beanie">Reenie Beanie</option>
	 <option value="Pacifico">Pacifico</option>
	 <option value="Patrick+Hand">Patrick Hand</option>
	 <option value="Paytone+One">Paytone One</option>
	 <option value="Permanent+Marker">Permanent Marker</option>
	 <option value="Philosopher">Philosopher</option>
	 <option value="Play">Play</option>
	 <option value="Playfair+Display"> Playfair Display </option>
	 <option value="Podkova"> Podkova </option>
	 <option value="PT+Sans">PT Sans</option>
	 <option value="PT+Sans+Narrow">PT Sans Narrow</option>
	 <option value="PT+Sans+Narrow:regular,bold">PT Sans Narrow (plus bold)</option>
	 <option value="PT+Serif">PT Serif</option>
	 <option value="PT+Serif Caption">PT Serif Caption</option>
	 <option value="Puritan">Puritan</option>
	 <option value="Quattrocento">Quattrocento</option>
	 <option value="Quattrocento+Sans">Quattrocento Sans</option>
	 <option value="Radley">Radley</option>
	 <option value="Raleway:100">Raleway</option>
	 <option value="Redressed">Redressed</option>
	 <option value="Rock+Salt">Rock Salt</option>
	 <option value="Rokkitt">Rokkitt</option>
	 <option value="Ruslan+Display">Ruslan Display</option>
	 <option value="Schoolbell">Schoolbell</option>
	 <option value="Shadows+Into+Light">Shadows Into Light</option>
	 <option value="Shanti">Shanti</option>
	 <option value="Sigmar+One">Sigmar One</option>
	 <option value="Six+Caps">Six Caps</option>
	 <option value="Slackey">Slackey</option>
	 <option value="Smythe">Smythe</option>
	 <option value="Sniglet:800">Sniglet</option>
	 <option value="Special+Elite">Special Elite</option>
	 <option value="Stardos+Stencil">Stardos Stencil</option>
	 <option value="Sue+Ellen+Francisco">Sue Ellen Francisco</option>
	 <option value="Sunshiney">Sunshiney</option>
	 <option value="Swanky+and+Moo+Moo">Swanky and Moo Moo</option>
	 <option value="Syncopate">Syncopate</option>
	 <option value="Tangerine">Tangerine</option>
	 <option value="Tenor+Sans"> Tenor Sans </option>
	 <option value="Terminal+Dosis+Light">Terminal Dosis Light</option>
	 <option value="The+Girl+Next+Door">The Girl Next Door</option>
	 <option value="Tinos">Tinos</option>
	 <option value="Trocchi|Open+Sans+Condensed:700,300,300italic">Trocchi</option>
	 <option value="Ubuntu">Ubuntu</option>
	 <option value="Ultra">Ultra</option>
	 <option value="Unkempt">Unkempt</option>
	 <option value="UnifrakturCook:bold">UnifrakturCook</option>
	 <option value="UnifrakturMaguntia">UnifrakturMaguntia</option>
	 <option value="Varela">Varela</option>
	 <option value="Varela Round">Varela Round</option>
	 <option value="Vibur">Vibur</option>
	 <option value="Vollkorn">Vollkorn</option>
	 <option value="VT323">VT323</option>
	 <option value="Waiting+for+the+Sunrise">Waiting for the Sunrise</option>
	 <option value="Wallpoet">Wallpoet</option>
	 <option value="Walter+Turncoat">Walter Turncoat</option>
	 <option value="Wire+One">Wire One</option>
	 <option value="Yanone+Kaffeesatz">Yanone Kaffeesatz</option>
	 <option value="Yanone+Kaffeesatz:300">Yanone Kaffeesatz:300</option>
	 <option value="Yanone+Kaffeesatz:400">Yanone Kaffeesatz:400</option>
	 <option value="Yanone+Kaffeesatz:700">Yanone Kaffeesatz:700</option>
	 <option value="Yeseva+One">Yeseva One</option>
	 <option value="Zeyada">Zeyada</option>
	</select><br>
	Font Size: <input type="text" id="font_size" spellcheck="false" value="<?php echo $font_size ?>" /><br>
	Position Top: <input type="text" id="pos_top" spellcheck="false" value="<?php echo $pos_top ?>" /><br>
	Position Left: <input type="text" id="pos_left" spellcheck="false" value="<?php echo $pos_left ?>" /><br>
	Words Height: <input type="text" id="rw_height" spellcheck="false" value="<?php echo $rw_height ?>" /><br>
	Words Width: <input type="text" id="rw_width" spellcheck="false" value="<?php echo $rw_width ?>" /><br>
	<input type="button" class="button" name="zia3_rw_generate_button" id="zia3_rw_generate_button" value="Generate Shortcode!" />
	<input type="button" class="button" name="zia3_rw_help_button" id="zia3_rw_help_button" value="Explain What All of This Means..." />
	<br><br>
	<div id="zia3_rw_generated_shortcode_container">
		Generated Shortcode: <input id="zia3_rw_generated_shortcode" type="text" spellcheck="false" onclick="this.focus();this.select()" readonly="readonly" name="genShortcode" value="<?php echo $exampleGenShortcode ?>" />
	</div>
</div>

<div id="zia3_rw_parameter_explaination">
<h3>Rotating Words Position</h3>
<p>Please select where you would you like the rotating words to be positioned relative to the 4 sentences you entered. There is no need to enter any sentences if you just want to see rotating words. If no sentences are entered the defaulkt position will be after sentence 1.</p>
<h3>Font</h3>
<p>The specified font will be used for sentences and the rotating words. Please select from the list.  If no font is specified the default font will be used.</p>
<h3>Font Size</h3>
<p>The font size for rotating words in percentage. e.g 800. No need to put in % sign.</p>
<h3>Position Top</h3>
<p>The position in pixels from the top of the container for the rotating words.</p>
<h3>Position Left</h3>
<p>The position in pixels from the left of the container for the rotating words.</p>
<h3>Words Height</h3>
<p>The height in pixels for the rotating words container. Default = 80</p>
<h3>Words Width</h3>
<p>The width in pixels for the rotating words container. Default = 400</p>
<hr>
<p>After you've generated your shortcode remember to hit Publish or Update so you can come back and copy/paste the shortcode later if you need to.</p>
<input type="button" class="button" name="zia3_rw_help_back_button" id="zia3_rw_help_back_button" value="Thanks! Now take me back to the shortcode generator!" />
</div>
</form>