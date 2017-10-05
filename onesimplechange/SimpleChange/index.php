<?php


get_header(); 

 $count_mind = $wpdb->get_var("select count(*) from wp_frm_item_metas where meta_value like 'Mind%'");
$count_body = $wpdb->get_var("select count(*) from wp_frm_item_metas where meta_value like 'Body%'");
$count_spirit = $wpdb->get_var("select count(*) from wp_frm_item_metas where meta_value like 'Spirit%'");

?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/excanvas.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jqplot.barRenderer.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jqplot.pointLabels.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jqplot.categoryAxisRenderer.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
/*	var line1 = [['<div style="text-align: center; font-size: 14px; font-weight: bold; height: 100px;">Mind</div>', <?php echo $count_mind;?>],
		   ['<div style="text-align: center; font-size: 14px; font-weight: bold; height: 100px;">Body</div>', <?php echo $count_body;?>],
		   ['<div style="text-align: center; font-size: 14px; font-weight: bold; height: 100px;">Spirit</div>', <?php echo $count_spirit;?>]]; 

	$('#chart2').jqplot([line1], {
        title:'Total simple changes',
        seriesColors:['#A9FF00', '#FED501', '#0166FF'],
        seriesDefaults:{
            renderer:$.jqplot.BarRenderer,
	     shadowAngle: 135,
	     pointLabels: { show: true, location: 'e', edgeTolerance: 0 },
            rendererOptions: {
                varyBarColor: true,
		  barMargin: 50
            }
        },
        axes:{
            xaxis:{
                renderer: $.jqplot.CategoryAxisRenderer
            }
        }
    });
*/
});
</script> 
	<div id="primary"  class="site-content"> 
		<div id="content" role="main">

<a href="/onesimplechange/wp-content/uploads/2013/08/D461_OSC_Phil_Markert_FINAL.pdf" target="_blank"><div class="clicker2"></div></a>
			<a href="/onesimplechange/wp-content/uploads/2013/08/D489_OSC_Marcus_Phillips2.pdf" target="_blank"><div class="clicker"></div></a>
                            <a href="/onesimplechange/wp-content/uploads/2013/08/D845_OSC_Renee_Hopfner2.pdf" target="_blank"><div class="clicker3"></div></a>
                            <a href="/onesimplechange/wp-content/uploads/2013/08/D530_OSC_Rick_Stark2.pdf" target="_blank"><div class="clicker4"></div></a>

<div style="width: 450px; margin-left:auto; margin-right:auto; margin-top:20px;" >
<div>
<p style="padding-bottom:10px; margin-top:6px; line-height: 150%; text-align:center; font-size: 22px; font-weight: bold; color:#361a0d;">Make change happen!  </p>
<p style="padding-bottom:10px; margin-top:6px; line-height: 150%; text-align: left;">One Simple Change is a small step you make today to feel better tomorrow.</p>
<p style="padding-bottom:10px; margin-top:6px; line-height: 150%;text-align: left; ">Start here with a pledge to yourself to change one thing that will bring you closer to your overall health goals.
<p style="padding-bottom:10px; margin-top:6px; line-height: 120%;text-align: left; "> Your change should be easy and convenient, so that it gradually becomes a part of your life.</p>
<p style="padding-bottom:10px; margin-top:10px;line-height: 120%; text-align: left;">The change you make today could be the most important change you’ve ever made! </p>
<p style="padding-bottom:10px; margin-top:16px; line-height: 120%; text-align: center;"><a href="/onesimplechange/?page_id=243" Start <strong>Pledge Your Change</strong></a> </p>
<p style="padding-bottom:10px; margin-top:6px; line-height: 120%; text-align: center;"><img  src="/onesimplechange/wp-content/uploads/2013/08/lotus.png" alt="lotus" width="75" height="66" class="alignnone size-full wp-image-136" /></a></p>

 </div> 
</div> 

		<!-- <?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?> 
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?> 

			<?php simplechange_content_nav( 'nav-below' ); ?>

		<?php else : ?>


			<article id="post-0" class="post no-results not-found">

			<?php if ( current_user_can( 'edit_posts' ) ) :
				// Show a different message to a logged-in user who can add posts.
			?> -->
			<!--	<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'No posts to display', 'simplechange' ); ?></h1>
				</header> -->

				<!-- <div class="entry-content">
					<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'simplechange' ), admin_url( 'post-new.php' ) ); ?></p> -->
				</div><!-- .entry-content -->

			<?php else :
				// Show the default message to everyone else.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'simplechange' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'simplechange' ); ?></p>
					<?php get_search_form(); ?> 
				</div><!-- .entry-content -->
			<?php endif; // end current_user_can() check ?>

			</article><!-- #post-0 -->

		<?php endif; // end have_posts() check ?>
		<div style="width:50%; margin-left: auto; margin-right: auto;">
			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.jqplot.min.css" />
			<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/form.css" />
			<div id="chart2" style="width: 100%; height:350px; z-index: 9999; margin-top: 50px;">
		</div>
		</div><!-- #content -->		
	</div><!-- #primary -->

</div></div>
<?php get_footer(); ?> 