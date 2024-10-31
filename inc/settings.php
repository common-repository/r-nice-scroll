<?php 


// rns_jquery_nicescrol

// option menu page name 
function rns_jquery_nicescroll_menu () {
      add_menu_page('R Nice Scroll  Options Page', 'R Nice Scroll ', 'manage_options', 'rns-jquery-nicescrol-options', 'rns_jquery_nicescrol_options_cb_function');
}
add_action('admin_menu', 'rns_jquery_nicescroll_menu');

// options page content 

function rns_jquery_nicescrol_options_cb_function () {
?>
	 <div class="wrap">
		<h2>R NiceScroll Options Page</h2>
		<hr>
		

		<form action="options.php" method="post">


			<?php  

			settings_fields('jquery_rasel_ns_nicescroll_section');			
			do_settings_sections('r-nicescroll-options');
			submit_button();  

			?>

		</form> 


	</div>
<?php
}


function rns_jquery_nicescrol_options_setting_register () {
	add_settings_section('jquery_rasel_ns_nicescroll_section', '', 'jquery_rasel_ns_nicescroll_section_cb', 'r-nicescroll-options' );
  add_settings_section('jquery_rasel_ns_nicescroll_border_section', 'R-NiceScroll Border', 'jquery_rasel_ns_nicescroll_border_section_cb', 'r-nicescroll-options' );
	add_settings_section('jquery_rasel_ns_nicescroll_custom_js_section', 'R-NiceScroll Custom Js', 'jquery_rasel_ns_nicescroll_custom_js_section_cb', 'r-nicescroll-options' );
	//add_settings_section( $id, $title, $callback, $page );
	add_settings_field('cursorcolor', 'R-NiceScroll Color', 'cursorcolor_cb', 'r-nicescroll-options', 'jquery_rasel_ns_nicescroll_section');
	add_settings_field('cursorwidth', 'R-NiceScroll Width', 'cursorwidth_cb', 'r-nicescroll-options', 'jquery_rasel_ns_nicescroll_section');

	add_settings_field('cursorborder_width', 'cursor border width', 'cursorborder_width_cb', 'r-nicescroll-options', 'jquery_rasel_ns_nicescroll_border_section');
	add_settings_field('cursorborder_type', 'cursor border type', 'cursorborder_type_cb', 'r-nicescroll-options', 'jquery_rasel_ns_nicescroll_border_section');
	add_settings_field('cursorborder_color', 'cursor border color', 'cursorborder_color_cb', 'r-nicescroll-options', 'jquery_rasel_ns_nicescroll_border_section');

	 add_settings_field('cursorborderradius', 'R-NiceScroll border-radius', 'cursorborderradius_cb', 'r-nicescroll-options', 'jquery_rasel_ns_nicescroll_section');
	 add_settings_field('scrollspeed', 'R-NiceScroll Scrollspeed', 'scrollspeed_cb', 'r-nicescroll-options', 'jquery_rasel_ns_nicescroll_section');
	 add_settings_field('touchbehavior', 'R-NiceScroll Touch Behavior', 'touchbehavior_cb', 'r-nicescroll-options', 'jquery_rasel_ns_nicescroll_section');
   add_settings_field('autohidemode', 'R-NiceScroll Auto Hide Mode', 'autohidemode_cb', 'r-nicescroll-options', 'jquery_rasel_ns_nicescroll_section');
	 
   add_settings_field('rns_jquery_nicescrol_custom_js', 'Custom js', 'rns_jquery_nicescrol_custom_js_cb', 'r-nicescroll-options', 'jquery_rasel_ns_nicescroll_custom_js_section');

	//add_settings_field( $id, $title, $callback, $page, $section, $args ); solid #fff
	register_setting('jquery_rasel_ns_nicescroll_section', 'get_rns_options');
  register_setting('jquery_rasel_ns_nicescroll_border_section', 'get_rns_options'); 
	register_setting('jquery_rasel_ns_nicescroll_custom_js_section', 'get_rns_options'); 


}

add_action('admin_init', 'rns_jquery_nicescrol_options_setting_register');


//Setting section callback
function jquery_rasel_ns_nicescroll_section_cb() {
	 
}
function jquery_rasel_ns_nicescroll_border_section_cb() {
	 echo '<p>css definition for cursor border, default is "1px solid #fff".</p>';
}
function jquery_rasel_ns_nicescroll_custom_js_section_cb() {
   echo '<p>If you want use R-NiceScroll with any element, follow this instruction. </p> 
   <p>/*-------------------------------------------------------------------------------------------------------------------------- <br> 
  <strong>Copy This Code and past bottom Custom js field. and replace  "Enter Your Content Name Here" by your element name. </strong> <br> <br>
   $("Enter Your Content Name Here").niceScroll({
  
    });
<br>
    $("Enter Your Content Name Here").css({
    height : "300px"
    }); 

      <br> ----------------------------------------------------------------------------------------------------------------------------*/</p>';
}

