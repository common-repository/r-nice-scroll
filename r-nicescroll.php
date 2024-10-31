<?php 

/*
Plugin Name: r-nice-scroll
Plugin URI: http://products.pristine-bd.com/r-nicescroll/
Description: R Nice Scroll  plugin is Simple  wordpress plugin for Customizes scrollbar. 
Author: Rasel
Version: 1.0
Author URI: http://pristine-bd.com/
*/



// load 
 function rns_jquery_nicescroll_min_js_file() {
	wp_enqueue_script('rasel_rns_js_file',plugins_url( '/js/jquery.nicescroll.min.js' , __FILE__ ),array( 'jquery' ));
}
add_action( 'wp_enqueue_scripts', 'rns_jquery_nicescroll_min_js_file' );

// colorpicker
add_action( 'admin_enqueue_scripts', 'jquery_rasel_ns_nicescroll_wp_enqueue_color_picker' );
function jquery_rasel_ns_nicescroll_wp_enqueue_color_picker( ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-script', plugins_url('js/script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}

// load jquery nice scroll Controls 
 function rns_jquery_nicescroll_Controls() {
 	
 ?>

<script>
	jQuery(document).ready(function($) {
	 $("html").niceScroll({
      cursorcolor:"<?php $options = get_option('get_rns_options'); if ( $options['cursorcolor'] == '') {echo '#424242';} else { echo  $options['cursorcolor']; } ?>",
      cursorwidth:"<?php $options = get_option('get_rns_options'); if ( $options['cursorwidth'] == '') {echo '5px';} else { echo  $options['cursorwidth']; } ?>",
            cursorborder:"<?php $options = get_option('get_rns_options'); if ( $options['cursorborder_width'] == '') {echo '1px';} else { echo  $options['cursorborder_width']; } ?> <?php $options = get_option('get_rns_options'); if ( $options['cursorborder_type'] == '') {echo 'solid';} else { echo  $options['cursorborder_type']; } ?> <?php $options = get_option('get_rns_options'); if ( $options['cursorborder_color'] == '') {echo '#fff';} else { echo  $options['cursorborder_color']; } ?>",
      cursorborderradius:"<?php $options = get_option('get_rns_options'); if ( $options['cursorborderradius'] == '') {echo '5px';} else { echo  $options['cursorborderradius']; } ?>",
      scrollspeed:'<?php $options = get_option('get_rns_options'); if ( $options['scrollspeed'] == '') {echo '60';} else { echo  $options['scrollspeed']; } ?>',
      touchbehavior:<?php $options = get_option('get_rns_options'); if ( $options['touchbehavior'] == '') {echo 'true';} else { echo  $options['touchbehavior']; } ?>,

      autohidemode:<?php $options = get_option('get_rns_options'); if ( $options['autohidemode'] == '') {echo 'false';} else { echo  $options['autohidemode']; } ?>
	 });

<?php $options = get_option('get_rns_options'); if ( $options['rns_jquery_nicescrol_custom_js'] == '') {} else { echo  $options['rns_jquery_nicescrol_custom_js']; } ?>
});
</script>

<?php
}

add_action('wp_head', 'rns_jquery_nicescroll_Controls');



require_once( plugin_dir_path(__FILE__) . '/inc/settings.php' );

 

?>