<?php 

if ( ! defined( 'ABSPATH' ) ) exit;

wp_enqueue_style( 'wp-color-picker' );
wp_enqueue_style( 'formitable-style-handle', plugins_url('style.css', __FILE__ ) );
wp_enqueue_script( 'formitable-script-handle', plugins_url('script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );


if(
	isset($_POST['formitable_hidden']) && $_POST['formitable_hidden'] == 'Y' && 
	isset($_POST['_wpnonce']) && wp_verify_nonce( $_POST['_wpnonce'], 'update-formitable-settings' )
) {
	
	// check if user can manage options
	if (!current_user_can('manage_options'))
	{
		wp_die(__('You do not have sufficient permissions to manage options for this site.'));
	}

	
	//Form data sent
	
	$ft_restaurantUid = sanitize_text_field($_POST['ft_restaurantUid']);
	update_option('ft_restaurantUid', $ft_restaurantUid);
	
	$ft_modules_analytics = wp_validate_boolean($_POST['ft_modules_analytics']);
	update_option('ft_modules_analytics', $ft_modules_analytics);
	
	$ft_booking_active = wp_validate_boolean($_POST['ft_booking_active']);
	update_option('ft_booking_active', $ft_booking_active);
	
	$ft_booking_autoOpen = sanitize_text_field($_POST['ft_booking_autoOpen']);
	update_option('ft_booking_autoOpen', $ft_booking_autoOpen);
	
	$ft_booking_autoOpen_mobile = sanitize_text_field($_POST['ft_booking_autoOpen_mobile']);
	update_option('ft_booking_autoOpen_mobile', $ft_booking_autoOpen_mobile);
	
	$ft_booking_toolbar = wp_validate_boolean($_POST['ft_booking_toolbar']);
	update_option('ft_booking_toolbar', $ft_booking_toolbar);
	
	$ft_booking_toolbar_mobile = wp_validate_boolean($_POST['ft_booking_toolbar_mobile']);
	update_option('ft_booking_toolbar_mobile', $ft_booking_toolbar_mobile);
	 
	$ft_booking_color = sanitize_text_field($_POST['ft_booking_color']);
	update_option('ft_booking_color', $ft_booking_color);
	 
	$ft_booking_tag = sanitize_text_field($_POST['ft_booking_tag']);
	update_option('ft_booking_tag', $ft_booking_tag);

	$ft_booking_language = sanitize_text_field($_POST['ft_booking_language']);
	update_option('ft_booking_language', $ft_booking_language);

	?>
	
	<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
	
	<?php
} else {
	
	//Normal page display
	$ft_restaurantUid = esc_html(get_option('ft_restaurantUid'));
	$ft_modules_analytics = esc_html(get_option('ft_modules_analytics'));
	$ft_booking_active = esc_html(get_option('ft_booking_active'));
	$ft_booking_toolbar = esc_html(get_option('ft_booking_toolbar'));
	$ft_booking_toolbar_mobile = esc_html(get_option('ft_booking_toolbar_mobile'));
	$ft_booking_autoOpen = esc_html(get_option('ft_booking_autoOpen'));
	$ft_booking_autoOpen_mobile = esc_html(get_option('ft_booking_autoOpen_mobile'));
	$ft_booking_color = esc_html(get_option('ft_booking_color'));
	$ft_booking_tag = esc_html(get_option('ft_booking_tag'));
	$ft_booking_language = esc_html(get_option('ft_booking_language'));
}

?>


<div class="wrap">
	<div class="logo" style="padding:20px 0">
		<svg id="ft-logo" viewBox="0 0 418.8 71.9" width="120px" height="22px">
			<path d="M6.7 15.2c0.4-2.4 1-4.4 1.8-6 0.8-1.7 1.9-3.2 3.3-4.5 1.3-1.3 3.1-2.4 5.3-3.3 2.2-0.8 4.5-1.3 7-1.3 3.8 0 7 1 9.6 3 0.9 0.7 1.6 1.7 2.2 2.9 0.6 1.2 0.9 2.5 0.9 3.9 0 1.1-0.3 2.1-0.8 3.1 -0.5 1-1.3 1.7-2.3 2.3 -1 0.6-2.1 0.9-3.3 0.9 -2.1 0-3.7-0.6-4.9-1.7 -1.2-1.1-1.9-2.7-1.9-4.7 0-1.6 0.5-3 1.4-4.2 0.9-1.2 2.2-2 3.9-2.5 -0.2-0.4-0.5-0.7-1.1-0.9 -0.6-0.2-1.3-0.4-2.1-0.4 -2.3 0-3.9 0.8-4.9 2.4C20.1 5 19.7 6.3 19.4 8c-0.2 1.7-0.4 4.3-0.4 7.8V24h9.6v1.8h-9.6v35.4c0 2.8 0.7 4.7 2.1 5.8s3.5 1.6 6.4 1.6v1.9c-8.4-0.2-13.6-0.4-15.5-0.4 -1.8 0-5.7 0.1-11.7 0.4v-1.9c1.4 0 2.6-0.2 3.4-0.6 0.8-0.4 1.4-1 1.8-2 0.4-0.9 0.5-2.2 0.5-3.9V25.8H0V24h6.1C6.1 20.5 6.3 17.5 6.7 15.2zM69.8 28.6c3.9 3.9 5.9 10.2 5.9 18.7 0 8.5-2 14.7-5.9 18.6 -3.9 3.9-9.3 5.9-16.1 5.9s-12.2-2-16.2-5.9c-3.9-3.9-5.9-10.1-5.9-18.6 0-8.5 2-14.7 5.9-18.7 3.9-3.9 9.3-5.9 16.2-5.9S65.9 24.7 69.8 28.6zM47.5 30.1c-1.5 3.8-2.3 9.5-2.3 17.2 0 7.7 0.8 13.4 2.3 17.1 1.5 3.7 3.6 5.6 6.2 5.6 2.6 0 4.7-1.9 6.2-5.6 1.5-3.7 2.3-9.4 2.3-17.1 0-7.7-0.8-13.5-2.3-17.2 -1.5-3.7-3.6-5.6-6.2-5.6C51.1 24.5 49 26.4 47.5 30.1zM102.2 25.1c2.2-1.6 4.6-2.4 7.3-2.4 1.8 0 3.3 0.4 4.6 1.2s2.1 1.8 2.7 3.1c0.6 1.2 0.9 2.6 0.9 4 0 2.2-0.6 4-1.9 5.4 -1.3 1.4-3 2.1-5.1 2.1 -2.1 0-3.7-0.5-4.9-1.6s-1.8-2.4-1.8-4.2c0-2.9 1.3-5.2 4-7 -0.4-0.1-0.7-0.1-1.1-0.1 -0.4 0-0.9 0.1-1.4 0.2 -1.5 0.2-2.9 1-4.2 2.2 -1.3 1.2-2.2 2.7-3 4.4 -0.7 1.7-1.1 3.4-1.1 5v23.9c0 2.8 0.7 4.7 2 5.8 1.3 1.1 3.5 1.6 6.5 1.6v1.9c-7.5-0.2-12.3-0.4-14.3-0.4 -1.9 0-6.2 0.1-12.9 0.4v-1.9c1.4 0 2.6-0.2 3.4-0.6 0.8-0.4 1.4-1 1.8-2 0.4-0.9 0.5-2.2 0.5-3.9V33.8c0-2.8-0.4-4.8-1.3-6 -0.9-1.2-2.3-1.9-4.5-1.9V24c1.9 0.2 3.8 0.3 5.6 0.3 5.3 0 9.7-0.4 13.1-1.2v8.3C98.4 28.8 100.1 26.7 102.2 25.1zM192.6 66c0.4 0.9 1 1.6 1.8 2 0.8 0.4 1.9 0.6 3.4 0.6v1.9c-6-0.2-9.9-0.4-11.9-0.4 -1.7 0-5.4 0.1-11.1 0.4v-1.9c1.1 0 1.9-0.2 2.5-0.6 0.6-0.4 1.1-1 1.3-2 0.3-0.9 0.4-2.2 0.4-3.9v-28c0-2.5-0.4-4.4-1.1-5.6s-2.2-1.9-4.3-1.9c-1.5 0-2.8 0.4-4.1 1.3 -1.3 0.9-2.3 2-3.1 3.5 -0.8 1.5-1.3 3.1-1.5 4.9v1.6 24.2c0 1.7 0.2 3 0.5 3.9 0.3 0.9 0.9 1.6 1.6 2 0.7 0.4 1.8 0.6 3.1 0.6v1.9c-5.7-0.2-9.5-0.4-11.3-0.4 -1.7 0-5.4 0.1-11.2 0.4v-1.9c1.1 0 1.9-0.2 2.5-0.6 0.6-0.4 1.1-1 1.3-2 0.3-0.9 0.4-2.2 0.4-3.9v-28c0-2.5-0.3-4.4-1-5.6 -0.6-1.2-1.9-1.8-3.9-1.8 -1.6 0-3 0.5-4.4 1.4 -1.3 0.9-2.4 2.2-3.2 3.8s-1.2 3.4-1.2 5.3v25c0 1.7 0.1 3 0.4 3.9 0.3 0.9 0.7 1.6 1.3 2 0.6 0.4 1.5 0.6 2.5 0.6v1.9c-5.3-0.2-8.8-0.4-10.6-0.4 -1.8 0-6 0.1-12.4 0.4v-1.9c1.4 0 2.6-0.2 3.4-0.6 0.8-0.4 1.4-1 1.8-2 0.4-0.9 0.5-2.2 0.5-3.9V33.8c0-2.8-0.4-4.8-1.3-6 -0.9-1.2-2.3-1.9-4.5-1.9V24c1.9 0.2 3.8 0.3 5.6 0.3 5.3 0 9.7-0.4 13.1-1.2v8.1c2.7-5.6 7.4-8.3 14-8.3 4.6 0 7.9 1.2 9.9 3.5 1.1 1.3 1.9 3.1 2.3 5.4 1.5-3.3 3.6-5.6 6.1-6.9 2.5-1.3 5.5-2 8.8-2 4.6 0 7.9 1.2 9.9 3.5 1 1.1 1.7 2.6 2.1 4.5 0.4 1.8 0.6 4.3 0.6 7.3v24.2C192 63.8 192.2 65.1 192.6 66zM220.4 66c0.4 0.9 1 1.6 1.8 2 0.8 0.4 1.9 0.6 3.4 0.6v1.9c-6-0.2-10-0.4-12-0.4 -1.9 0-6.1 0.1-12.5 0.4v-1.9c1.4 0 2.6-0.2 3.4-0.6 0.8-0.4 1.4-1 1.8-2 0.4-0.9 0.5-2.2 0.5-3.9V33.8c0-2.8-0.4-4.8-1.3-6 -0.9-1.2-2.3-1.9-4.5-1.9V24c1.9 0.2 3.8 0.3 5.6 0.3 5.3 0 9.7-0.4 13.1-1.2v39.2C219.8 63.8 220 65.1 220.4 66zM218.7 2.6c1.5 1.2 2.2 2.9 2.2 5.1 0 2.2-0.7 3.9-2.2 5.1 -1.5 1.2-3.5 1.8-6 1.8 -2.5 0-4.6-0.6-6-1.8 -1.5-1.2-2.2-2.9-2.2-5.1 0-2.1 0.7-3.8 2.2-5.1 1.5-1.2 3.5-1.8 6-1.8C215.3 0.7 217.3 1.4 218.7 2.6zM256.6 24v1.8H246v36.3c0 1.8 0.3 3.1 1 3.8s1.6 1.1 3 1.1c2.5 0 4.6-1.8 6.1-5.4l1.5 0.8c-2.3 6.2-6.4 9.3-12.3 9.3 -4 0-7-1-9-3.1 -1.3-1.2-2.1-2.8-2.6-4.7 -0.5-1.9-0.7-4.5-0.7-7.8V25.8h-7.6V24h7.6v-12c5 0 9.3-1 13-2.9V24H256.6zM282.5 26.6c-1.2-1.4-3-2.2-5.6-2.2 -1.2 0-2.3 0.2-3.5 0.5s-2.1 0.9-2.9 1.6c1.7 0.6 3 1.4 3.9 2.6s1.4 2.7 1.4 4.5c0 1.2-0.3 2.3-0.9 3.3s-1.5 1.8-2.6 2.3 -2.4 0.9-3.8 0.9c-1.9 0-3.5-0.7-4.6-2 -1.2-1.3-1.7-3-1.7-5 0-3.1 1.7-5.6 5-7.6 3.7-2 8.2-3 13.7-3 6.2 0 10.5 1.3 13.1 4 1.3 1.3 2.1 2.8 2.5 4.7 0.4 1.9 0.7 4.5 0.7 7.9v24.5c0 1.5 0.1 2.5 0.4 3.1 0.3 0.6 0.8 0.9 1.5 0.9 1 0 2.1-0.5 3.3-1.5l0.9 1.5c-1.4 1.1-2.9 2-4.5 2.5s-3.5 0.8-5.8 0.8c-3 0-5.2-0.7-6.6-2 -1.3-1.3-2-3.1-2-5.3 -1.5 2.4-3.4 4.3-5.8 5.5 -2.4 1.2-4.9 1.8-7.6 1.8 -3.4 0-6.2-0.9-8.2-2.7 -2.1-1.8-3.1-4.3-3.1-7.5 0-3.1 1-5.7 3.1-7.8 2.1-2 5.2-3.9 9.5-5.4 0.5-0.2 2-0.8 4.6-1.7s4.4-2 5.6-3c1.1-1 1.7-2.2 1.7-3.4v-7C284.2 30 283.7 28.1 282.5 26.6zM282.4 45.2c-0.9 0.7-2.1 1.5-3.7 2.5 -1.9 1.3-3.4 2.8-4.5 4.5s-1.6 3.7-1.6 6.2c0 2.3 0.5 4.1 1.5 5.3s2.4 1.7 4 1.7c2.4 0 4.4-1.2 6.1-3.7V43.2C283.9 43.8 283.2 44.5 282.4 45.2zM326.7 24.9c2.4-1.5 5.2-2.2 8.3-2.2s6 0.9 8.4 2.6c2.4 1.7 4.4 4.3 5.8 7.8 1.4 3.5 2.1 7.8 2.1 12.9 0 6-0.9 10.9-2.7 14.7 -1.8 3.8-4.3 6.6-7.4 8.4 -3.1 1.8-6.6 2.6-10.5 2.6 -4.2 0-7.5-1.1-10.1-3.2 -0.3 0-0.8 0-1.4 0 -2 0-3.9 0.3-5.7 0.9 -1.9 0.6-3.3 1.4-4.5 2.4l-1.4-0.8c0.4-1.5 0.6-3.2 0.6-5V10.9c0-2.8-0.4-4.8-1.3-6 -0.9-1.2-2.4-1.9-4.5-1.9V1.1c1.9 0.2 3.7 0.3 5.6 0.3 5.3 0 9.7-0.4 13.1-1.3v31.2C322.5 28.5 324.3 26.4 326.7 24.9zM328 69.9c6.5 0 9.8-7.5 9.8-22.6 0-7.4-0.7-12.7-2-15.9 -1.4-3.2-3.3-4.8-6-4.8 -2 0-3.7 0.7-5.3 2.1 -1.6 1.4-2.6 3.3-3.1 5.7v33C323.3 69.1 325.5 69.9 328 69.9zM372.2 66c0.4 0.9 1 1.6 1.8 2 0.8 0.4 2 0.6 3.4 0.6v1.9c-6.2-0.2-10.2-0.4-12-0.4 -2.1 0-6.2 0.1-12.4 0.4v-1.9c1.4 0 2.6-0.2 3.4-0.6 0.8-0.4 1.4-1 1.8-2 0.4-0.9 0.6-2.2 0.6-3.9V10.8c0-2.8-0.4-4.8-1.3-6 -0.9-1.2-2.4-1.9-4.5-1.9V1c1.9 0.2 3.8 0.3 5.6 0.3 5.3 0 9.7-0.4 13.1-1.3v62.1C371.7 63.8 371.9 65.1 372.2 66zM393.4 46.9c0 4 0.6 7.3 1.7 9.9s2.6 4.5 4.3 5.8 3.7 1.8 5.7 1.8c5 0 8.9-2.4 11.9-7.2l1.6 0.5c-0.8 2.5-1.9 4.8-3.5 6.9s-3.6 3.9-6.1 5.2c-2.4 1.3-5.2 2-8.4 2 -4.1 0-7.8-0.9-10.9-2.6 -3.1-1.8-5.6-4.4-7.3-8s-2.6-8-2.6-13.4c0-5.4 0.9-10 2.8-13.8s4.5-6.5 7.8-8.4c3.3-1.9 7.1-2.8 11.5-2.8 11.3 0 16.9 6.7 16.9 20h-25.3C393.4 43.5 393.4 45 393.4 46.9zM406 29.3c-1-3.1-2.6-4.7-4.7-4.7 -2.1 0-3.9 1.3-5.3 4s-2.3 6.8-2.6 12.4h14.1C407.5 36.3 407.1 32.4 406 29.3z"></path>
		</svg>
	</div>
	<form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="formitable_hidden" value="Y">
	<?php wp_nonce_field( 'update-formitable-settings' );?>
	<?php echo "<h2>" . __( 'Restaurant', 'oscimp_trdom' ) . "</h2>"; ?>
	<p>
		Please contact us at <a href="mailto:hello@formitable.com">hello@formitable.com</a> to get your restaurant UID.  
	</p>
	<table class="ft-table">
		<tr>
			<td><span><?php _e("Restaurant UID: " ); ?></span></td>
			<td><input placeholder="<?php _e(" ex: a1b2c3d4" ); ?>" type="text" name="ft_restaurantUid" value="<?php echo $ft_restaurantUid; ?>" size="20"></td>
		</tr>
	</table>
	<?php echo "<h2>" . __( 'Booking Widget', 'oscimp_trdom' ) . "</h2>"; ?>
	<p>
		<strong>Activate modules to add functionality to your widget and SDK.</strong><br/>  
	</p>
		<table class="ft-table">
			<tr class="ft-table-active">
				<td><span><a title=""Klik voor meer info" target="_blank" href="https://formitable.com/nl/developers/widget?uid=<?php echo $ft_restaurantUid; ?>">Analytics</a>:</span></td><td><input type="checkbox" name="ft_modules_analytics" value="1" <?php checked( '1', get_option( 'ft_modules_analytics' ) ); ?> ></td>
			</tr>
		</table>
	</p>
	<p>
		<strong>Use these settings to add and customize the Formitable booking widget on your website.</strong><br/>  
	</p>
		<table class="ft-table">
			<tr class="ft-table-active">
				<td><span><?php _e("Active: " ); ?></span></td><td><input type="checkbox" name="ft_booking_active" value="1" <?php checked( '1', get_option( 'ft_booking_active' ) ); ?> ></td>
			</tr>
			<tr class="ft-table-active">
				<td><span><?php _e("Toolbar: " ); ?></span></td><td><input type="checkbox" name="ft_booking_toolbar" value="1" <?php checked( '1', get_option( 'ft_booking_toolbar' ) ); ?> ></td>
			</tr>
			<tr class="ft-table-active">
				<td><span><?php _e("Toolbar (on mobile): " ); ?></span></td><td><input type="checkbox" name="ft_booking_toolbar_mobile" value="1" <?php checked( '1', get_option( 'ft_booking_toolbar_mobile' ) ); ?> ></td>
			</tr>
			<tr>
				<td><span><?php _e("Open widget on load: " ); ?></span></td>
				<td>
					<select name="ft_booking_autoOpen">
						<option <?php if($ft_booking_autoOpen == "false") echo "selected"; ?> value="false">No</option>
						<option <?php if($ft_booking_autoOpen == "true") echo "selected"; ?> value="true">Yes</option>
						<option <?php if($ft_booking_autoOpen == "500") echo "selected"; ?> value="500">Yes, with delay (500ms)</option>
						<option <?php if($ft_booking_autoOpen == "1000") echo "selected"; ?> value="1000">Yes, with delay (1000ms)</option>
						<option <?php if($ft_booking_autoOpen == "1500") echo "selected"; ?> value="1500">Yes, with delay (1500ms)</option>
						<option <?php if($ft_booking_autoOpen == "2000") echo "selected"; ?> value="2000">Yes, with delay (2000ms)</option>
						<option <?php if($ft_booking_autoOpen == "2500") echo "selected"; ?> value="2500">Yes, with delay (2500ms)</option>
						<option <?php if($ft_booking_autoOpen == "3000") echo "selected"; ?> value="3000">Yes, with delay (3000ms)</option>
						<option <?php if($ft_booking_autoOpen == "3500") echo "selected"; ?> value="3500">Yes, with delay (3500ms)</option>
						<option <?php if($ft_booking_autoOpen == "4000") echo "selected"; ?> value="4000">Yes, with delay (4000ms)</option>

					</select>
				</td>
			</tr>
			<tr>
				<td><span><?php _e("Open widget on load (on mobile): " ); ?></span></td>
				<td>
					<select name="ft_booking_autoOpen_mobile">
						<option <?php if($ft_booking_autoOpen_mobile == "false") echo "selected"; ?> value="false">No</option>
						<option <?php if($ft_booking_autoOpen_mobile == "true") echo "selected"; ?> value="true">Yes</option>
						<option <?php if($ft_booking_autoOpen_mobile == "500") echo "selected"; ?> value="500">Yes, with delay (500ms)</option>
						<option <?php if($ft_booking_autoOpen_mobile == "1000") echo "selected"; ?> value="1000">Yes, with delay (1000ms)</option>
						<option <?php if($ft_booking_autoOpen_mobile == "1500") echo "selected"; ?> value="1500">Yes, with delay (1500ms)</option>
						<option <?php if($ft_booking_autoOpen_mobile == "2000") echo "selected"; ?> value="2000">Yes, with delay (2000ms)</option>
						<option <?php if($ft_booking_autoOpen_mobile == "2500") echo "selected"; ?> value="2500">Yes, with delay (2500ms)</option>
						<option <?php if($ft_booking_autoOpen_mobile == "3000") echo "selected"; ?> value="3000">Yes, with delay (3000ms)</option>
						<option <?php if($ft_booking_autoOpen_mobile == "3500") echo "selected"; ?> value="3500">Yes, with delay (3500ms)</option>
						<option <?php if($ft_booking_autoOpen_mobile == "4000") echo "selected"; ?> value="4000">Yes, with delay (4000ms)</option>

					</select>
				</td>
			</tr>
			<tr>
			<td><span><?php _e("Color: " ); ?></span></td><td><input placeholder="<?php _e(" ex: #000000" ); ?>" type="text" name="ft_booking_color" value="<?php echo $ft_booking_color; ?>" size="20" data-default-color="#444" class="color-field"></td></tr>
			<tr class="ft-table-language"><td><span><?php _e("Language: " ); ?></span></td>
				<td>
					<select name="ft_booking_language">
						<option <?php if($ft_booking_language == "nl") echo "selected"; ?> value="nl">Nederlands</option>
						<option <?php if($ft_booking_language == "en") echo "selected"; ?> value="en">English</option>
						<option <?php if($ft_booking_language == "auto") echo "selected"; ?> value="auto">Auto</option>
					</select>
				</td>
			</tr>
			<tr><td><span><?php _e("Tag: " ); ?></span></td><td><input placeholder="<?php _e(" ex: Website" ); ?>" type="text" name="ft_booking_tag" value="<?php echo $ft_booking_tag; ?>" size="20"></td></tr>
		</table>
		<p class="submit">
			<input type="submit" name="Submit" value="<?php _e('Update settings', 'oscimp_trdom' ) ?>" />
		</p>
	</form>
</div>