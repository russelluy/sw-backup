<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"  />
<title><?php if (is_home () ) { bloginfo('name'); echo " - "; bloginfo('description'); 
} elseif (is_category() ) {single_cat_title(); echo " - "; bloginfo('name');
} elseif (is_single() || is_page() ) {single_post_title(); echo " - "; bloginfo('name');
} elseif (is_search() ) {bloginfo('name'); echo " search results: "; echo wp_specialchars($s);
} else { wp_title('',true); }?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta name="robots" content="follow, all" />
<?php wp_head(); ?>

<link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if IE]>
        <link href="<?php bloginfo('template_directory');?>/css/all-ie.css" rel="stylesheet" type="text/css" />
    <![endif]-->
<!--[if IE 7]>
		<link href="<?php bloginfo('template_directory');?>/css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>    
	<link href="<?php bloginfo('template_directory');?>/css/ie6.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/DD_belatedPNG.js"></script>
	<script type="text/javascript"> 
	   DD_belatedPNG.fix('.page-container-inner');
     DD_belatedPNG.fix('#slideshow-navigation a');
     DD_belatedPNG.fix('#slideshow-navigation .activeSlide');
	   DD_belatedPNG.fix('img');	       
	</script>	
<![endif]-->

    
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
</head>
<body>
<div style="display: none;position:absolute;z-index: 1000;width:100%;" id="pullermessager">
						<div class="wrapgroup1" >
							<div class="black">
								<div class="black_ra">
									<div class="black_ra_lft">
										R E S O U R C E S
									</div>
									<a href="#" id="pusherbr">
										<div class="black_ra_rt_a" style="text-decoration:none;">
											<div class="black_ra_rt_aa">
												C L O S E
											</div>
											<div class="black_ra_rt_b">
												X
											</div>
										</div>
									</a>
								</div>
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Dropdown Resources')) {
						                      $services_page = get_option('Ag_services_pid');
						                      safewaytheme_serviceslist($services_page,"<h2>".__('','safewaytheme')."</h2>");
						                    } ?>								
							</div>
							<div class="pulltail">
								<div class="pulltab">
									<a href="#"><img src="wp-content/themes/safewaytheme/images/pulltab.png" id="pusherr"  alt="Close" /></a>
								</div>
							</div>
							<div class="clear"></div>
						</div>
				</div>
				</div>
				<div style="display: none;position:absolute;z-index: 1000;width:100%;" id="pullermessage">
						<div class="wrapgroup1" >
							<div class="black">
								<div class="black_ra">
									<div class="black_ra_lft">
										D E P A R T M E N T S
									</div>
									<a href="#" id="pusherb">
										<div class="black_ra_rt_a" style="text-decoration:none;">
											<div class="black_ra_rt_aa">
												C L O S E
											</div>
											<div class="black_ra_rt_b">
												X
											</div>
										</div>
									</a>
								</div>
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Dropdown Departments')) {
						                    } ?>
							</div>
							<div class="pulltail">
								<div class="pulltab">
									<a href="#"><img src="wp-content/themes/safewaytheme/images/pulltab.png" id="pusher"  alt="Close" /></a>
								</div>
							</div>
							<div class="clear"></div>
						</div>
				</div>
				</div>
				<div style="display: none;position:absolute;z-index: 1000;width:100%;" id="pullermessageh">
						<div class="wrapgroup1" >
							<div class="black">
								<div class="black_ra">
									<div class="black_ra_lft">
										H E L P
									</div>
									<a href="#" id="pusherbh">
										<div class="black_ra_rt_a" style="text-decoration:none;">
											<div class="black_ra_rt_aa">
												C L O S E
											</div>
											<div class="black_ra_rt_b">
												X
											</div>
										</div>
									</a>
								</div>
								<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Dropdown Help')) {
						                    } ?>								
							</div>
							<div class="pulltail">
								<div class="pulltab">
									<a href="#"><img src="wp-content/themes/safewaytheme/images/pulltab.png" id="pusherh"  alt="Close" /></a>
								</div>
							</div>
							<div class="clear"></div>
						</div>
				</div>
				</div>
	<div id="page-container">
    	<div class="page-container-inner">
            <div class="frame">
            <!-- BEGIN HEADER -->
            <div id="header">
            	<div id="top-header">
            		<div class="top-header_lft">
	                	<div class="logo">
	                				<a href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_directory');?>/images/safeway-logo250.jpg" alt="<?php bloginfo('blogname');?>" /></a>
	                  </div>
	                    <div class="top-header_lft_bot">
	                    	<div class="top-header_lft_bot_lft">
	                    		<span id="greetingContainer" nowrap="nowrap">Welcome to Notices</span>
	                    	</div>
	                    	<div class="top-header_lft_bot_mid">
	                    		<span id="greetingContainer" nowrap="nowrap">
	                    			<script language="JavaScript">var now=new Date();var days=new Array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');var months=new Array('January','February','March','April','May','June','July','August','September','October','November','December');var date=((now.getDate()<10)?"0":"")+now.getDate();function fourdigits(number){return(number<1000)?number+1900:number}today=months[now.getMonth()]+" "+date+", "+(fourdigits(now.getYear()));document.write(today);</script>
	                    		</span>
	                    	</div>
	                    	<div class="top-header_lft_bot_rt">
	                    		<a href="http://home.safeway.com/corpcom/special_projects/mission/vision.html" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/VMTab.jpg" alt="Vision Mission" onMouseOver="this.src='<?php bloginfo('template_directory');?>/images/VMTab_over.jpg'" onMouseOut="this.src='<?php bloginfo('template_directory');?>/images/VMTab.jpg'" border="0"></a>
	                    	</div>
	                    	<div class="top-header_lft_bot_rt_rt">
	                    	</div>
	                    </div>
                    </div>
                    <div class="top-header_rt">
                    	<div class="top-header_rt_nav">
                    		<ul id="nav">                     		
							   <li class="menuLink"><a href="http://retail01.safeway.com/"><img src="<?php bloginfo('template_directory');?>/images/TopTab1.gif" onMouseOver="this.src='<?php bloginfo('template_directory');?>/images/TopTab1_over.gif'" onMouseOut="this.src='<?php bloginfo('template_directory');?>/images/TopTab1.gif'" alt="Retail Site" border="0"></a></li> 
							   <li class="menuLink"><a href="#"><img src="<?php bloginfo('template_directory');?>/images/TopTab2.gif"id="pullerr" alt="Resources" onMouseOver="this.src='<?php bloginfo('template_directory');?>/images/TopTab2_over.gif'" onMouseOut="this.src='<?php bloginfo('template_directory');?>/images/TopTab2.gif'" border="0"></a></li> 
							   <li class="menuLink"><a href="#"><img src="<?php bloginfo('template_directory');?>/images/TopTab3.gif" id="puller"  alt="Departments" onMouseOver="this.src='<?php bloginfo('template_directory');?>/images/TopTab3_over.gif'" onMouseOut="this.src='<?php bloginfo('template_directory');?>/images/TopTab3.gif'" border="0"></a></li> 
							   <li class="menuLink"><a href="#"><img src="<?php bloginfo('template_directory');?>/images/TopTab4.gif" id="pullerh"  alt="Help" onMouseOver="this.src='<?php bloginfo('template_directory');?>/images/TopTab4_over.gif'" onMouseOut="this.src='<?php bloginfo('template_directory');?>/images/TopTab4.gif'" border="0"></a></li> 
							   <li class="menuLink"><a href="https://mail.safeway.com/" target="_blank"><img src="<?php bloginfo('template_directory');?>/images/TopTab5.gif" onMouseOver="this.src='<?php bloginfo('template_directory');?>/images/TopTab5_over.gif'" onMouseOut="this.src='<?php bloginfo('template_directory');?>/images/TopTab5.gif'" alt="Outlook Email" border="0"></a></li> 
							 	<li class="menuLink"><a href="http://backstagegateway.safeway.com/portal/site/backstageportal/template.LOGOUT/action.process/"><img src="<?php bloginfo('template_directory');?>/images/TopTab6.gif" onMouseOver="this.src='<?php bloginfo('template_directory');?>/images/TopTab6_over.gif'" onMouseOut="this.src='<?php bloginfo('template_directory');?>/images/TopTab6.gif'" alt="Logout" border="0"></a></li>
							 </ul>               		
                    		<div class="clear"></div>
                    	</div>
	                    <div class="top-header_rt_s">
	                    	<div id="search-box">
	                    		<div class="search-box_lft">
	                    		</div>
		                    		<div class="search-box_mid">
				                        <form method="get" id="search" action="<?php bloginfo('url'); ?>/" >
				                          <p><input type="text" name="s" id="s" value="<?php echo __('Search','safewaytheme');?>" onblur="if (this.value == ''){this.value = '<?php echo __('Search','safewaytheme');?>'; }" onfocus="if (this.value == '<?php echo __('Search','safewaytheme');?>') {this.value = ''; }"  />&nbsp;
				                          <input type="submit" class="go" value="" />
				                          </p>                	
				                        </form>
			                    	</div><!-- end of search-box -->  
			                    <div class="search-box_rt">
	                    		</div>	
	                    	</div>
	                    </div>
						
                    </div>
                </div>
                 <div class="bottom-header-bg">
	                <div id="bottom-header">
	                	<div id="nav-menu">
	                    <?php
	                      if (function_exists('wp_nav_menu')) { 
	                        wp_nav_menu( array('container_id'=>'','menu_id'=>'', 'menu_class' => 'sf-menu', 'theme_location' => 'topnav','fallback_cb'=>'safewaytheme_topmenu_pages','sort_column' => 'menu_order', 'depth' =>3 ) );
	                      } else {  
	                        safewaytheme_topmenu_pages();
	                      } ?>                     
	                    </div>
	                     
	                    <div class="zlide">
                        		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Slideshow')) {
						                    } ?>	
                 		</div>
                 		
                 		</div>     
	                </div>
	                </div>
		        </div>    
            <div class="contentbodywrap">	
            <!-- BEGIN CONTENT -->
            <?php if (is_home()) echo '<div id="content">';
            
            