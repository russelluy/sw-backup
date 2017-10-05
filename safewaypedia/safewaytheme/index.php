	<?php get_header(); ?>
	
<div class="content_margin">
<?php if (function_exists('wp_snap')) { echo wp_snap('cat=' . $cat); } ?>
</br>
<?php if (have_posts()) : ?>  
	<?php /*echo '<table style="height: 1152px;" width="900" border="1" cellspacing="0" cellpadding="5">';*/ 
        $count = 0;
        ?>
	<?php echo '<div class="divTable"><table border=0 width="100%">'; ?>
	<?php while (have_posts()) : the_post(); ?>
		<?php 
                $count++;
		echo '<tr'.($count % 2 != 0?' bgcolor="#E0E0E0"':'').'>';
		echo '<td valign="top">';
//		echo '<div class="divRow">';
		echo '<a href = "#" class="postpopup" rel="'.  site_url().'/index.php/ajax/?id='.$post->ID.'">'; 
		echo '<div class="acro_name">';
		the_title(); 
                echo '</div>';
		echo '</a>';
		echo '</td><td>';
		
		//echo '</td>';
		//echo '<div class="fee-group">';
		the_content(); 
//		echo '</div><br /><br />';
		//echo '<div class="fee-buttons"></div>';
		//echo '</div>';
//		echo '<td>';
//		echo '</a>';

		//edit_post_link('Edit'); 
		echo '</td>';
		echo '</tr>';
		?>
	<?php endwhile; ?>
	<?php echo '</table></div>'; ?>
	<?php /*echo '</table>';*/ ?>
<?php endif;?>
</div>



<?php get_footer();?>