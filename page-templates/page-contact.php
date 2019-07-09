<?php
/**
 * Template Name: Contact Page Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define('WP_USE_THEMES', false);
require('wp-load.php');


  //response generation function
  $response = "";

  //function to generate response
  function my_contact_form_generate_response($type, $message){

    global $response;

	if($type == "success") $response = "<div class='row response'><i class='material-icons success'>check_circle</i><span>{$message}</span></div>";
    else $response = "<div class='row response'><i class='material-icons error'>error</i><span>{$message}</span></div>";

  }

  //response messages
$not_human       = "Human verification was incorrect. Please try again.";
$missing_content = "Please fill out all required fields (marked with *).";
$email_invalid   = "Please enter a valid email address.";
$message_unsent  = "Message was not sent. Please try again.";
$message_sent    = "Thank you! Your message has been sent. We'll be in touch.";

//user posted variables
$name = $_POST['message_name'];
$email = $_POST['message_email'];
$message = $_POST['message_text'];
$human = $_POST['message_human'];

//php mailer variables
$to = get_option('admin_email');
$subject = "Someone sent a message from ".get_bloginfo('name');
$headers = 'From: '. $email . "\r\n" .
  'Reply-To: ' . $email . "\r\n";

  if(!$human == 0){
  	if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
  	else {

    	//validate email
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  			my_contact_form_generate_response("error", $email_invalid);
		else //email is valid
		{
			//validate presence of name and message
			if(empty($name) || empty($message)){
	  			my_contact_form_generate_response("error", $missing_content);
			}
			else //ready to go!
			{
				//send email
				$sent = wp_mail($to, $subject, strip_tags($message), $headers);
				if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
				else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
			}
		}
 	}
	}
	else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);


get_header();

while ( have_posts() ) :
	the_post();
	get_template_part( 'loop-templates/content', 'empty' );
endwhile;

?>

<div class="container-fluid contact">
	<div class="card col-md-8 col-xs-12">
		<div class="card-body">
			<h1>Contact us</h1>
			<p>Schedule a demo or conversation with us to learn
				more about our service and how a partnership could launch your business forward.
			</p>
			<div>
				<div id="respond">
					<?php echo $response; ?>
					<form action="<?php the_permalink(); ?>" method="post">
						<div class="form-group">
							<label for="message_name" class="bmd-label-floating">Name *</label>
							<input type="text" class="form-control" name="message_name"
								value="<?php echo esc_attr($_POST['message_name']); ?>">
						</div>
						<div class="form-group">
							<label for="message_email" class="bmd-label-floating">Email address *</label>
							<input type="email" class="form-control" name="message_email"
								value="<?php echo esc_attr($_POST['message_email']); ?>">
							<span class="bmd-help">We'll never share your email with anyone else.</span>
						</div>
						<div class="form-group">
   							<label for="message_text" class="bmd-label-floating">Message *</label>
    						<textarea class="form-control" name="message_text" rows="3"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
  						</div>
						<div class="form-group">
							<label for="message_name" class="bmd-label-floating">Human verification: ? + 3 = 5 *</label>
							<input type="text" class="form-control" name="message_human">
						</div>
						<input type="hidden" name="submitted" value="1">
						<div class="action-buttons">
							<button class="btn btn-raised btn-primary" type="submit">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
