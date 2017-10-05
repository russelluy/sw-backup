<?php
/*
Template Name: Acronym Template
*/
get_header();

wp_enqueue_style('acronymcss', '/wp-content/themes/safewaytheme/sfypedia/acronym.css');
//
//wp_enqueue_script('simplemodal', '/wp-content/themes/safewaytheme/sfypedia/jquery.simplemodal-1.4.3.js');
//wp_enqueue_script('acro_script', '/wp-content/themes/safewaytheme/sfypedia/acronym_popup.js');
//
////wp_enqueue_script('jqueryForm', '/wp-content/themes/safewaytheme/sfypedia/jquery.form.js');
//wp_enqueue_script('updatePost1', '/wp-content/themes/safewaytheme/sfypedia/updatePost.js');


$cat_name='acronym';
$args=array(
			'type' => 'post',
			'orderby' => 'name',
			'order' => 'ASC',
			'hide_empty'  => 0
		);

		$cat = 0;
		$categories=get_categories($args);
		foreach($categories as $category){
			if(strcasecmp(trim($cat_name), $category->name) == 0){
				$cat = $category->cat_ID;
				break;
			}
		}

?>

<!--</div>
</div>-->
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

