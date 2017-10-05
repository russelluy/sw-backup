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
							   <li class="menuLink"><a href="who-we-are"><img src="wp-content/themes/safewayhealth/images/TopTab2.gif" alt="Who we are" onMouseOver="this.src='wp-content/themes/safewayhealth/images/TopTab2_over.gif'" onMouseOut="this.src='wp-content/themes/safewayhealth/images/TopTab2.gif'" border="0"></a></li>
							    <li class="menuLink"><a href="what-we-do" class="hotspot"></a>
							   <img src="wp-content/themes/safewayhealth/images/TopTab3.gif" alt="What we do" onMouseOver="this.src='wp-content/themes/safewayhealth/images/TopTab3_over.gif'" onMouseOut="this.src='wp-content/themes/safewayhealth/images/TopTab3.gif'" border="0">
							   <ul>
									<li ><a class="hotspot_per" href="what-we-do">Driving Down Healthcare Cost</a></li>
									<li><a class="hotspot_per" href="rxte-program">RxTE Program</a></li>
								</ul>
							   </li> 
							   <li class="menuLink"><a href="our-results"><img src="wp-content/themes/safewayhealth/images/TopTab4.gif" onMouseOver="this.src='wp-content/themes/safewayhealth/images/TopTab4_over.gif'" onMouseOut="this.src='wp-content/themes/safewayhealth/images/TopTab4.gif'" alt="Our Results" border="0"></a></li> 
							   <li class="menuLink"><a href="our-model"><img src="wp-content/themes/safewayhealth/images/TopTab5.gif" onMouseOver="this.src='wp-content/themes/safewayhealth/images/TopTab5_over.gif'" onMouseOut="this.src='wp-content/themes/safewayhealth/images/TopTab5.gif'" alt="Our Model" border="0"></a></li> 
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
								                            <img src="wp-content/themes/safewayhealth/images/mainpics/mainpic1.jpg"  alt="Image" border="0" />           
								                    </div>	
								                    <div class="mainpics_rt">
								                            <img src="wp-content/themes/safewayhealth/images/messagetitle1.gif"  alt="Message" border="0" />
								                            <h2>At Safeway Health, we partner with you to help keep your employees healthier and happier while also saving your company money on healthcare costs.</h2>
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
																	                  	<div class="maincontent_b_default">
            <!-- BEGIN PAGE TITLE -->
             <div id="page-title">                
                  <div class="title"><!-- your title page -->
                  	 <h1><?php echo __('Page Not Found!','safewayhealth');?></h1>
                  </div>
	  		       </div>            
            <!-- END OF PAGE TITLE -->
            
            <!-- BEGIN CONTENT -->
            <div id="content-inner">            
               	<div id="content-left">
                 <div class="maincontent">
                  <?php
                    $_404_text = (get_option('Ag_404_text')) ? get_option('Ag_404_text') : __('Apologies, but the page you requested could not be found.','safewayhealth');
                  ?>
                  <h2><?php echo $_404_text;?></h2>
                  <h4><?php echo __('try different search?','safewayhealth');?></h4>         
                  <?php get_search_form();?>    
                  <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />            
                 </div>
               </div>                       
            </div>
            <!-- END OF CONTENT -->
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
