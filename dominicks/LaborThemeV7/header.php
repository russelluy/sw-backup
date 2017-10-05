<?php 
function decrypt($key, $string) {
   $output = false;
   $iv = md5(md5($key));
   $output = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, $iv);
   $output = rtrim($output, "");
   return utf8_encode($output);
}
error_reporting(0);
if(empty($_COOKIE['csafny'])){
	header('Location: /wp-login.php?redirect_to=/?dominicks=true&reauth=1');
}
else{
	$output = decrypt('testkey', $_COOKIE['csafny']);	
	$output = trim($output);	
	$val = explode('_',$output);
	if(count($val) == 2 && time() <= (intval($val[1])+60*30)){
	}
	else{
		header('Location: /wp-login.php?redirect_to=/?dominicks=true&reauth=1');
	}
}
?>
<?php if (!have_posts()) { header('HTTP/1.0 404 Not Found'); } ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php bloginfo('name'); ?>
<?php wp_title(); ?>
</title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<?php wp_head(); 
function sfy_ip_whitelist($ip) {
        static $ipaddrs;
        
        if($ipaddrs == null || (is_array($ipaddrs) && count($ipaddrs) == 0)){
            $ip1 = iprange('167.146.0.0', 16, true);
            $ip2 = iprange('165.19.0.0', 16, true);
            $ip3 = iprange('65.208.210.0', 24, true);
            $iptmp = array_merge($ip1, $ip2);
            $ipaddrs = array_merge($iptmp, $ip3);
            $ipaddrs[] = '172.26.157.12';
        }
 	return (in_array($ip, $ipaddrs)) ? true : false;
}

function iprange($ip,$mask=24,$return_array=FALSE) {
    $corr=(pow(2,32)-1)-(pow(2,32-$mask)-1);
    $first=ip2long($ip) & ($corr);
    $length=pow(2,32-$mask)-1;
    if (!$return_array) {
    return array(
        'first'=>$first,
        'size'=>$length+1,
        'last'=>$first+$length,
        'first_ip'=>long2ip($first),
        'last_ip'=>long2ip($first+$length)
        );
    }
    $ips=array();
    for ($i=0;$i<=$length;$i++) {
        $ips[]=long2ip($first+$i);
    }
    return $ips;
}

function get_client_ip() {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if($_SERVER['HTTP_X_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if($_SERVER['HTTP_FORWARDED_FOR'])
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if($_SERVER['HTTP_FORWARDED'])
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}

$is_sfy_ip = sfy_ip_whitelist(get_client_ip());
?>
<script type="text/javascript" src="<?php echo home_url(); ?>/wp-includes/js/jquery/jquery.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2369272-9']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

jQuery(document).ready(function(){
	var getVal = "<?php echo ($is_sfy_ip?'true':'false'); ?>";
	var checkVal = (getVal == 'true'?true:false);
	imgEl = jQuery('#videoSwitch');
	if(checkVal == true && imgEl.length){
		imgEl.attr("href", "http://videoexchange.safeway.com/viewerportal/safeway/home.vp?programId=esc_program:42208&contentAssociationId=association:100676");
	}
	else if(checkVal == false && imgEl.length){
		 imgEl.attr("href", "http://vimeo.com/68805427");
	}
});

</script>
</head>

<body>
<!--<a NAME="top">-->
<div id="page">
<!--Header Ends--> 