// ------Settings field Callback-------------//


function cursorcolor_cb () {
	$options = get_option('get_rns_options');
	echo '<input id="cursorcolor" class="wp-color-picker-field" name="get_rns_options[cursorcolor]" size="40" type="text" data-default-color="#424242" value="'.$options['cursorcolor'].'"/>
	    <p class="description">change cursor color in hex, default is "#424242".</p>';	
}
function cursorwidth_cb () {
	$options = get_option('get_rns_options');
	echo '<input id="cursorwidth" placeholder="5px"  name="get_rns_options[cursorwidth]"  type="text"  value="'.$options['cursorwidth'].'"/>
	    <p class="description">cursor width in pixel, default is 5 (you can write "5px" too) . </p>';	
} 
function cursorborder_width_cb () {
	$options = get_option('get_rns_options');
echo '<input id="cursorborder_width" placeholder="1px" name="get_rns_options[cursorborder_width]"  type="text"  value="'.$options['cursorborder_width'].'"/>
	    <p class="description">default is "1px". </p>';	
}
function cursorborder_type_cb () {
	  $options = get_option('get_rns_options');
    $html = '<select id="cursorborder_type" name="get_rns_options[cursorborder_type]">';
    $html.= '<option value="solid"' . selected( $options['cursorborder_type'], 'solid', false) . '>solid</option>';
    $html.= '<option value="dotted"' . selected( $options['cursorborder_type'], 'dotted', false) . '>dotted</option>';
    $html.= '<option value="double"' . selected( $options['cursorborder_type'], 'double', false) . '>double</option>';
    $html.= '<option value="dashed"' . selected( $options['cursorborder_type'], 'dashed', false) . '>dashed</option>';
    $html.= '</select>';
    $html.= '<p class="description">dotted solid double dashed. default is "solid" </p>';     
    echo $html;
} 
function cursorborder_color_cb () {
	$options = get_option('get_rns_options');
echo '<input id="cursorborder_color"   name="get_rns_options[cursorborder_color]"  type="text"  value="'.$options['cursorborder_color'].'" class="wp-color-picker-field" data-default-color="#fff"/>
	    <p class="description">default is "#fff". </p>';	
} 
 
function cursorborderradius_cb () {
	$options = get_option('get_rns_options');
echo '<input id="cursorborderradius" placeholder="4px"  name="get_rns_options[cursorborderradius]"  type="text"  value="'.$options['cursorborderradius'].'"/>
	    <p class="description">border radius in pixel for cursor, default is "4px". </p>';	
}
function scrollspeed_cb () {
	$options = get_option('get_rns_options');
echo '<input id="scrollspeed" placeholder="60"  name="get_rns_options[scrollspeed]"  type="text"  value="'.$options['scrollspeed'].'"/>
	    <p class="description">scrolling speed, default value is 60. </p>';	
}
function touchbehavior_cb () {
	  $options = get_option('get_rns_options');
    $html = '<select id="touchbehavior" name="get_rns_options[touchbehavior]">';
    $html.= '<option value="true"' . selected( $options['touchbehavior'], 'true', false) . '>true</option>';
    $html.= '<option value="false"' . selected( $options['touchbehavior'], 'false', false) . '>false</option>';
    $html.= '</select>';
    $html.= '<p class="description">enable cursor-drag scrolling like touch devices in desktop computer (default:true).</p>';     
    echo $html;
}
function autohidemode_cb () {
	  $options = get_option('get_rns_options');
    $html = '<select id="touchbehavior" name="get_rns_options[autohidemode]">';
    $html.= '<option value="true"' . selected( $options['autohidemode'], 'true', false) . '>true</option>';
    $html.= '<option value="false"' . selected( $options['autohidemode'], 'false', false) . '>false</option>';
    $html.= '<option value="cursor"' . selected( $options['autohidemode'], 'cursor', false) . '>cursor</option>';
    $html.= '</select>';
    $html.= '<p class="description">how hide the scrollbar works, true=default / "cursor" = only cursor hidden / false = do not hide.</p>';     
    echo $html;
}

function rns_jquery_nicescrol_custom_js_cb () {
  $options = get_option('get_rns_options');
echo ' <textarea name="get_rns_options[rns_jquery_nicescrol_custom_js]" placeholder="" id="" cols="60" rows="20">'.$options['rns_jquery_nicescrol_custom_js'].'</textarea>
      '; 
}


?>