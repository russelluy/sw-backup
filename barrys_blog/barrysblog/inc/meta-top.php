<?php
	$categories = get_the_category();
	$separator = ' ';
	$output = '';
	if($categories){
		
		$output .= '<li><i class="icon-folder"></i> ';
		foreach($categories as $category) {
			$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' .__('View all posts in', 'barry'). ' '. esc_attr( $category->name).'">'.$category->cat_name.'</a>'.$separator;
		}
		$output .= '</li>';
	}
?>
<ul>
	<li><i class="icon-clock"></i> <time class="entry-date" datetime="<?php echo get_the_date( 'c' ); ?>"><?php echo get_the_date(); ?></time></li>
	<?php echo trim($output, $separator); ?>
	<?php if(has_tag()){ the_tags('<li><i class="icon-tag"></i> ',', ','</li>'); } ?>
	<li><i class="icon-comment"></i> <?php comments_number(); ?></li>
</ul>
