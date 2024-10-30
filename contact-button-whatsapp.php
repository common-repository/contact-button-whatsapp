<?php
/*
Plugin Name:  Contact Button for WhatsApp
Plugin URI:   https://wordpress.cynux.com/plugins/contact-now-for-whatsapp/
Description:  A Basic WhatsApp Contact Button
Version:      1.0.2
Author:       Cynux Web Solutions
Author URI:   https://www.cynux.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html

*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


class WhatsAppContact {

	public $button_styles = [
		'default' => 'Default',
		'small'   => 'Small',
		'floating' => 'Floating'
	];


	public function __construct() {

		if ( is_admin() ) { // admin actions
			add_action( 'admin_menu', [ $this, 'options_page' ] );
			add_action( 'admin_init', [ $this, 'register_settings' ] );
		} else {
			add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
			add_action( 'wp_footer', [ $this, 'footer' ] );
		}
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'contact-button-whatsapp', plugins_url( 'css/style.css', __FILE__ ) );
		wp_enqueue_script( 'contact-button-whatsapp', plugins_url( 'js/script.js', __FILE__ ), 'jquery', '1.0.0', true );
	}

	function footer() {
		if ( get_option( 'whatsapp_contact_number' ) ) { //Only load button if phone number exists
			$button_style = array_key_exists( get_option( 'whatsapp_contact_button' ), $this->button_styles ) ? get_option( 'whatsapp_contact_button' ) : 'default';
			include_once plugin_dir_path( __FILE__ ) . 'buttons/' . $button_style . '.php';
		}
	}

	function show_settings_page() {
		include_once plugin_dir_path( __FILE__ ) . 'admin.php';
	}

	function options_page() {
		add_options_page( 'Contact Button for WhatsApp', 'Contact Button for WhatsApp', 'manage_options', 'contact-button-whatsapp', [
			$this,
			'show_settings_page'
		] );
	}

	function register_settings() {
		register_setting( 'whatsapp_contact', 'whatsapp_contact_button' );
		register_setting( 'whatsapp_contact', 'whatsapp_contact_number' );
		register_setting( 'whatsapp_contact', 'whatsapp_contact_message' );
	}
}

$WhatsAppContactObj = new WhatsAppContact();