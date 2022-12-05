<?php

/*
Plugin Name: Formitable Development Kit
Plugin URI: https://formitable.com
Description: Tools for integrating Formitable on your website.
Version: 1.2
Author: Formitable
License: GPLv2 or later
*/

if ( ! defined( 'ABSPATH' ) ) exit;

add_action('admin_menu', 'formitable_widget_actions');
add_action('wp_footer', 'formitable_write_widget');

function formitable_development_kit_admin() {
	include('formitable_development_kit_admin.php');
}

function formitable_widget_actions() {
	add_options_page("Formitable", "Formitable", "manage_options", "Formitable", "formitable_development_kit_admin");
}

function formitable_write_widget(){
	echo formitable_get_widgetcode();
}

function formitable_get_widgetcode(){
	$widgetCode = 
'<script> 
	(function (d, s, id, h) { var ftjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; 
	var js = d.createElement(s); js.id = id; js.src = "https://cdn.formitable.com/sdk/v1/ft.sdk.min.js"; 
	h && (js.onload = h); ftjs.parentNode.insertBefore(js, ftjs); }
	(document, "script", "formitable-sdk"' . getWidgetHandler() . '));' . PHP_EOL . 
'</script>' . PHP_EOL;
		
	if (get_option('ft_booking_active') == 1)	
	{
		$widgetCode .= '<div class="ft-widget-side" data-restaurant="' . get_option('ft_restaurantUid') . '" data-open="' . get_option('ft_booking_autoOpen') . '" data-open-mobile="' . get_option('ft_booking_autoOpen_mobile') . '" data-toolbar="' . (get_option('ft_booking_toolbar') ? 'true' : 'false') . '" data-toolbar-mobile="' . (get_option('ft_booking_toolbar_mobile') ? 'true' : 'false') . '" data-color="' . get_option('ft_booking_color') . '" data-language="' . formitable_get_language() . '" data-tag="' . get_option('ft_booking_tag') . '"></div>';
	}
	
	return $widgetCode;
}


function getWidgetHandler(){
	$analytics = get_option('ft_modules_analytics');
	
	if ($analytics) {
		return ", function() { FT.load(\"Analytics\") }";
	}
}

function formitable_get_language(){
	$all_languages = array('en', 'nl');
	$lang = get_option('ft_booking_language');
	$locale = get_locale();
	
	if ($lang == 'auto')
	{
		if(strpos($locale, '_') !== false)
		{
			$items = explode('_', $locale);
			
			if (in_array($items[0], $all_languages))
			{
				return $items[0];
			}	
			else
			{
				return 'en';
			}				
		}
		else
		{
			return 'en';
		}
	}
	else {
		return $lang;
	}
}
?>