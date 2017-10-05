<?php
/**
 * Footer Template
 *
 */
?>
				
				
				
				
				</div><!-- .content-wrap -->

				<?php do_atomic( 'close_main' ); // SWMilbrae_close_main ?>

		</div><!-- #main -->

		<?php do_atomic( 'after_main' ); // SWMilbrae_after_main ?>



		<?php do_atomic( 'before_footer' ); // SWMilbrae_before_footer ?>

		<div id="footer">

			<?php do_atomic( 'open_footer' ); // SWMilbrae_open_footer ?>
			
			<div id="footer-content">
				
				<div class="footer2">

              			<?php 
				$footerFile = "/var/www/assets/footer/footer.html";
				$fh = fopen($footerFile, 'r');
				$data = fread($fh, filesize($footerFile));
				fclose($fh);
				echo $data;
				?>	
                    		
				</div>
				
			</div>
				
			

			<?php do_atomic( 'footer' ); // SWMilbrae_footer ?>

			<?php do_atomic( 'close_footer' ); // SWMilbrae_close_footer ?>

		</div><!-- #footer -->

		<?php do_atomic( 'after_footer' ); // SWMilbrae_after_footer ?>
		
		</div><!-- .wrap -->

	</div><!-- #container -->

	<?php do_atomic( 'close_body' ); // SWMilbrae_close_body ?>
	
	<?php wp_footer(); // wp_footer ?>

</body>
</html>