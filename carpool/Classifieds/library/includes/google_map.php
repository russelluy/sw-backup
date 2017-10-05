<?php
global $General;
$generalinfo = $General->get_general_settings();
$pid = $_REQUEST['pid'];
if(have_posts())
{
	query_posts("p=$pid");
	while (have_posts())
	{
		the_post();
		$post_location = get_post_meta($post->ID, 'post_location', $single = true);
	}
}
?>
<script src="http://maps.google.com/maps?file=api&v=1&key=<?php echo $generalinfo['google_map_key'];?>" type="text/javascript"></script>
<?php
echo "<h3>Location :- ".$post_location.'</h3>';
$address = urlencode("$post_location");
$maplink = "http://maps.google.com/maps/geo?q=$address&output=json&sensor=true_or_false&key=".$generalinfo['google_map_key'];



$content = file_get_contents($maplink);
if ($content !== false) 
{
	$mapvaluearray = json_decode ($content)->Placemark;
	$latitue_longitute_array = $mapvaluearray[0]->Point->coordinates;
	$latitue = $latitue_longitute_array[0];
	$longitute = $latitue_longitute_array[1];
   // do something with the content
} else {
   // an error happened
}
?>
<style>
	h3 { margin:0; padding:10px 0 15px 0; border-top:3px solid #CCC; font:bold 16px Arial, Helvetica, sans-serif; color:#000;  }
</style>
<div id="map" style="width: 620px; height: 180px" ></div>
<script type="text/javascript">
var map = new GMap(document.getElementById("map"));
map.centerAndZoom(new GPoint(<?php echo $latitue;?>, <?php echo $longitute;?>), 3);
</script>

