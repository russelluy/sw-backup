<?php
/*
Template Name: Safeway Pages Template
*/
get_header(); ?>
<script type="text/javascript">
            jQuery(document).ready(function(){			   
               jQuery(window).resize(function(){
			adjustHeight();
               });
		jQuery(window).load(function(){
			adjustHeight();
               });   
            });

function adjustHeight(){
	var height = jQuery(window).height();
			if(height < 700){												
				jQuery('.wrapper_wrap2').css('min-height', '490px');
			}
}
</script>
<div class="wrapper_more">	
	<div class="wrapper_wrap2">	
		<div id="main">		
			 
			<div id="container_page">
			<div class="zlide_page">
					
			</div>
				<!-- Bottom Section Temporarily Taken Out -->
				<div class="container_bodywrap">
					<div id="container_lft">
							<?php get_template_part( 'loop', 'index' );?>
					</div><!-- #container_lft -->
					
					<div class="clear"></div>
				</div>
			</div>

		</div>

		<div class="footerwrap">
			<?php get_footer(); ?>
		</div>
	</div>
</div>
</div>
