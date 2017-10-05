<?php
/**
 * Index Template
 *
 */

get_header(); // Loads the header.php template. ?>
<div class="dividerbar">
</div>
<div class="midsection">
	<div class="aside">
	
		<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template.  ?>
		
		
	
	</div>
			<div class="zlide_wrap">
					<div class="zlide">
							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Slideshow')) {
								                    } ?>	
							
					</div>
					<div class="zlide_bottom"></div>	
			</div>
			
				
	</div><!-- #midsection -->
	
	<?php do_atomic( 'before_content' ); // SWMilbrae_before_content ?>
	
	<div class="content-wrap">
		
				<?php get_sidebar( 'subsidiary' ); // Loads the sidebar-subsidiary.php template. ?>		
				
				<?php get_sidebar( 'secondary' ); // Loads the sidebar-secondary.php template. ?>


		

	
		<?php do_atomic( 'after_content' ); // SWMilbrae_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>