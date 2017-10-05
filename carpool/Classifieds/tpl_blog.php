<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>
<div id="page">
 <div id="content-wrap" class="clear" >
 <div class="breadcrumb clearfix">
      	<?php if ( get_option( 'ptthemes_breadcrumbs' )) { yoast_breadcrumb('',''); } ?>
     </div> <!-- breadcrumbs #end -->

<div id="content">

<h1>Classifieds</h1>

   
    <?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=$pt_exclude_news&showposts=10&paged=$page"); while ( have_posts() ) : the_post()  ?>
    <?php $mimg = get_post_meta($post->ID, 'mimg', $single = true);	?>
     <?php $mimg = get_post_meta($post->ID, 'mimg', $single = true);	?>
     
    <div id="post-<?php the_ID(); ?>" class="listings" >
      <?php if($mimg !== '') { ?>
          <?php
			$img_size = bdw_get_images_with_info($post->ID,'listing-thumb');
			$post_images = $img_size[0]['file'];
		  ?>

      <a  href="<?php the_permalink() ?>"> <img src="<?php echo $post_images;?>" alt="<?php the_title(); ?>" class="imgleft" /> </a>
      <?php } // end if statement
				// if there's not a thumbnail
				else { echo '<div class="imgnot_available" >No Image Available</div>'; } ?>  </a>
                
      <h2> <a href="<?php the_permalink(); ?>"> <strong>  <?php the_title(); ?>  </strong></a></h2>
      <p class="time"><span class="i_clock alignleft"> <?php the_time('j F, Y') ?> at <?php the_time('g:i a') ?> </span> 
      <span class="i_comments alignleft"> <?php comments_popup_link('(0) Comment', '(1) Comment', '(%) Comment'); ?> </span> 
      <strong class="alignright red"> <?php if(function_exists('the_views')) { the_views(); } ?> </strong></p>
      
    </div>
    <?php endwhile; ?>
   
	<div class="googleads">
     	 <?php echo "$pt_googleads"; ?>
     </div>
     
    
    <?php if(function_exists('wp_pagenavi')) { ?>
  <div class="wp-pagenavi">
    <?php wp_pagenavi();  ?>
  </div>
 <? } ?>
    <!--page nav end -->
     
</div><!--content end -->

<?php get_sidebar(); ?> <!-- sidebar #end -->
<?php get_footer(); ?> <!-- footer #end -->
<?php get_footer(); ?>