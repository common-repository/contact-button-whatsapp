<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
?>
<!-- default-button -->
<div class="cbfw-floating">
    <a href="https://wa.me/<?php echo get_option( 'whatsapp_contact_number' ); ?>?text=<?php echo urlencode( get_option( 'whatsapp_contact_message' ) ); ?>"
       target="_blank">
        <img src="<?php echo plugins_url( 'contact-button-whatsapp/images/logo-green.png' ); ?>" />
    </a>
</div>
