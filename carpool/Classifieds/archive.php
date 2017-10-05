<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>
<div id="page">
 <div id="content-wrap" class="clear" >
<div id="content">
  <div class="newlisting"> 
      <h1>
        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
        <?php /* If this is a category archive */ if (is_category()) { ?>
        <?php echo single_cat_title(); ?>
        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        Archive for
        <?php the_time('F jS, Y'); ?>
        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        Archive for
        <?php the_time('F, Y'); ?>
        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        Archive for
        <?php the_time('Y'); ?>
        <?php /* If this is a search */ } elseif (is_search()) { ?>
        Search Results
        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
        Author Archive
        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
          Blog Archives
          <!--do not delete-->
          <?php }elseif( is_tag() ) { ?>
		Tagged &#8216;<?php single_tag_title(); ?>&#8217; 
        <?php }?>
      </h1>

    <p><?php $description=category_description(); echo $description;?></p>
<?php
if (have_posts())
	{
  while ( have_posts() ) : the_post()  ?>
    <?php
    $post_images = get_post_meta($post->ID, 'post_images', $single = true);
	$post_images_arr = explode(',',$post_images);
	//$mimg = $post_images_arr[0];
	$mimg = $post_images_arr[0];
	$image_path1 = WP_CONTENT_DIR.str_replace(get_option( 'siteurl' ).'/wp-content','',$mimg);
		if(!file_exists($image_path1) && get_option('upload_path'))
		{
			$src = str_replace("/files/", str_replace('wp-content','',get_option('upload_path'))."/", str_replace(get_option( 'siteurl' ),'',$mimg));
			$image_path1 = WP_CONTENT_DIR.$src ;	
		}
	if(file_exists($image_path1))
	{
		$mimg = $mimg;
	}else
	{
		$mimg = '';
	}
	?>
    
    <div id="post-<?php the_ID(); ?>" class="listings" >
      <?php if($mimg !== '') { ?>
      <a  href="<?php the_permalink() ?>"> <img src="<?php echo $mimg;?>" alt="<?php the_title(); ?>" class="imgleft" /> </a>
      <?php } // end if statement
				// if there's not a thumbnail
				else { echo '<div class="imgnot_available" >No Image Available</div>'; } ?>  </a>

                
      <h2> <a href="<?php the_permalink(); ?>"> <strong>  <?php the_title(); ?>  </strong></a></h2>
      <p class="time"><span class="i_clock alignleft"> <?php the_time('j F, Y') ?> at <?php the_time('g:i a') ?> </span> 
      <span class="i_comments alignleft"> <?php comments_popup_link('(0) Comment', '(1) Comment', '(%) Comment'); ?> </span> 
      <strong class="alignright red"> <?php if(function_exists('the_views')) { the_views(); } ?> </strong></p>
      
       
      
    </div>
    <?php endwhile; ?>
    <?php }else
    {
    ?>
     <h3><?php _e(NO_POSTS_MATCH_MSG);?></h3>
  <div class="category">
    <h2>
      <?php _e('Category'); ?>
    </h2>
    <ul>
      <?php wp_list_categories('orderby=name&title_li'); ?>
    </ul>
  </div>
  <div class="archives">
    <h2 class="sidebartitle">
      <?php _e(ARCHIVES_TEXT); ?>
    </h2>
    <ul>
      <?php wp_get_archives('type=monthly'); ?>
    </ul>
  </div>
    <?php
    }?>
     <div class="googleads">
     	  <?php if ( function_exists('dynamic_sidebar') && (is_sidebar_active(7)) ) { // Show on the front page ?>
				<?php dynamic_sidebar(7); ?>  
         <?php } ?>
     </div>
    
     <?php if(function_exists('wp_pagenavi')) { ?>
  <div class="wp-pagenavi">
    <?php wp_pagenavi();  ?>
  </div>
 <?php } ?>
    <!--page nav end -->
   
</div>  
</div>


<?php get_footer(); ?> <!-- footer #end -->