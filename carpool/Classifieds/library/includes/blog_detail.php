<div id="page">
 <div id="content-wrap" class="clear" >
 
<div id="content" class="content-in" >
<div class="page_spacer">

<?php
//if (have_posts()) : while (have_posts()) : the_post();
$post_images = get_post_meta($post->ID, 'post_images', $single = true);
$owner_name = get_post_meta($post->ID, 'owner_name', $single = true);
$owner_email = get_post_meta($post->ID, 'owner_email', $single = true);
$owner_phone = get_post_meta($post->ID, 'owner_phone', $single = true);
$post_location = get_post_meta($post->ID, 'post_location', $single = true);
$post_url = get_post_meta($post->ID, 'post_url', $single = true);
$post_images_arr = explode(',',$post_images);
$mimg = $post_images_arr[0];
$tagsarr = get_the_tags($post->ID);
$tags = array();
if($tagsarr)
{
	foreach($tagsarr as $key=>$val)
	{
	$tags[] = $val->name;
	}
	$post_tags = implode(',',$tags);
}
?>
  <!--post title-->
  <div class="listings bnone">
    <h1  class="title" id="post-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
      <?php the_title(); ?>
      </a></h1>
       <p class="time"><span class="i_clock alignleft"> <?php the_time('j F, Y') ?> at <?php the_time('g:i a') ?> </span> 
       <strong class=" red"> <?php if(function_exists('the_views')) { the_views(); } ?> </strong> in <?php the_category(' / ') ?> </p>
      
      
       
         
        <?php if($mimg !== '') { ?>
    <?php } else { echo ''; } ?>
    <?php the_content('continue'); ?>
    
      
       
      </div><!--two section end -->
      
      
     <div class="post_bottom"> 
        <?php the_tags(' <span class="i_tags">'.__('','Templatic').'', ', ', '</span>'); ?> 
            <span class="i_print"><a href="#" onclick="window.print();return false;" >Print This Post</a></span>
        </div>
      
     
    
     
     <?php comments_template(); ?>
   
 
  </div>
    <!--single.php end-->
  </div>
  
  
<?php get_sidebar(); ?> <!-- sidebar #end -->

</div>

<?php get_footer(); ?>
  <?php exit(); ?>