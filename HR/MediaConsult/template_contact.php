<?php 
/*
Template Name: Contact Form
*/
global $gw_options;
$name_of_your_site = get_option('blogname');
$email_adress_reciever = $gw_options['contact']['contact_mail'] != "" ? $gw_options['contact']['contact_mail'] : get_option('admin_email');

get_header();
$contact_show = true;
$gw_options['contact']['contact_check'] = true;

 //If the form is submitted  
 if(isset($_POST['submit'])) {  
  
     //Check to make sure that the name field is not empty  
     if(trim($_POST['contactname']) == '') {  
         $hasError = true;  
     } else {  
        $name = trim($_POST['contactname']);  
     }  
     //Check to make sure that the subject field is not empty  
    if(trim($_POST['subject']) == '') {  
         $hasError = true;  
     } else {  
         $subject = trim($_POST['subject']);  
     }  
   
    //Check to make sure sure that a valid email address is submitted  
    if(trim($_POST['email']) == '')  {  
         $hasError = true;  
     } else if (!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$/i", trim($_POST['email']))) {  
         $hasError = true;
     } else {  
         $email = trim($_POST['email']);  
     }  
 
    //Check to make sure comments were entered  
     if(trim($_POST['message']) == '') {  
         $hasError = true;  
    } else {  
        if(function_exists('stripslashes')) {  
             $comments = stripslashes(trim($_POST['message']));  
       } else {  
            $comments = trim($_POST['message']);  
        }  
     }  
  
    //If there is no error, send the email  
     if(!isset($hasError)) {  
	 	$contact_show = false;
        $emailTo = $gw_options['contact']['contact_mail']; 
        $body = "Name: $name \r\nEmail: $email \r\nSubject: $subject \r\nComments:\r\n $comments"; 
        $headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;  

        mail($emailTo, $subject, $body, $headers);  
       $emailSent = true;  
 }  
}  
?>  

    <div id="left">
		<div class="interior-header">
        	<h2>
			<?php         
            if($gw_options['contact']['contact_paragraph_title']) {
                echo $gw_options['contact']['contact_paragraph_title'];  
            }
            else {
				the_title();
            }	
            ?>            
            </h2>
            <p class="intheader-paragraph">
			<?php         
            if($gw_options['contact']['contact_paragraph']) {
                echo $gw_options['contact']['contact_paragraph'];  
            }
            else {
                echo 'Have a question? Want to leave feedback or just say hi? Please don’t hesitate to complete the 
				form below if you want to discuss ways we could help you reach your objectives.';
            }	
            ?>
            </p>
        </div>
        <div class="interior-content">
			<?php 
			if (have_posts()) : while (have_posts()) : the_post();
			
			the_content(); 
			?>
            
			<?php if(isset($hasError)) { //If errors are found ?>
            <div class="contact-error">
                <p>Please check if you've filled all the fields with valid information. Thank you.</p>
            </div>
            <?php } ?>
            
            <?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
            <div class="contact-success">
                <p>
                    <strong>Your message has been sent!</strong><br />
                    Thank you <strong><?php echo $name;?></strong> for emailing us! We will get in touch with you soon.
                </p>
            </div>
            <?php } ?>  
            
                <?php if ($contact_show == true) { ?>
                <form action="<?php echo $_SERVER['PATH_INFO']; ?>" method="post" id="contactform"><!-- Contact form -->
                    <fieldset class="contact-fieldset">
                        <h3>Send us a message</h3>
                        <ul>
                            <li>
                                <label for="contactname">Your Name:</label>
                                <input type="text" name="contactname" id="contactname" value="" class="contact-input required" />
                            </li>
                            <li>
                                <label for="email">Email:</label>
                                <input type="text" id="email" name="email" class="contact-input required email" />
                            </li>     
                            <li>
                                <label for="subject">Subject:</label>
                                <input type="text" name="subject" id="subject" class="contact-input required" />
                            </li>
                            <li>
                                <label for="message">Your message:</label>
                                <textarea rows="6" cols="40" id="message" name="message" class="contact-textarea required"></textarea>
                            </li>
                            <li>
                                <input type="submit" value="Send message" name="submit" class="contact-submit" />
                            </li>                      
                        </ul>
                    </fieldset>
                </form>
                <?php } ?>
                
            <?php endwhile; else: ?>
	
			<p>Sorry, no posts matched your criteria.</p>

			<!--do not delete-->
			<?php endif; ?>     
		</div>
        
    </div>
    <div id="right">

<?php if($gw_options['contact']['contact_map_small'] || $gw_options['contact']['contact_address']) { ?>		
        <div class="address-box"><!-- address & map section -->
            <?php         
            if($gw_options['contact']['contact_map_small']) { ?>
            	<h3>Map</h3>
                <a rel="lightbox" title="map location" href="<?php echo $gw_options['contact']['contact_map_big']; ?>">
                    <img src="<?php echo $gw_options['contact']['contact_map_small']; ?>" alt="" class="img-border map-img" />
                </a>    
                <span class="map-txt">Click on the map to view a larger image.</span>  
      <?php } ?>        

			<?php 
                if ($gw_options['contact']['contact_address']){ echo $gw_options['contact']['contact_address']; } elseif ($gw_options['contact']['contact_address'] == "") {echo "";} else {
				echo "<h3>Address</h3>            
					<address>
						<span>
							27 Tollit essent vituperata<br />
							UK, London
						</span>
						<span>
							Phone: 123 456 789<br />
							Fax: 123 456 799<br />
							Website: <a href='#'>http://mediaconsult.com</a><br />
							Email: <a href='#'>info@mediaconsult.com</a> 
						</span>
					</address>";
				} ?>         
        </div>
        <?php } ?> 	
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>
