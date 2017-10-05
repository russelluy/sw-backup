<?php
	
	if(!defined('BASE_URL')){
		define('BASE_URL','/');
		//define('BASE_URL','http://'.$_SERVER['HTTP_HOST'].'/');
	}
	$title = $_GET['title'];
?>



		<iframe frameborder="0" style="height:350px; width:100%; margin:0px;" src="http://www.safewaycareconnect.com/vid.php?title=<?=$title?>" scrolling="no"></iframe>

		<!-- Video HTML -->
		<!--<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="550" height="351" id="FLVPlayer">
			<param name="movie" value="<?=BASE_URL?>imgs/swf/FLVPlayer_Progressive.swf?MM_ComponentVersion=1&skinName=<?=BASE_URL?>imgs/swf/Halo_Skin_3&streamName=<?=BASE_URL?>videos/<?=$title?>&autoPlay=true&autoRewind=false" />
			<param name="salign" value="lt" />
			<param name="quality" value="high" />
			<param name="scale" value="noscale" />
			<param name="wmode" value="transparent" />
			<param name="FlashVars" value="&MM_ComponentVersion=1&skinName=Halo_Skin_3&streamName=<?=BASE_URL?>videos/ProstateCancerWhatYouNeedtoKnow640x480&autoPlay=true&autoRewind=false" />
			<embed wmode="transparent" src="<?=BASE_URL?>imgs/swf/FLVPlayer_Progressive.swf?MM_ComponentVersion=1&skinName=<?=BASE_URL?>imgs/swf/Halo_Skin_3&streamName=<?=BASE_URL?>videos/<?=$title?>&autoPlay=true&autoRewind=false" quality="high" scale="noscale" width="550" height="350" name="FLVPlayer" salign="LT" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" />                              
		</object>-->