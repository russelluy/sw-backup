<?php 
function decrypt($key, $string) {
   $output = false;
   $iv = md5(md5($key));
   $output = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, $iv);
   $output = rtrim($output, "");
   return utf8_encode($output);
}

//echo 'Cookie: '.$_COOKIE['csafny'].'<br />';
if(empty($_COOKIE['csafny'])){
//	echo 'Problem';
	header('Location: /wp-login.php?redirect_to=/?canada=true&reauth=1');
//	die;
}
else{
//	echo $_COOKIE['csafny'].'<br />';
	//$output = decrypt(wp_salt(), $_COOKIE['csafny']);
	$output = decrypt('testkey', $_COOKIE['csafny']);
	//$output = $_COOKIE['csafny'];
	$output = trim($output);	
	//echo var_export($output, true).'<br />';
	$val = explode('_',$output);
	if(count($val) == 2 && time() <= (intval($val[1])+60*30)){
	//	echo 'All good';
	}
	else{
//		echo 'cookie expired';
		header('Location: /wp-login.php?redirect_to=/?canada=true&reauth=1');
//		die();
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Canada Safeway Transaction</title>
</head>

<body>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php bloginfo('name'); ?>
<?php wp_title(); ?>
</title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<?php wp_head(); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2369272-9']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<!--<a NAME="top">-->
<!--<div id="page">-->
<div id="home_content2">
<div id="home_content">
<div id="header">
  <div id="logospace"> <a href="/canada/"><img src="<?php bloginfo('template_directory'); ?>/images/logo_line_new.gif" border="0" /></a> </div>
  <!--<p class="easterntitle">Safeway Norcal Division Labor Negotiations</p>-->
  <!--<div id="searchspace">
    <?php include (TEMPLATEPATH . '/searchform.php'); ?>
  </div>-->
  <div id="canadaflag"></div>
  <div class="clear"></div>
</div>
<!--Header Ends-->
  <?php get_sidebar(); ?>
  <!-- HEAD ANIMATION HERE -->
  <div id="content">
  <div id="centercontents_rt2"> 
    <!--<img src="<?php bloginfo('template_directory'); ?>/images/home_animation.png" width="736" height="310" align="center"/>--> 
    <img src="/canada/wp-content/uploads/2012/04/home3.jpg" width="700" height="247" align="center"/>
    <div class="clear"></div>
  </div>
  <?php if ( is_home() ) : ?>
  <?php if (have_posts()) : ?>
  
  <!-- DIVISION PRES POST -->
  <?php query_posts('category_name=welcome-message'); ?>

  <div class="heading_text">
    <p>On June 12, 2013, Safeway Inc. announced that it has entered into an agreement to sell the net assets of Canada Safeway Limited to Sobeys Inc., a wholly-owned subsidiary of Empire Company Limited.  This acquisition is subject to customary closing conditions, including approval of the Competition Bureau.<br />
      <br />
     We have created this website in order to provide our Safeway employees with updates on the status of the acquisition. We encourage you to check this website for new updates.</p>
  </div>
  <div class="clear"></div>
  
  <!-- END -->
  
  <?php while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
    <div class="entry">
      <?php the_content('Read the rest of this entry &raquo;'); ?>
    </div>
  </div>
  <?php endwhile; ?>
  
  <!-- OTHER POSTS -->
  <?php query_posts('cat=4,5&showposts=10'); ?>
  <!--<div class="heading">
					  <h1>Latest Updates</h1>
					</div>-->
  <?php while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
      <?php the_title(); ?>
      </a></h2>
    <small>Posted:
    <?php the_time('l, F j, Y') ?>
    </small>
    <div class="entry">
      <?php the_excerpt('Read the rest of this entry &raquo;'); ?>
      <br/>
    </div>
  </div>
  <?php endwhile; ?>
  <?php else : ?>
  <h2 class="center">Not Found</h2>
  <p class="center">Sorry, but you are looking for something that isn't here.</p>
  <?php include (TEMPLATEPATH . "/searchform.php"); ?>
  <?php endif; ?>
  <?php else : ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
    <div class="entry">
      <?php the_content('Read the rest of this entry &raquo;'); ?>
    </div>
  </div>
  <?php endwhile; endif; ?>
  <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
  <?php endif; ?>
  </div>
  <!--<div><a href="#top"><img style="float: right;" title="topfooter" src="http://safewaynegotiations.ca/wp-content/uploads/2008/06/topfooter.gif" border="0" alt="" width="25" height="25" /></a></div>--> 
</div>

</div>
<?php get_footer(); ?>
</body>
</html>