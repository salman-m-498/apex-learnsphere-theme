<?php
/**
 * Contact / enquiry form for Apex LearnSphere.
 *
 * Self-contained (no plugin), with a honeypot, nonce and sanitisation.
 * NOTE: wp_mail() requires a working mail setup. In production, configure
 * an SMTP plugin or a transactional email provider.
 *
 * @package apex-learnsphere
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render the enquiry form.
 */
function apex_enquiry_form( $context = '' ) {
	$sent = isset( $_GET['sent'] ) ? sanitize_text_field( wp_unslash( $_GET['sent'] ) ) : '';
	$err  = isset( $_GET['error'] ) ? sanitize_text_field( wp_unslash( $_GET['error'] ) ) : '';

	// Pre-fill the message when arriving from a specific event's "Enquire" button.
	$event_title = isset( $_GET['event'] ) ? sanitize_text_field( wp_unslash( $_GET['event'] ) ) : '';
	$prefill     = $event_title ? sprintf( __( 'I am interested in: %s', 'apex-learnsphere' ), $event_title ) : '';

	if ( '1' === $sent ) {
		echo '<div class="form-notice form-notice--success" role="status"><p><strong>Thank you — your enquiry has been received.</strong> A member of our team will be in touch shortly.</p></div>';
	} elseif ( '1' === $err ) {
		echo '<div class="form-notice form-notice--error" role="alert"><p><strong>Something went wrong.</strong> Please try again, or email us directly at <a href="mailto:' . esc_attr( apex_brand( 'email' ) ) . '">' . esc_html( apex_brand( 'email' ) ) . '</a>.</p></div>';
	}
	?>
	<form class="enquiry-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" novalidate>
		<input type="hidden" name="action" value="apex_enquiry" />
		<?php wp_nonce_field( 'apex_enquiry', 'apex_enquiry_nonce' ); ?>
		<p class="enquiry-form__honeypot" aria-hidden="true">
			<label>Leave this field empty<input type="text" name="website" tabindex="-1" autocomplete="off" /></label>
		</p>

		<div class="form-grid">
			<div class="form-field">
				<label for="apex-name">Full name <span class="req">*</span></label>
				<input type="text" id="apex-name" name="name" required autocomplete="name" placeholder="Your name" />
			</div>
			<div class="form-field">
				<label for="apex-email">Email <span class="req">*</span></label>
				<input type="email" id="apex-email" name="email" required autocomplete="email" placeholder="you@example.com" />
			</div>
			<div class="form-field">
				<label for="apex-phone">Phone / WhatsApp</label>
				<input type="tel" id="apex-phone" name="phone" autocomplete="tel" placeholder="+974 …" />
			</div>
			<div class="form-field">
				<label for="apex-country">Country</label>
				<input type="text" id="apex-country" name="country" autocomplete="country-name" placeholder="e.g. Qatar" />
			</div>
			<div class="form-field">
				<label for="apex-type">I am a… <span class="req">*</span></label>
				<select id="apex-type" name="visitor_type" required>
					<option value="">Please select</option>
					<option value="School / Institution">School / Institution</option>
					<option value="Student">Student</option>
					<option value="Parent / Family">Parent / Family</option>
					<option value="Business / Organisation">Business / Organisation</option>
					<option value="Sports Organisation">Sports Organisation</option>
					<option value="Other">Other</option>
				</select>
			</div>
			<div class="form-field">
				<label for="apex-interest">Area of interest <span class="req">*</span></label>
				<select id="apex-interest" name="interest" required>
					<option value="">Please select</option>
					<option value="Education">Education</option>
					<option value="Career Guidance & Counselling">Career Guidance &amp; Counselling</option>
					<option value="Management">Management</option>
					<option value="Sport">Sport</option>
					<option value="Business & Leadership">Business &amp; Leadership</option>
					<option value="General enquiry">General enquiry</option>
				</select>
			</div>
			<div class="form-field form-field--full">
				<label for="apex-message">How can we help? <span class="req">*</span></label>
				<textarea id="apex-message" name="message" rows="5" required placeholder="Tell us a little about what you need…"><?php echo esc_textarea( $prefill ); ?></textarea>
			</div>
		</div>

		<p class="form-consent">By submitting this form you agree to be contacted about your enquiry. We only use your details to respond to you — see our Privacy Policy.</p>
		<button type="submit" class="btn btn--primary">Send enquiry <span class="btn__arrow" aria-hidden="true">&#8594;</span></button>
	</form>
	<?php
}

/**
 * Handle the enquiry form submission.
 */
function apex_handle_enquiry() {
	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/contact/' );

	if ( ! isset( $_POST['apex_enquiry_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['apex_enquiry_nonce'] ) ), 'apex_enquiry' ) ) {
		wp_safe_redirect( add_query_arg( 'error', '1', $redirect ) );
		exit;
	}

	// Honeypot.
	if ( ! empty( $_POST['website'] ) ) {
		wp_safe_redirect( add_query_arg( 'sent', '1', $redirect ) );
		exit;
	}

	$name    = isset( $_POST['name'] ) ? sanitize_text_field( wp_unslash( $_POST['name'] ) ) : '';
	$email   = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	$phone   = isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '';
	$country = isset( $_POST['country'] ) ? sanitize_text_field( wp_unslash( $_POST['country'] ) ) : '';
	$type    = isset( $_POST['visitor_type'] ) ? sanitize_text_field( wp_unslash( $_POST['visitor_type'] ) ) : '';
	$interest = isset( $_POST['interest'] ) ? sanitize_text_field( wp_unslash( $_POST['interest'] ) ) : '';
	$message = isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '';

	if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
		wp_safe_redirect( add_query_arg( 'error', '1', $redirect ) );
		exit;
	}

	$to      = get_option( 'admin_email' );
	$subject = sprintf( 'New enquiry from %s — %s', $name, get_bloginfo( 'name' ) );

	$body  = "A new enquiry was submitted.\n\n";
	$body .= "Name: {$name}\n";
	$body .= "Email: {$email}\n";
	$body .= "Phone / WhatsApp: {$phone}\n";
	$body .= "Country: {$country}\n";
	$body .= "Visitor type: {$type}\n";
	$body .= "Area of interest: {$interest}\n\n";
	$body .= "Message:\n{$message}\n";

	$headers = array( 'Reply-To: ' . $name . ' <' . $email . '>' );

	$ok = wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( $ok ? 'sent' : 'error', '1', $redirect ) );
	exit;
}
add_action( 'admin_post_nopriv_apex_enquiry', 'apex_handle_enquiry' );
add_action( 'admin_post_apex_enquiry', 'apex_handle_enquiry' );
