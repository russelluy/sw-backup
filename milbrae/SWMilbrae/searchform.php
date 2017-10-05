<?php
/**
 * Search Form Template
 *
 */
?>
			<div class="search">

				<form method="get" class="search-form" action="<?php echo trailingslashit( home_url() ); ?>">
				
				<div>
					<input class="search-submit button" name="submit" type="submit" value="<?php esc_attr_e( 'Search', 'SWMilbrae' ); ?>" />
					<input class="search-text" type="text" name="s" value="<?php if ( is_search() ) echo esc_attr( get_search_query() ); else esc_attr_e( 'Search this site...', 'SWMilbrae' ); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
					
					
					
				</div>
				
				</form><!-- .search-form -->

			</div><!-- .search -->