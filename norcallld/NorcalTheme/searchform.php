<?php
/**
 * Search Form Template
 *
 */
?>
			
			
			
			<div id="main">
	<div class="midsection">
			<div class="aside">
				<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template.  ?>
				<?php get_sidebar( 'primary' ); // Loads the sidebar-secondary.php template. ?>
			</div>
			<div class="zlide_wrap">
					<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
					<div id="contentb">
					
					<div class="search">

				<form method="get" class="search-form" action="<?php echo trailingslashit( home_url() ); ?>">
				
				<div>
					<input class="search-submit button" name="submit" type="submit" value="<?php esc_attr_e( 'Search', 'NorcalTheme' ); ?>" />
					<input class="search-text" type="text" name="s" value="<?php if ( is_search() ) echo esc_attr( get_search_query() ); else esc_attr_e( 'Search this site...', 'NorcalTheme' ); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
					
					
					
				</div>
				
				</form><!-- .search-form -->

			</div><!-- .search -->
			</div><!-- #content -->
					<div class="message">
							<?php get_sidebar( 'secondary' ); // Loads the sidebar-secondary.php template. ?>
					</div>
			</div>
	
					<?php do_atomic( 'before_content' ); // NorcalTheme_before_content ?>
	
					<div class="content-wrap">
								
								<?php do_atomic( 'after_content' ); // NorcalTheme_after_content ?>
					</div><!-- .content-wrap -->
								<?php do_atomic( 'close_main' ); // NorcalTheme_close_main ?>
								<?php do_atomic( 'after_main' ); // NorcalTheme_after_main ?>
								
		</div><!-- #midsection -->	
</div><!-- #main -->
		<?php do_atomic( 'before_footer' ); // NorcalTheme_before_footer ?>
		<?php get_footer(); // Loads the footer.php template. ?>