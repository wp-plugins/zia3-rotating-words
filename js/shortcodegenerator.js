jQuery("#zia3_rw_shortcodeg_button").click(function() {
	jQuery("#zia3_rw_example_shortcode").toggle("slow", function() {
	});
	jQuery("#zia3_rw_shortcode_generator").toggle("slow", function() {
	});
	var e = jQuery("#zia3_rw_shortcodeg_button").val();
	if (e === "Generate Your Own Shortcode") {
		jQuery("#zia3_rw_shortcodeg_button").val("View Old Shortcode")
	}
	if (e === "Generate a New Shortcode") {
		jQuery("#zia3_rw_shortcodeg_button").val("View Old Shortcode")
	}
	if (e === "View Old Shortcode") {
		jQuery("#zia3_rw_shortcodeg_button").val("Generate a New Shortcode")
	}
});
jQuery("#zia3_rw_generate_button").click(function() {
	jQuery("#zia3_rw_generated_shortcode_container").slideDown("slow", function() {
	});
	var e = "id=\"" + jQuery("#id").val() + "\"";
	var z = " font_family=\"" + jQuery("#font_family").val() + "\"";
	var w = jQuery("#font_family").val();
	var wp = " rwords_pos=\"" + jQuery("#rwords_pos").val() + "\"";
	var yp = jQuery("#rwords_pos").val();
	var x = " font_size=\"" + jQuery("#font_size").val() + "\"";
	var y = jQuery("#font_size").val();
	var lc = " pos_top=\"" + jQuery("#pos_top").val() + "\"";
	var lz = jQuery("#pos_top").val();
	var c = " pos_left=\"" + jQuery("#pos_left").val() + "\"";
	var d = jQuery("#pos_left").val();
	var f = " rw_height=\"" + jQuery("#rw_height").val() + "\"";
	var g = jQuery("#rw_height").val();
	var sc = " rw_width=\"" + jQuery("#rw_width").val() + "\"";
	var sz = jQuery("#rw_width").val();
	
	if (!w) {
		z = " font_family=\"http://fonts.googleapis.com/css?family=Trocchi|Open+Sans+Condensed:700,300,300italic\""
	}
	if (!yp) {
		wp = " rwords_pos=\"3\""
	}
	if (!y) {
		x = " font_size=\"800\""
	}
	if (!d) {
		c = " pos_top=\"220\""
	}
	if (!g) {
		f = " pos_left=\"220\""
	}
	if (!lz) {
		lc = " rw_height=\"80\"";
	}
	if (!sz) {
		sc = " rw_width=\"400\"";
	}
	
	var t = "[zia3_rw " + e +  wp + z + x + c + f + lc + sc + "]";
	jQuery("#zia3_rw_generated_shortcode").val(t)
});
jQuery("#zia3_rw_help_button").click(function() {
	jQuery("#zia3_rw_shortcode_generator").toggle("slow", function() {
	});
	jQuery("#zia3_rw_shortcodeg_button").prop("disabled", true);
	jQuery("#zia3_rw_parameter_explaination").toggle("slow", function() {
	})
});
jQuery("#zia3_rw_help_back_button").click(function() {
	jQuery("#zia3_rw_shortcode_generator").toggle("slow", function() {
	});
	jQuery("#zia3_rw_shortcodeg_button").prop("disabled", false);
	jQuery("#zia3_rw_parameter_explaination").toggle("slow", function() {
	})
})