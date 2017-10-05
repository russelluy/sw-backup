<?php
/*
Template Name: Safeway New Pages Template
*/
?>
            
 <?php 
//If the form is submitted
if(isset($_POST['submitted'])) {

	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = 'Please enter your name.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = 'Please enter your email address.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		//Check to make sure that the name field is not empty
		if(trim($_POST['subject']) === '') {
			$subjectError = 'Please enter your subject.';
			$hasError = true;
		} else {
			$subject = trim($_POST['subject']);
		}			
		//Check to make sure comments were entered	
		if(trim($_POST['comments']) === '') {
			$commentError = 'Please enter your comments.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		//If there is no error, send the email
		if(!isset($hasError)) {
      
      $info_email = get_option('Ag_info_email');  
			$emailTo = $info_email;
			$subject = $subject;
			$sendCopy = trim($_POST['sendCopy']);
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);

			if($sendCopy == true) {
				$subject = $subject;
				$headers = 'From: Your Site <noreply@yourdomain.com>';
				mail($emailTo, $subject, $body, $headers);
			}

			$emailSent = true;

		}
	}
} ?>

            <?php get_header();?>
				               	<div id="content1b2">
				                  	<div class="maincontent_b">
						                      <!-- BEGIN PAGE TITLE -->
				             <div id="page-title">                
				                  <div class="title"><!-- your title page -->
				                  	 <h1><?php the_title();?></h1>
				                  </div>
				                  <?php $data = get_post_meta($post->ID, '_short_desc', true ); ?>
				                  <?php if ($data) : ?>
				                  <div class="desc"><!-- description about your page -->
				                  <?php echo $data;?>
				                  </div>
				                  <?php endif;?>
					  		       </div>            
				            <!-- END OF PAGE TITLE -->
				            
				            <!-- BEGIN CONTENT -->
            <div id="content-inner">
               	<div id="content-left">
                     <div class="maincontent">
<?php if(isset($emailSent) && $emailSent == true) { ?>

                    	<div class="thanks">
                    		<h3>Thanks, <?=$name;?></h3>
                    		<p><?php echo __('Your email was successfully sent. I will be in touch soon.','safewaytheme');?></p>
                    	</div>
                    
                    <?php } else { ?>
                    
                    	<?php if (have_posts()) : ?>
                    	
                    	<?php while (have_posts()) : the_post(); ?>
                    		<?php the_content(); ?>
                    		
                    		<?php if(isset($hasError) || isset($captchaError)) { ?>
                    			<p class="error"><?php echo __('There was an error submitting the form.','safewaytheme');?><p>
                    		<?php } ?>
                    	
                    		<?php endwhile; ?>
                    	<?php endif; ?>
                    <?php } ?>

                     
                  	 </div>
                 </div>                 

                                                                             
                 </div>                         
            </div> 
            <!-- END OF CONTENT -->
                    </div>
                    
                 </div>
                 <div id="content3b2">                 		
			                  <div class="maincontent_d">
			                    	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('General Sidebar')) { ?>
			            	     <?php } ?>			            	     
			            	      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Video')) { ?>
			            	     <?php } ?>
			                  </div>	 
			             <div id="content3b_fold2">                     
	                  	</div>	  
	                  	<div class="clear"></div>                
                 </div>
                 <div class="clear"></div>
                 <!-- BEGIN BOTTOM BOX -->
        <?php get_footer();?>