<!-- begin left sidebar -->
<div id="left">
	<div id="navigation">
		<ul>
			<li class="page_item"><a href="<?php echo get_bloginfo('home'); ?>/">Home</a></li>
			<?php wp_list_pages('sort_column=menu_order&title_li='); ?>
		</ul><br/><br/><br/>
		
		<ul></ul>
	</div>
	<div id="email_updates"><div id="email_signup">
<form method="post" action="http://safewaynegotiations.com/seattle/subscribe-via-email"><input type="hidden" name="ip" value="65.208.210.97" /><p><label for="s2email">Get Email Updates:</label><br /><input type="text" name="email" id="s2email" value="Enter email address..." size="20" onfocus="if (this.value == 'Enter email address...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter email address...';}" /></p><p><input type="submit" name="subscribe" value="Subscribe" />&nbsp;<input type="submit" name="unsubscribe" value="Unsubscribe" /></p></form>
</div>
</div>
	<div id="navi_end_left"> </div>
</div>
<!-- end left sidebar -->

<!-- begin right sidebar -->
<!--<div id="right">
	<div class="links">
		<ul>
			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar') ) : else : ?>
			  
			
				<br/>

			
		
			<?php endif; ?>
			</ul>

		</div>
	<div id="navi_end_right"> </div>
</div> -->
<!-- end right sidebar -->