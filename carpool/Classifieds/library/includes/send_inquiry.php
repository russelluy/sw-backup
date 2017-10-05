<?php

global $General;

if($_POST)

{

	$frnd_yourname = $_POST['frnd_yourname'];

	$frnd_youremail = $_POST['frnd_youremail'];

	$frnd_name = $_POST['frnd_name'];

	$frnd_email = $_POST['frnd_email'];

	$frnd_subject = $_POST['frnd_subject'];

	$frnd_comments = $_POST['frnd_comments'];

	$productid = $_POST['productid'];

	

	$message1 = '

	<html>

	<head>

	  <title>'.$frnd_subject.'</title>

	</head>

	<body>

	 <table width="80%" align=center>';

	$message1 .=	'<tr>

		  <td>Dear '.$frnd_name.',<Br><br></td>

		</tr>';

	$message1 .= '<tr><td>'.$frnd_comments.'</td></tr>';

	echo $message1 .='

	<tr><td>Your can see the following link <a href="'.get_option('siteurl').'/?p='.$productid.'">Click Here</a>.</td></tr>

	<tr>

		  <td><Br><br>Thank you,<Br>'.$frnd_yourname.'</td>

		</tr>

	  </table>

	</body>

	</html>

	';

	$General->sendEmail($frnd_youremail,$frnd_yourname,$frnd_email,$frnd_name,$frnd_subject,$message1,$extra='');///To friend email

	echo '<script>alert(document.getElementById("tellfrnddiv").innerHTML);</script>';

	wp_redirect(get_option('siteurl')."/?page=tellafriend");

}

else

{

?>

<script type="text/javascript">

$(document).ready(function(){



$('.hide').hide();



$('body').append('<div id="infoBacking"></div><div id="infoHolder" class="large"></div>');

$('#infoBacking').css({position:'absolute', left:0, top:0, display:'none', textAlign:'center', background:'', zIndex:'600'});

$('#infoHolder').css({left:0, top:0, display:'none', textAlign:'center', zIndex:'600', position:'absolute'});

if($.browser.msie){$('#infoHolder').css({position:'absolute'});}





$('.more').mouseover(function() {$(this).css({textDecoration:'none'});} );

$('.more').mouseout(function() {$(this).css({textDecoration:'none'});} );



$('.more').click(function(){



if ($('.' + $(this).attr("title")).length > 0) {



	browserWindow()

	getScrollXY()



	if (height<totalY) { height=totalY; }



	$('#infoBacking').css({width: totalX + 'px', height: height + 'px', top:'0px', left:scrOfX + 'px', opacity:0.85});

	$('#infoHolder').css({width: width + 'px', top:scrOfY + 25 + 'px', left:scrOfX + 'px'});

	source = $(this).attr("title");



	$('#infoHolder').html('<div id="info">' + $('.' + source).html() + '<p class="clear"><span class="close" >Close X</span></p></div>');



	$('#infoBacking').css({display:'block'});

	$('#infoHolder').show();

	$('#info').fadeIn('slow');

}



$('.close').click(function(){

	$('#infoBacking').hide();

	$('#infoHolder').fadeOut('fast');

});



});



/* find browser window size */

function browserWindow () {

	width = 0

	height = 0;

	if (document.documentElement) {

		width = document.documentElement.offsetWidth;

		height = document.documentElement.offsetHeight;

	} else if (window.innerWidth && window.innerHeight) {

		width = window.innerWidth;

		height = window.innerHeight;

	}

	return [width, height];

}

/* find total page height */

function getScrollXY() {

	scrOfX = 0; 

	scrOfY = 0;

	if( typeof( window.pageYOffset ) == 'number' ) {

		scrOfY = window.pageYOffset;

		scrOfX = window.pageXOffset;

	} else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) {

		scrOfY = document.body.scrollTop;

		scrOfX = document.body.scrollLeft;

	} else if( document.documentElement && ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) {

		scrOfY = document.documentElement.scrollTop;

		scrOfX = document.documentElement.scrollLeft;

	}

	totalY = (window.innerHeight != null? window.innerHeight : document.documentElement && document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body != null ? document.body.clientHeight : null);



	totalX = (window.innerWidth != null? window.innerWidth : document.documentElement && document.documentElement.clientWidth ? document.documentElement.clientWidth : document.body != null ? document.body.clientWidth : null);

	

	return [ scrOfX, scrOfY, totalY, totalX ];

}



return false;

});

</script>





<style>

#info { position:relative; }

.close { position:absolute; right:14px; top:14px; padding:5px 8px; background:#bababa; color:#fff; -moz-border-radius:35px; cursor:pointer; font:bold 14px Arial, Helvetica, sans-serif; text-decoration:none; display:block }

.close:hover { background:#666; }



</style>



<?php /*?><span style="text-decoration: underline; cursor:pointer;"  title="tellafrnd_div"><a href="javascript:void(0)" class="b_sendinquiry"><?php _e(SEND_INQUIRY_TEXT);?></a></u></span>

<?php */?>

<span style="text-decoration: underline; cursor:pointer;" class="more " title="tellafrnd_div"><a href="javascript:void(0)" class="b_sendinquiry"><?php _e(SEND_INQUIRY_TEXT);?></a></u></span>



<span id="tellafrnd_success_msg_span"></span>

<div style="display: none;" id="tellfrnddiv" class="tellafrnd_div hide">

  <iframe src="<?php $id = $post->ID; echo get_option('siteurl')."/?page=send_inqury&pid=$id";?>" height="500" width="600"></iframe>

</div>

<?php

}

?>