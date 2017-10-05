<?php
/*
Template Name: Glossary Template
*/
get_header();

$cat_name='glossary';
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
<div class="content_margin2">
<?php if (function_exists('wp_snap')) { echo wp_snap('cat=' . $cat); } ?>

<?php if (have_posts()) : ?>  
	<?php while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>
		<?php edit_post_link('Edit'); ?>
	<?php endwhile; ?>
<?php endif;?>
</div>



<?php get_footer();?>

