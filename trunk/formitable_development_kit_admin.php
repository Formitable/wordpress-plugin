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
	<svg style=width:170px; id="ft-logo" viewBox="0 0 416.8 71.9">
            <g>
                <path d="M25,5.5c-0.9,1.2-1.4,2.6-1.4,4.2c0,2,0.6,3.6,1.9,4.7c1.2,1.1,2.9,1.7,4.9,1.7c1.2,0,2.3-0.3,3.3-0.9
		c1-0.6,1.7-1.3,2.3-2.3c0.5-1,0.8-2,0.8-3.1c0-1.4-0.3-2.7-0.9-3.9c-0.6-1.2-1.3-2.1-2.2-2.9c-2.7-2-5.9-3-9.6-3
		c-1.7,0-3.4,0.2-5,0.6c-0.7,0.2-1.4,0.4-2,0.6c-2.2,0.8-4,1.9-5.3,3.3C10.4,6,9.3,7.5,8.4,9.2c-0.8,1.7-1.4,3.7-1.8,6
		c-0.4,2.4-0.5,5.3-0.5,8.9H6H0v2.8h6v23.6v13.3v6.4h13.1v-7.6V50.4V26.8h9.6V24h-9.6V12c0.1-1.6,0.2-3,0.3-4c0.2-1.7,0.7-3,1.3-3.9
		c1-1.6,2.6-2.4,4.9-2.4c0.8,0,1.5,0.1,2.1,0.4c0.6,0.2,0.9,0.5,1.1,0.9C27.2,3.5,25.9,4.3,25,5.5z"></path>
                <path d="M53.7,22.7c-6.9,0-12.2,2-16.2,5.9c-3.9,3.9-5.9,10.2-5.9,18.7c0,8.5,2,14.7,5.9,18.6c1.9,1.9,4.1,3.3,6.6,4.2
		c0.1,0,0.1,0,0.2,0.1c2.8,1,5.9,1.6,9.4,1.6s6.7-0.5,9.4-1.6c0.1,0,0.1,0,0.2-0.1c2.5-1,4.7-2.4,6.6-4.2c3.9-3.9,5.9-10.1,5.9-18.6
		c0-8.5-2-14.8-5.9-18.7C65.9,24.7,60.5,22.7,53.7,22.7z M47.5,30.1c1.5-3.8,3.6-5.6,6.2-5.6c2.6,0,4.7,1.9,6.2,5.6
		c1.5,3.7,2.3,9.5,2.3,17.2c0,7.7-0.8,13.4-2.3,17.1c-1.5,3.7-3.6,5.6-6.2,5.6c-2.6,0-4.6-1.9-6.2-5.6c-1.5-3.7-2.3-9.4-2.3-17.1
		C45.2,39.6,45.9,33.9,47.5,30.1z"></path>
                <path d="M114.1,23.9c-1.2-0.8-2.8-1.2-4.6-1.2c-2.7,0-5.2,0.8-7.3,2.4c-2.1,1.6-3.8,3.6-4.9,6.1c0,0,0,0,0,0
		c0,0,0,0,0,0.1V23c-3.4,0.8-7.7,1.2-12.9,1.2v45.9v0.1v0.1c1.6-0.1,3-0.1,4.2-0.1h6.1c0.8,0,1.7,0,2.7,0.1v-0.1v-0.1v-8.9v-5.7h0h0
		V36.5c0.1-1.3,0.4-2.7,1-4.1c0.7-1.7,1.7-3.2,3-4.4c1.3-1.2,2.7-1.9,4.2-2.2c0.5-0.1,1-0.2,1.4-0.2c0.4,0,0.7,0,1.1,0.1
		c-2.6,1.8-4,4.2-4,7c0,1.8,0.6,3.2,1.8,4.2s2.8,1.6,4.9,1.6c2.1,0,3.8-0.7,5.1-2.1c1.3-1.4,1.9-3.2,1.9-5.4c0-1.4-0.3-2.8-0.9-4
		C116.2,25.7,115.3,24.7,114.1,23.9z"></path>
                <path d="M189.3,26.2c-2-2.3-5.3-3.5-9.9-3.5c-3.3,0-6.3,0.7-8.8,2c-2.5,1.3-4.6,3.6-6.1,6.9c-0.4-2.3-1.2-4.2-2.3-5.4
		c-2-2.3-5.3-3.5-9.9-3.5c-6.6,0-11.3,2.8-14,8.3V23c-3.5,0.8-7.8,1.2-13.1,1.2c-1.8,0-3.7-0.1-5.6-0.3v1.9c2.1,0,3.6,0.6,4.5,1.9
		c0.8,1.2,1.3,3.3,1.3,6v28.4c0,0.3,0,0.6,0,0.9v7h13v-8V46.4v-9.3c0-1.9,0.4-3.7,1.2-5.3s1.9-2.8,3.2-3.8c1.3-0.9,2.8-1.4,4.4-1.4
		c1.9,0,3.2,0.6,3.9,1.8c0.6,1.2,1,3.1,1,5.6v12.3v15.7v8h13v-8v-6.6V37.9v-1.6c0.2-1.8,0.7-3.5,1.5-4.9c0.8-1.5,1.9-2.6,3.1-3.5
		c1.3-0.8,2.6-1.3,4.1-1.3c2.1,0,3.5,0.6,4.3,1.9s1.1,3.1,1.1,5.6v21.4v6.6v8h13v-8V42v-4.1c0-3-0.2-5.4-0.6-7.3
		C191,28.8,190.3,27.3,189.3,26.2z"></path>
                <path d="M217.7,2.6c-1.5-1.2-3.5-1.8-6-1.8c-2.5,0-4.6,0.6-6,1.8c-1.5,1.2-2.2,2.9-2.2,5.1c0,2.2,0.7,3.9,2.2,5.1
		c1.5,1.2,3.5,1.8,6,1.8c2.5,0,4.5-0.6,6-1.8c1.5-1.2,2.2-2.9,2.2-5.1C220,5.5,219.2,3.8,217.7,2.6z"></path>
                <path d="M256.5,62.5C256.6,62.5,256.6,62.5,256.5,62.5L256.5,62.5L256.5,62.5z"></path>
                <path d="M293,26.8c-2.6-2.7-7-4-13.1-4c-5.5,0-10,1-13.7,3c-3.3,1.9-5,4.5-5,7.6c0,2,0.6,3.6,1.7,5
		c1.2,1.3,2.7,2,4.6,2c1.4,0,2.7-0.3,3.8-0.9s2-1.3,2.6-2.3s0.9-2.1,0.9-3.3c0-1.8-0.5-3.3-1.4-4.5s-2.2-2.1-3.9-2.6
		c0.8-0.7,1.7-1.3,2.9-1.6s2.3-0.5,3.5-0.5c2.5,0,4.4,0.7,5.6,2.2c1.2,1.4,1.8,3.4,1.8,5.9v7c0,1.2-0.6,2.4-1.7,3.4
		c-1.1,1-3,2-5.6,3s-4.1,1.6-4.6,1.7c-4.3,1.6-7.5,3.4-9.5,5.4c-2.1,2.1-3.1,4.6-3.1,7.8c0,3.2,1,5.7,3.1,7.5
		c0.8,0.7,1.8,1.3,2.8,1.7c0,0,0.1,0,0.2,0.1c1.5,0.6,3.3,0.9,5.3,0.9c1.9,0,3.7-0.3,5.5-0.9c0.1,0,0.1,0,0.2-0.1
		c0.7-0.2,1.3-0.5,2-0.8c2.4-1.2,4.3-3,5.8-5.5c0,2.2,0.7,3.9,2,5.3c0.4,0.4,0.9,0.8,1.5,1c0,0,0.1,0,0.1,0.1c1.3,0.6,2.9,0.9,5,0.9
		c1.5,0,2.9-0.1,4.1-0.4v-0.6v-0.1V56.8h0V39.3c0-3.4-0.2-6-0.7-7.9C295.1,29.6,294.3,28,293,26.8z M283.2,61.7
		c-1.7,2.5-3.7,3.7-6.1,3.7c-1.7,0-3-0.6-4-1.7s-1.5-2.9-1.5-5.3c0-2.5,0.5-4.5,1.6-6.2s2.6-3.1,4.5-4.5c1.6-1,2.8-1.8,3.7-2.5
		s1.5-1.4,1.9-2V61.7z"></path>
                <path d="M341.5,25.3c-2.4-1.7-5.3-2.6-8.4-2.6s-5.9,0.7-8.3,2.2c-2.4,1.5-4.2,3.6-5.4,6.4V0.1
		c-3.5,0.9-7.9,1.3-13.1,1.3c-1.8,0-3.7-0.1-5.6-0.3V3c2.1,0,3.6,0.6,4.5,1.9c0.9,1.2,1.3,3.3,1.3,6v55.2c0,0,0,0,0,0.1v4v0.1v1.3
		l0.8,0.5c0.8-0.7,1.7-1.3,2.8-1.8c0,0,0.1,0,0.1-0.1c0.5-0.2,1-0.4,1.6-0.6c1.9-0.6,3.8-0.9,5.7-0.9c0.6,0,1.1,0,1.4,0
		c0.7,0.6,1.5,1.1,2.4,1.5c0,0,0.1,0,0.1,0.1c2.1,1,4.6,1.6,7.6,1.6c3,0,5.8-0.5,8.3-1.6c0,0,0.1,0,0.1-0.1c0.7-0.3,1.4-0.6,2-1
		c3.1-1.8,5.6-4.6,7.4-8.4c1.8-3.8,2.7-8.7,2.7-14.7c0-5.1-0.7-9.4-2.1-12.9C345.9,29.6,344,27,341.5,25.3z M319.3,67.5v-33
		c0.5-2.4,1.5-4.3,3.1-5.7c1.6-1.4,3.4-2.1,5.3-2.1c2.6,0,4.6,1.6,6,4.8c1.4,3.2,2,8.5,2,15.9c0,15.1-3.3,22.6-9.8,22.6
		C323.5,69.9,321.3,69.1,319.3,67.5z"></path>
                <path d="M369.7,0c-3.5,0.9-7.9,1.3-13.1,1.3c-1.8,0-3.7-0.1-5.6-0.3v1.9c2.1,0,3.6,0.6,4.5,1.9c0.9,1.2,1.3,3.3,1.3,6
		v34.4h0.1v24.9h12.9v-7.3c0-0.2,0-0.4,0-0.7V0z"></path>
                <path d="M403.1,64.4c-2,0-3.9-0.6-5.7-1.8s-3.2-3.1-4.3-5.8s-1.7-5.9-1.7-9.9c0-1.9,0-3.3,0.1-4.2h25.3
		c0-13.3-5.6-20-16.9-20c-4.3,0-8.2,0.9-11.5,2.8c-3.3,1.9-5.9,4.7-7.8,8.4s-2.8,8.3-2.8,13.8c0,5.3,0.9,9.8,2.6,13.4s4.2,6.3,7.3,8
		c0.7,0.4,1.4,0.7,2.1,1c0,0,0.1,0,0.1,0.1c2.6,1,5.5,1.6,8.6,1.6c2.8,0,5.3-0.5,7.5-1.6c0,0,0.1,0,0.1-0.1c0.2-0.1,0.5-0.2,0.7-0.4
		c2.4-1.3,4.5-3.1,6.1-5.2s2.8-4.4,3.5-6.9l-1.6-0.5C412,62,408,64.4,403.1,64.4z M394,28.6c1.4-2.7,3.2-4,5.3-4
		c2.1,0,3.7,1.6,4.7,4.7c1,3.1,1.5,7,1.4,11.7h-14.1C391.7,35.4,392.5,31.2,394,28.6z"></path>
                <path d="M200.1,24v1.9c2.1,0,3.6,0.6,4.5,1.9c0.8,1.2,1.3,3.3,1.3,6V42h0v28.1h5.5h7.4v-3.6V54.3h0V23
		c-3.5,0.8-7.8,1.2-13.1,1.2C203.9,24.2,202,24.1,200.1,24z"></path>
                <path d="M245,9.2c-3.7,1.9-8,2.9-13,2.9v12h-7.6v2.8h7.6v29.3c0,3.3,0.2,6,0.7,7.8c0.5,1.9,1.3,3.4,2.6,4.7
		c2.1,2.1,5.1,3.1,9,3.1c4.2,0,7.4-1.5,9.8-4.6l-1.6-1.6c-1,1-2.2,1.5-3.6,1.5c-1.3,0-2.3-0.4-3-1.1s-1-2-1-3.8V26.9h10.6V24H245
		V9.2z"></path>
            </g>
        </svg>
	</div>
	<form name="oscimp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="formitable_hidden" value="Y">
	<?php wp_nonce_field( 'update-formitable-settings' );?>
	<?php echo "<h2>" . __( 'Restaurant', 'oscimp_trdom' ) . "</h2>"; ?>
	<p>
		Please contact us at <a href="mailto:hello@formitable.com">hello@formitable.com</a> to get your restaurant UID.<br/>
		Or get it in Formitable under <b>Settings</b> -> <b>Widgets</b>.<br/>
		Find the complete documentation for your widget here: <a target="_blank" href="https://formitable.com/en/developers/widget?uid=<?php echo $ft_restaurantUid; ?>">https://formitable.com/en/developers/widget</a>  
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
				<td><span><a title="Klik voor meer info" target="_blank" href="https://formitable.com/en/developers/analytics">Analytics</a>:</span></td><td><input type="checkbox" name="ft_modules_analytics" value="1" <?php checked( '1', get_option( 'ft_modules_analytics' ) ); ?> ></td>
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
						<option <?php if($ft_booking_language == "browser") echo "selected"; ?> value="browser">Browser language</option>
						<option <?php if($ft_booking_language == "auto") echo "selected"; ?> value="auto">Website language</option>
						<option <?php if($ft_booking_language == "ca") echo "selected"; ?> value="ca">Catalan</option>
						<option <?php if($ft_booking_language == "da") echo "selected"; ?> value="da">Dansk</option>						
						<option <?php if($ft_booking_language == "de") echo "selected"; ?> value="de">Deutsch</option>
						<option <?php if($ft_booking_language == "en") echo "selected"; ?> value="en">English</option>
						<option <?php if($ft_booking_language == "es") echo "selected"; ?> value="es">Español</option>
						<option <?php if($ft_booking_language == "fr") echo "selected"; ?> value="fr">Français</option>
						<option <?php if($ft_booking_language == "nb") echo "selected"; ?> value="nb">Norsk (Bokmål)</option>
						<option <?php if($ft_booking_language == "nl") echo "selected"; ?> value="nl">Nederlands</option>
						<option <?php if($ft_booking_language == "sv") echo "selected"; ?> value="sv">Svenska</option>
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