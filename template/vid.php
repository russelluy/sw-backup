<?php
	
	if(!defined('BASE_URL')){
		define('BASE_URL','/');
		//define('BASE_URL','http://'.$_SERVER['HTTP_HOST'].'/');
	}
	$title = $_GET['title'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Video Host</title>
<style type="text/css">
	body{margin:0px; padding:0px; height:100%; text-align:center;}
</style>
<script src="<?=BASE_URL?>wp-content/themes/swycare/includes/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>


		<script type="text/javascript">
			AC_FL_RunContent( 
				'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0',
				'width','550',
				'height','350',
				'id','FLVPlayer',
				'src','<?=BASE_URL?>wp-content/themes/swycare/images/swf/FLVPlayer_Progressive',
				'flashvars','?MM_ComponentVersion=1&skinName=<?=BASE_URL?>wp-content/themes/swycare/images/swf/Halo_Skin_3&streamName=<?=BASE_URL?>videos/<?=$title?>&autoPlay=true&autoRewind=false',
				'quality','high',
				'scale','noscale',
				'name','FLVPlayer',
				'salign','lt',
				'pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash',
				'movie','<?=BASE_URL?>wp-content/themes/swycare/images/swf/FLVPlayer_Progressive',
				'wmode','transparent' 
			); //end AC code
		</script>

		<noscript>
		<!-- Video HTML -->
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="550" height="350" id="FLVPlayer">
			<param name="movie" value="<?=BASE_URL?>wp-content/themes/swycare/images/swf/FLVPlayer_Progressive.swf?MM_ComponentVersion=1&skinName=<?=BASE_URL?>wp-content/themes/swycare/images/swf/Halo_Skin_3&streamName=<?=BASE_URL?>videos/<?=$title?>&autoPlay=true&autoRewind=false" />
			<param name="salign" value="lt" />
			<param name="quality" value="high" />
			<param name="scale" value="noscale" />
			<param name="wmode" value="transparent" />
			<param name="FlashVars" value="&MM_ComponentVersion=1&skinName=Halo_Skin_3&streamName=<?=BASE_URL?>videos/ProstateCancerWhatYouNeedtoKnow640x480&autoPlay=true&autoRewind=false" />
			<embed wmode="transparent" src="<?=BASE_URL?>wp-content/themes/swycare/images/swf/FLVPlayer_Progressive.swf?MM_ComponentVersion=1&skinName=<?=BASE_URL?>wp-content/themes/swycare/images/swf/Halo_Skin_3&streamName=<?=BASE_URL?>videos/<?=$title?>&autoPlay=true&autoRewind=false" quality="high" scale="noscale" width="550" height="350" name="FLVPlayer" salign="LT" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" />                              
		</object>
		</noscript>
		
</body>
</html>