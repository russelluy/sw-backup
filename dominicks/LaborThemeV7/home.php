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
	header('Location: /wp-login.php?redirect_to=/?dominicks=true&reauth=1');
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
		header('Location: /wp-login.php?redirect_to=/?dominicks=true&reauth=1');
//		die();
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dominicks Employee Information</title>
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
  <div id="logospace"> <a href="/dominicks/"><img src="<?php bloginfo('template_directory'); ?>/images/logo_line_new.gif" border="0" /></a> </div>
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
  <?php if ( is_home() ) : ?>
  <?php if (have_posts()) : ?>
  
  <!-- DIVISION PRES POST -->
  <?php query_posts('category_name=welcome-message'); ?>

  <div class="heading_text">
    <p>On October 11, Safeway made an important announcement regarding its decision to exit the Chicago market. At this early stage, we are limited in what we can report, but we have sold a small group of stores and are working to identify buyers for the remainder of our Dominick’s operation. The company anticipates having plans in place for the other stores by early 2014.<br />
      <br />
    We have created this website to provide employees with updates and a place where they can ask questions about the impact of the Dominick’s decision. We encourage you to check this website for new updates.
    </p><p>Here are answers to some of the initial questions:</p>
<strong>Q: Why has Safeway decided to exit the Chicago market?</strong><br />
A: After sustained efforts to strengthen Dominick’s position in the Chicago market, the division made some progress, but it was not enough to justify further investment in the market.<p>

<strong>Q: When will you announce the buyers of the stores?</strong><br />
A: We’ve sold a small group of stores, and we are working to identify buyers for the other stores. The company anticipates having plans in place for the remaining stores by early 2014.<p>

<strong>Q: What will happen to Dominick’s employees?</strong><br />
A: We will be doing what we can to ease the transition for employees. We are asking prospective purchasers of our stores to consider our people for employment. <p>

<strong>Q: Will the company be selling its operations to unionized companies?</strong><br />
A: The initial small group of stores is going to a union operator. We’ve not yet   determined what will occur with the remaining stores.<p></p><br clear="all"><br clear="all">
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
