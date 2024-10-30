<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="wrap">
    <h1>Contact Button for WhatsApp</h1>
    <hr>
    <form method="post" action="options.php">
		<?php settings_fields( 'whatsapp_contact' ) ?>
		<?php do_settings_sections( 'whatsapp_contact' ) ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Button Style</th>
                <td>
                    <select name="whatsapp_contact_button">
						<?php foreach ( $this->button_styles as $key => $button_style ) : ?>
                            <option value="<?php echo $key; ?>" <?php if ( get_option( 'whatsapp_contact_button' ) == $key ) {
								echo "selected";
							} ?>><?php echo $button_style; ?></option>
						<?php endforeach; ?>
                    </select>
                    <p class="description">More styles will be available in next release.</p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Contact Number</th>
                <td>
                    <input type="text" name="whatsapp_contact_number"
                           value="<?php echo esc_attr( get_option( 'whatsapp_contact_number' ) ); ?>"/>
                    <p class="description">This is your phone number for what's app <strong>including</strong> country
                        code. Please enter numbers only. i.e. 15111231234</p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Default Message</th>
                <td>
                    <textarea name="whatsapp_contact_message"
                              rows="5"><?php echo esc_attr( get_option( 'whatsapp_contact_message' ) ); ?></textarea>
                    <p class="description">This is the initial message which will appear in the user's WhatsApp.</p>
                </td>
            </tr>
        </table>
		<?php submit_button() ?>
    </form>
</div>