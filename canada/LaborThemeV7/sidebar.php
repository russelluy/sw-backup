<!-- begin left sidebar -->
<div id="left">
	<div id="navigation">
		<ul>
			<li class="page_item"><a href="/canada/">Home</a></li>
			<?php wp_list_pages('sort_column=menu_order&title_li='); ?>
			<li class="page_item"><a href="/canada/logout.php">Logout</a></li>
		</ul><br/><br/><br/>
		
		<ul></ul>
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