<?php global $gw_options; get_header();
$more = 0;

$query_string = "cat=".$negative_cats;
$query_string .= "&cat=".$gw_options['homepage']['homepage_categ_final']."&order=ASC";
query_posts($query_string);
$gw_options['homepage']['homepage_check'] = true;
?> 
    <!-- START homepage slideshow -->
    <div id="slideshow-wrapper">
        <ul id="home-slider">
        	<?php
				if (have_posts()) : while (have_posts()) : the_post();
				$slider_image = get_post_meta($post->ID, "slider-image", true);	
				$slider_url = get_post_meta($post->ID, "slider-url", true);					
            ?>
            
            <li>
            	<?php if ($slider_url) {
					if($slider_image != "") { ?>
						<a title="<?php the_title(); ?>" href="<?php echo $slider_url; ?>" class="slide-1-img">
							<?php echo '<img src="'.$slider_image.'" alt="" />'; ?>
						</a>
					<?php } 
					else { ?>
						<a href="#"><img src="<?php echo bloginfo('template_url'); ?>/img/slide_imgd.jpg" width="641" height="281" alt="" class="slide-1-img" /></a>
					<?php } ?>
	
					<div class="slide-1-desc">
						<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
                        <div class="slc-wrapper">
							<?php the_content('', TRUE, ''); ?>
                        </div>
					</div>
                    
                <?php 					
				} else { 
					if($slider_image != "") { ?>
						<a title="<?php the_title(); ?>" href="<?php echo get_permalink() ?>" class="slide-1-img">
							<?php echo '<img src="'.$slider_image.'" alt="" />'; ?>
						</a>
					<?php } 
					else { ?>
						<a href="#"><img src="<?php echo bloginfo('template_url'); ?>/img/slide_imgd.jpg" width="641" height="281" alt="" class="slide-1-img" /></a>
					<?php } ?>
	
					<div class="slide-1-desc">
						<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
						<?php the_content('read more');?>
					</div>
                
                <?php } ?>
                
        	</li>

			<?php endwhile; else: ?>
        
            <li>
                <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/img/slide_imgd.jpg" width="641" height="281" alt="" class="slide-1-img" /></a>
                <div class="slide-1-desc">
                	<h1>Let them know.<br />We make a difference.</h1>
                    <p>
                    	Enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    </p>
                    <p>
						Quisque volutpat condimerum velit. Eos no sale dolore vituperatoribus, eam id exerci sanctus albucius. No est corpora delectus delicata, integre facilis deseruisse an per, natum commodo viderer nec ea.                    
                    </p>
                    <div class="slideshow-rm"><a href="#">learn more</a></div>
                </div>
            </li>
        <!--do not delete-->
        <?php endif; ?>              
        </ul>
		<div id="nav"></div>

	</div>
    <!-- END homepage slideshow -->
    
    <div id="left">
    	<?php if ($gw_options['homepage']['wa_option'] == 2) {} else
			{ ?>
            
            <div class="welcome-content">
            <div class="clearfix">
                <h2><?php if ($gw_options['homepage']['home_welcome_tagline']){ echo $gw_options['homepage']['home_welcome_title']; } else { echo "Welcome to our company";} ?></h2>
                <p class="header-desc"><?php if ($gw_options['homepage']['home_welcome_tagline']){ echo $gw_options['homepage']['home_welcome_tagline']; } else {
                    echo "We bring value, innovation and growth to your business";
                } ?></p>
            </div>
            <?php  if ($gw_options['homepage']['home_welcome_text']){ echo $gw_options['homepage']['home_welcome_text']; } else {
                echo "<p>Ut dico exerci cum. Ipsum movet dolore sit ea, pri ea dicant mediocrem aliquando. Stet maiestatis ut pri, et vim melius legimus alienum. Nam nibh ipsum ad, pri dictas ornatus consequat te. Vel quem vidit posidonium in, brute dicunt maiorum vis te, mei veniam sanctus imperdiet ad.</p> 
        
    <p>Ad officiis percipitur theophrastus quo, ubique impedit ancillae per eu, pri natum tritani copiosae in. Civibus molestie deseruisse mea an, sumo omittam adolescens has te. Atqui luptatum pro ei, his eu regione sensibus necessitatibus. Ne feugait consetetur temporibus nec, inani audiam interpretaris cu vis, qui aeque ril dissentiunt ea. Ut lorem choro aliquid vix, dolor partem bonorum duo in. Enim cetero luptatum usu ne, soluta invidunt signiferumque id ius, eos eius idque audiam eu.</p>";
            
            } ?>   
            </div>
            <?php } ?>
        
        <?php if ($gw_options['homepage']['tb_option'] == 2) {} else
			{ ?>
		<div class="h-box-1"><!-- services overview box-->
        	<img src="<?php echo bloginfo('template_url'); ?>/img/services_icon.png" alt="" class="h-box-img" />
            <div class="h-box-title">
                <h3><?php if ($gw_options['homepage']['left_box_title']){ echo $gw_options['homepage']['left_box_title']; } else { echo "Services Overview";} ?></h3>
                <p class="header-desc">
				<?php if ($gw_options['homepage']['left_box_tagline']){ echo $gw_options['homepage']['left_box_tagline']; } else { echo "Our services at a glance"; }?></p>
            </div>
            <div class="h-box-wrap">
            	<?php 
				if ($gw_options['homepage']['left_box_text']){
					echo $gw_options['homepage']['left_box_text']; 
                } 
                else {
					echo "<p>Phasellus ipsum nulla, dignissim condimentum mattis sit amet, feugiat a nulla.</p> 
						<ul class='h-services-list'>
							<li><a href='#'>Corporate Publishing</a></li>
							<li><a href='#'>Interactive and Onscreen Production</a></li>
							<li><a href='#'>Advertising</a></li>
							<li><a href='#'>Event Management</a></li>
							<li><a href='#'>Integrated Communications</a></li>                                
							<li><a href='#'>Public Relations</a></li>
						</ul>";				
				}
                ?>
            </div>
        </div>
        
		<div class="h-box-2"><!-- featured case study overview -->
            <img src="<?php echo bloginfo('template_url'); ?>/img/case_study_icon.png" alt="" class="h-box-img" />
            
            <div class="h-box-title">
                <h3><?php if ($gw_options['homepage']['right_box_title']){ echo $gw_options['homepage']['right_box_title'];} else { echo "Featured case study";} ?></h3>
                <p class="header-desc">
				<?php if ($gw_options['homepage']['right_box_tagline']){ echo $gw_options['homepage']['right_box_tagline'];} else { echo "Investments and advertising campaigns";} ?></p>
            </div>
            <div class="h-box-wrap">
            	<?php
				if ($gw_options['homepage']['right_box_text']){
					echo $gw_options['homepage']['right_box_text'];
				} 
				else {            
				 	echo "<p>Phasellus ipsum nulla, dignissim condimentum mattis sit amet, feugiat a nulla. Nulla molestie pellentesque lorem, eu lacinia sem pellentesque ut. Aenean tempor ligula ut massa feugiat quis lacinia sem sollicitudin.</p> 
	
<p>Fusce mattis blandit libero a imperdiet. Sed lorem quam, imperdiet eu congue eget, pretium eget justo.</p>
<p>Est eu eloquentiam theophrastus suscipiantur, est malis ubique ad. Habeo latine abhorreant est an, sit integre expetenda intellegebat eu.</p>";
				 }?>
			</div>
        </div>
        <?php } ?>
                
    </div>
    <div id="right">
        <?php get_sidebar(); ?>
    </div>
    
<?php get_footer(); ?>