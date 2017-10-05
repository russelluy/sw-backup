                <img src="<?php $_footer_logo = get_option('Ag_footer_logo'); if ($_footer_logo) : echo $_footer_logo;?> <?php else : ?> <?php bloginfo('template_directory');?>/images/footer-logo.gif<?php endif;?>" alt="" />
                 <?php
                $contactaddress = get_option('Ag_info_address');
                $contactphone = get_option('Ag_info_phone');
                $contactemail = get_option('Ag_info_email');
                ?>
                
                <p><?php if ($contactaddress) echo stripslashes($contactaddress); else echo "18th Place, M1234 Heavenway Road, HW 5468, USA";?><br />
				Phone: <?php if ($contactphone) echo $contactphone; else echo "+62 1234 5678";?>  <br />Email: <?php if ($contactemail) echo $contactemail; else echo "info@agivee.com";?><br />
                <?php $footer_text = get_option('Ag_footer_text');?>
                <?php if ($footer_text) echo stripslashes($footer_text); else echo "Copyright &copy; 2009 Agivee. All Rights Reserved";?><br />
                </p>
