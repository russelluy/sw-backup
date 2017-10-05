<?php 
/*
Template Name: Services
*/
global $more, $gw_options;
get_header();

$more = 1;
$query_string = "cat=".$negative_cats;
$query_string .= "&cat=".$gw_options['services']['services_categ_final'];
query_posts($query_string);

?>  
    <div id="left">
		<div class="interior-header">
        	<h2>
			<?php         
            if($gw_options['services']['services_paragraph_title']) {
                echo $gw_options['services']['services_paragraph_title'];  
            }
            else {
				the_title();
            }	
            ?>            
            </h2>
            <p class="intheader-paragraph">
			<?php         
            if($gw_options['services']['services_paragraph']) {
                echo $gw_options['services']['services_paragraph'];  
            }
            else {
                echo 'Ever wondered what can we do for you? We offer a variety of high quality services to help you acomplish your objectives.';
            }	
            ?>
            </p>
        </div>    
        <div class="interior-content">
	        <ul class="services-wrapper">
			<?php
             	if (have_posts()) : while (have_posts()) : the_post();
				$service_icon = get_post_meta($post->ID, "service-icon", true);	
			?>
            	<li class="column">
               	<?php
               	if($service_icon != "") {
                	echo '<img src="'.$service_icon.'" alt="" />';
				}?>
                    <div class="service-txt">               
            	        <h4 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h4>
						<?php the_content('read more');?>
	              	</div>
                </li>
            
            <?php endwhile;?></ul> <?php else: ?>
                <li>
                    <h2>Nothing Found</h2>
                    <p>Sorry, no posts matched your criteria.</p>
                </li>
            </ul>
			<!--do not delete-->
			<?php endif;
				if ($gw_options['services']['services_adinfo']){ echo $gw_options['services']['services_adinfo']; } else {
							echo "<h4>Additional information</h4><p>Ut dico exerci cum. Ipsum movet dolore sit ea, pri ea dicant mediocrem aliquando. Stet maiestatis ut pri, et vim melius legimus alienum. Nam nibh ipsum ad, pri dictas ornatus consequat te. Vel quem vidit posidonium in, brute dicunt maiorum vis te, mei veniam sanctus imperdiet ad.</p> 
					
				<p>Ad officiis percipitur theophrastus quo, ubique impedit ancillae per eu, pri natum tritani copiosae in. Civibus molestie deseruisse mea an, sumo omittam adolescens has te. Atqui luptatum pro ei, his eu regione sensibus necessitatibus. Ne feugait consetetur temporibus nec, inani audiam interpretaris cu vis, qui aeque ril dissentiunt ea. Ut lorem choro aliquid vix, dolor partem bonorum duo in. Enim cetero luptatum usu ne, soluta invidunt signiferumque id ius, eos eius idque audiam eu.</p>";
  
		} ?>   
        
                    
		</div>
        
    </div>
    <div id="right">
		<?php get_sidebar(); ?>
	</div>

<?php get_footer(); ?>
