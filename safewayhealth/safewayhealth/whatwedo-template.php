<?php
/*
Template Name: What we do Template
*/
?>

<?php get_header();?>
            <div class="new_pagewrap">
		<div class="new_pagewrap_wrap">
			<!-- BEGIN HEADER -->
            <div id="header">
            	<div id="top-header">
            		<div class="top-header_lft">
	                	<div class="logo">
	    							 <a href="index.php"><img src="wp-content/themes/safewayhealth/images/logo.jpg" alt="Safeway Health" border="0"></a>							
	                  </div>
	                	 
	                    <div class="clear"></div>
                    </div>
                    
                    <div class="top-header_rt">
                    	<div class="top-header_rt_nav">
                    		<ul id="nav"> 
							   <li class="menuLink"><a href="index.php"><img src="wp-content/themes/safewayhealth/images/TopTab1.gif" onMouseOver="this.src='wp-content/themes/safewayhealth/images/TopTab1_over.gif'" onMouseOut="this.src='wp-content/themes/safewayhealth/images/TopTab1.gif'" alt="Home" border="0"></a></li> 
							   <li class="menuLink"><a href="who-we-are"><img src="wp-content/themes/safewayhealth/images/TopTab2.gif" onMouseOver="this.src='wp-content/themes/safewayhealth/images/TopTab2_over.gif'" onMouseOut="this.src='wp-content/themes/safewayhealth/images/TopTab2.gif'" alt="Who We Are" border="0"></a></li> 
							   <li class="menuLink"><a href="what-we-do" class="hotspot"></a>
							   <img src="wp-content/themes/safewayhealth/images/TopTab3.gif" alt="What We Do" onMouseOver="this.src='wp-content/themes/safewayhealth/images/TopTab3_over.gif'" onMouseOut="this.src='wp-content/themes/safewayhealth/images/TopTab3.gif'" border="0">
							   <script type="text/javascript" language="javascript">
								//<![CDATA[
								$(window).load (function () { 
     								 $('#temphide').removeClass('hidden_div')
  								});;
								//]]>
								</script> 
							   

							   <ul id="temphide" class="hidden_div">
									<li ><a class="hotspot_per" href="what-we-do">What We Do</a></li>
									<li ><a class="hotspot_per" href="market-priced-drug-program">Market Priced Drug Program</a></li>
									<li><a class="hotspot_per" href="behavior-incentives">Behavior Incentives</a></li>									
									<li><a class="hotspot_per" href="integrating-health-and-fitness">Integrating Health and Fitness </a></li>
									<li ><a class="hotspot_per" href="engaging-beneficiaries">Engaging Beneficiaries</a></li>
								</ul>
							   </li> 
							   <li class="menuLink"><a href="our-model"><img src="wp-content/themes/safewayhealth/images/TopTab4.gif" onMouseOver="this.src='wp-content/themes/safewayhealth/images/TopTab4_over.gif'" onMouseOut="this.src='wp-content/themes/safewayhealth/images/TopTab4.gif'" alt="Creating Value" border="0"></a></li> 
							   <li class="menuLink"><a href="our-results"><img src="wp-content/themes/safewayhealth/images/TopTab5.gif" onMouseOver="this.src='wp-content/themes/safewayhealth/images/TopTab5_over.gif'" onMouseOut="this.src='wp-content/themes/safewayhealth/images/TopTab5.gif'" alt="Our Results" border="0"></a></li> 
								<!--<li class="menuLink"><a href="http://safewayhealthdv.safeway.com/"><img src="wp-content/themes/safewayhealth/images/TopTab6.gif" onMouseOver="this.src='wp-content/themes/safewayhealth/images/TopTab6_over.gif'" onMouseOut="this.src='wp-content/themes/safewayhealth/images/TopTab6.gif'" alt="Our Results" border="0"></a></li>--> 
							 </ul> 	                    		
                    		<div class="clear"></div>
                    	</div>
	                    
                    </div>
                </div>
	        </div>
	       </div>
	       <div class="clear"></div>
	      </div>
	    <div class="new_pagewrap_wrap_stretch">     
	    </div>
	    
	    <div class="new_menuwrap">
			<div class="new_menuwrap_wrap">
			
			
            <div class="bottom-header-bg">
							                <div id="bottom-header">
								                	<div class="mainpics">
								                            <img src="wp-content/themes/safewayhealth/images/mainpics/mainpic4.jpg" title="Driving Down Healthcare Costs" alt="Driving Down Healthcare Costs" border="0" />           
								                    </div>	
								                    <div class="mainpics_rt">
								                            <img src="wp-content/themes/safewayhealth/images/messagetitle11.gif"  alt="" border="0" />
								                            <h2>Our innovative strategy utilizes market forces to create incentives for healthy behaviors.</h2>
								                    </div>		                    
							                </div>
							                <div class="clear"></div>
					             	</div>
					             	<div class="bottom-header-bg2">
							                <div id="bottom-header2">
							                		<div class="greenbar2">         
								                    </div>	
								                	<div class="contentbody">
								                			<div class="contentbody_lft_default">
								                            		<div id="content1b2">
																	                  	<div class="maincontent_b_ourmodel">
																			                      <!-- BEGIN PAGE TITLE -->
																	             <div id="page-title">                
																	                  <div class="title"><!-- your title page -->
																	                  	 <h1><?php the_title();?></h1>
																	                  </div>
																	                  <?php $data = get_post_meta($post->ID, '_short_desc', true ); ?>
																	                  <?php if ($data) : ?>
																	                  <div class="desc"><!-- description about your page -->
																	                  <?php echo $data;?>
																	                  </div>
																	                  <?php endif;?>
																		  		       </div>            
																	            <!-- END OF PAGE TITLE -->
																	            
																	            <!-- BEGIN CONTENT -->
																	            <div id="content-inner-full_ourmodel">
																	              <?php if (have_posts()) { ?>
																	              <?php while (have_posts()) : the_post();?>
																	               <div class="maincontent">
																	                <?php the_content();?>
																	               </div>
																	               <?php endwhile;?>
																	                 <?php } ?> 
																	                                
																	            </div>
																	            <!-- END OF CONTENT -->      
								                            </div>	 
								                            <div class="contentbody_rt_ourmodel">
								                            		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('What We Do')) { ?>
            	     												<?php } ?>
								                            </div>	         
								                    </div>		                    
							                </div>
							                <div class="clear"></div>
					             	</div>
					             	
					            </div>
				           </div>
				          
			         </div>            
				         			 <div class="new_bodywrap">
											<div class="new_bodywrap_wrap">
												<div class="content_wrap">
									               	 
							                 	</div>
							                 </div>
						                 	 <div class="clear"></div>
					                 </div>
				                 	<div class="clear"></div>
		                </div>
	              </div>
           </div>
            
            <?php get_footer();?>