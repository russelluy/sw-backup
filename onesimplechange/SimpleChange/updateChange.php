<?php
/*
Template Name: Update Page
*/

get_header(); 
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/excanvas.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.jqplot.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jqplot.barRenderer.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jqplot.pointLabels.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jqplot.categoryAxisRenderer.min.js"></script>
 
	<div id="primary"  class="site-content"> 
		<div id="content" role="main">

<a href="/onesimplechange/wp-content/uploads/2013/08/D461_OSC_Phil_Markert_FINAL.pdf" target="_blank"><div class="clicker2"></div></a>
			<a href="/onesimplechange/wp-content/uploads/2013/08/D489_OSC_Marcus_Phillips2.pdf" target="_blank"><div class="clicker"></div></a>
                            <a href="/onesimplechange/wp-content/uploads/2013/08/D845_OSC_Renee_Hopfner2.pdf" target="_blank"><div class="clicker3"></div></a>
                            <a href="/onesimplechange/wp-content/uploads/2013/08/D530_OSC_Rick_Stark2.pdf" target="_blank"><div class="clicker4"></div></a>

<div style="width: 450px; margin-left:auto; margin-right:auto; margin-top:20px;" >
<div>
<?php
if(isset($_GET['chgid'])){
$itemid = mysql_real_escape_string(stripslashes(htmlentities($_GET['chgid'])));
?>
<form name="updChange" method="post" action="/onesimplechange/dataHandle.php?chgid=<?php echo $itemid ?>"> 
<p style="padding-bottom:10px; margin-top:6px; line-height: 150%; text-align:center; font-size: 22px; font-weight: bold; color:#361a0d;">Update My Change!  </p>
<p style="padding-bottom:10px; margin-top:6px; line-height: 150%;text-align: left; "><strong>Congratulations on the step you've taken to feeling and living better!</strong></p>
<p style="padding-bottom:10px; margin-top:6px; line-height: 120%;text-align: left; ">
      <input type="radio" name="status" value="complete" id="status_0" style="position: relative; float: left; width: 20px;" />
      <span style="position: relative; float: left; width: 415px;">My One Simple Change has become a part of my lifestyle and I feel great!</span>
    <br /><br /><br />
      <input type="radio" name="status" value="incomplete" id="status_1" style="position: relative; float: left; width: 20px;" />
      <span style="position: relative; float: left; width: 415px;">I’m still working on my One Simple Change</span>
    <br />
</p>
<p style="padding-bottom:10px; margin-top:10px;line-height: 120%; text-align: left;">Now that you've started something new, keep up the momentum! You've made one small step, consider making one more and pledge another One Simple Change (link back to OSC form page) to improve your mind, body, or spirit. And when you're ready to share your story and inspire others, submit the One Simple Change Nomination Form on JumpStart and you could become a 'Star of Change', sharing your story with your co-workers.</p>
<p style="padding-bottom:10px; margin-top:10px;line-height: 120%; text-align: center;"><input name="Submit" type="submit" value="Submit" /></p>

</form>
<?php
}else{
?>
<p style="padding-bottom:10px; margin-top:6px; line-height: 150%; text-align:center; font-size: 22px; font-weight: bold; color:#361a0d;">Update My Change!  </p>
<p style="padding-bottom:10px; margin-top:6px; line-height: 150%;text-align: left; "><strong>Please click on the link provided to you in the reminder email to Update your change.</strong></p>
<?php
}
?>
 </div> 
</div> 

		</div><!-- #content -->		
	</div><!-- #primary -->

</div></div>
<?php get_footer(); ?> 