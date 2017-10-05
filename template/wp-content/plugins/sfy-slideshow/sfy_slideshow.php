<?php

/*
Plugin Name: Safeway Banner
Plugin URI: 
Description: Save settings for displaying slide show images in top banner for safeway portal sites and show the banner slides.
Author: Iftekhar Sadi
Version: 1.0
Author URI: 
Donate link: 
*/


function sfy_slideshow_admin_scripts() 
{
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('jquery-ui-core');
	wp_register_script('sfy-slideshow-upload', WP_PLUGIN_URL.'/sfy-slideshow/sfy-slideshow-script.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('sfy-slideshow-upload');
	wp_register_script('sfy-slideshow-datepicker', WP_PLUGIN_URL.'/sfy-slideshow/jquery.ui.datepicker.js', array('jquery','jquery-ui-core'));
	wp_enqueue_script('sfy-slideshow-datepicker');
}

function sfy_slideshow_admin_styles() 
{
	wp_enqueue_style('thickbox');
	wp_enqueue_style('jquery.ui.theme', WP_PLUGIN_URL.'/sfy-slideshow/ui-lightness/jquery-ui-1.8.14.custom.css');
}


function sfy_slideshow_control()
{
		echo "There is no settings for this control here. Please go to the sidebar admin menu.";
}

function sfy_slideshow_widget() 
{
	global $wpdb;
	$today = getdate();
	$today_date = $today["year"] . '-' . $today["mon"] . '-' . $today["mday"];
	$content = '';
	$content .= '<div class="slider-wrapper theme-default">';
	$content .= '<div class="ribbon"></div>';
	$content .= '<div id="slider" class="nivoSlider">';
	
	$query = "select BANNER_ID, HREF , TARGET , IMAGE_SOURCE , IMAGE_ALT , IMAGE_TITLE , START_DATE , END_DATE from BANNER_SLIDESHOW " . 
	          " where START_DATE <= '" . $today_date . "' and END_DATE >= '" . $today_date . "'" ;
	$results = $wpdb->get_results($query);
	
	foreach($results as $result){
		$content .= '<a href= "' . stripslashes($result->HREF) . '" target= "' . stripslashes($result->TARGET) . '"><img src="' . stripslashes($result->IMAGE_SOURCE) . '" ' .
					' alt = "' . stripslashes($result->IMAGE_ALT) . '" title = "' . stripslashes($result->IMAGE_TITLE) . '" /></a>';
	}
	
	$content .= '</div></div>';
	
	echo $content;
}


function sfy_slideshow_admin_option_allbanners() 
{
	echo '<h1>All Banners</h1>';
	
	global $wpdb;
	
	if(isset($_REQUEST["bid"])){
		$delete = 'delete from BANNER_SLIDESHOW where BANNER_ID = ' . $_REQUEST["bid"];
		$results = $wpdb->query( $delete );
	}
	
	$query = 'select BANNER_ID, HREF , TARGET , IMAGE_SOURCE , IMAGE_ALT , IMAGE_TITLE , START_DATE , END_DATE from BANNER_SLIDESHOW';
	$results = $wpdb->get_results($query);
	
	echo '<table>';
	foreach($results as $result){
		echo '<tr>';
		echo '<td>';
			echo '<img src="' . $result->IMAGE_SOURCE . '"/>';
		echo '</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>';
			echo  '<a href="?page=add_banners&bid=' . $result->BANNER_ID . '">Edit</a>';
			echo  '       <a href="?page=all_banners&bid=' . $result->BANNER_ID . '">Delete</a>';
		echo '</td>';
		echo '</tr>';
	}
	echo '</table>';
}

function sfy_slideshow_admin_option_editbanners() 
{
	global $wpdb;
	$update = false;
	$bid = 0;
	$href = '';
	$target = '';
	$imagesource = '';
	$imagealt = '';
	$imagetitle = '';
	$startdate = '';
	$enddate = '';
	
	if(isset($_REQUEST["bid"])){
		$update = true;
		$bid = $_REQUEST["bid"];
		$query = 'select BANNER_ID, HREF , TARGET , IMAGE_SOURCE , IMAGE_ALT , IMAGE_TITLE , START_DATE , END_DATE from BANNER_SLIDESHOW where BANNER_ID = ' . $bid;
		$result = $wpdb->get_row($query);
		
		$href = stripslashes($result->HREF);
		$target = stripslashes($result->TARGET);
		$imagesource = stripslashes($result->IMAGE_SOURCE);
		$imagealt = stripslashes($result->IMAGE_ALT);
		$imagetitle = stripslashes($result->IMAGE_TITLE);
		$startdate =  date("d-m-Y",strtotime(stripslashes($result->START_DATE)));
		$enddate =  date("d-m-Y",strtotime(stripslashes($result->END_DATE)));
	}
	
	if($update == true){
		echo '<h1>Update Banners</h1>';
	}else{
		echo '<h1>Add Banners</h1>';
	}
	
	if ($_POST['banner_submit']) 
	{	
		$href = addslashes($_POST['href']);
		$target = addslashes($_POST['target']);
		$imagesource = addslashes($_POST['imagesource']);
		$imagealt = addslashes($_POST['imagealt']);
		$imagetitle = addslashes($_POST['imagetitle']);
		$startdate = addslashes($_POST['startdate']);
		$enddate = addslashes($_POST['enddate']);
				
		$startdate = ($startdate == '' ? '1000-01-01' : date("Y-m-d",strtotime($startdate)));
		$enddate = ($enddate == '' ? '9999-12-31' : date("Y-m-d",strtotime($enddate)));
		
		if($update == true){//update
			$update = "UPDATE BANNER_SLIDESHOW set " .
						"HREF = '" . $href . "'," .
						"TARGET = '" . $target . "'," .
						"IMAGE_SOURCE = '" . $imagesource . "'," .
						"IMAGE_ALT = '". $imagealt . "'," .
						"IMAGE_TITLE = '" . $imagetitle . "'," .
						"START_DATE = '" . $startdate . "'," .
						"END_DATE = '" . $enddate . "'" .
						"where BANNER_ID = " . $bid ;
						
			$results = $wpdb->query( $update );
			
			$href = stripslashes($href);
			$target = stripslashes($target);
			$imagesource = stripslashes($imagesource);
			$imagealt = stripslashes($imagealt);
			$imagetitle = stripslashes($imagetitle);
			$startdate =  date("d-m-Y",strtotime(stripslashes($startdate)));
			$enddate =  date("d-m-Y",strtotime(stripslashes($enddate)));
		}else if($update == false){//insert
			$insert = "INSERT INTO BANNER_SLIDESHOW ".
			" (HREF , TARGET , IMAGE_SOURCE , IMAGE_ALT , IMAGE_TITLE , START_DATE , END_DATE ) " .
			"VALUES ('". $href . "','" . $target . "','" . $imagesource . "','" . $imagealt . "','" . $imagetitle . "','" . $startdate . "','" . $enddate  . "'" . ")";
			
			$results = $wpdb->query( $insert );
			
			$href = '';
			$target = '';
			$imagesource = '';
			$imagealt = '';
			$imagetitle = '';
			$startdate = '';
			$enddate = '';
		}
		
		if(isset($results)){
			if($results == FALSE){
				    echo '<div id="message" class="error">Operation did not completed successfully.</div>';
			}else{
				    echo '<div id="message" class="updated">Operation completed successfully.</div>';
			}
			unset($results);
		}
	}	
	?>
	<form name="sfy_banner" method="post" action="">
		<table width="100%" border="0" cellspacing="0" cellpadding="3">
			<tr>
				<td align="left">
					HREF: 
				</td>
				<td>
					<input  style="width: 450px;" type="text" value="<?php echo $href; ?>" name="href" id="href" />
				</td>
			</tr>
			<tr>
				<td align="left">
					Target: 
				</td>
				<td>
					<input  style="width: 450px;" type="hidden" value="<?php echo $target; ?>" name="target" id="target" />
					<select style="width: 450px;" name="target_select" id = "target_select">
						 <option valie="" selected="selected">  </option>
						 <option value="_blank">_blank</option>
						 <option value="_self">_self</option>
						 <option value="_parent">_parent</option>
						 <option value="_top">_top</option>
					</select>
				</td>
			</tr>
			<tr>
				<td align="left">
					Image Source: 
				</td>
				<td>
					<input  style="width: 450px;" type="text" value="<?php echo $imagesource; ?>" name="imagesource" id="imagesource" />
					<input id="upload_image_button" name="upload_image_button" type="button" value="Select Image" />
				</td>
			</tr>
			<tr>
				<td align="left">
					Image ALT: 
				</td>
				<td>
					<input  style="width: 450px;" type="text" value="<?php echo $imagealt; ?>" name="imagealt" id="imagealt" />
				</td>
			</tr>
			<tr>
				<td align="left">
					Image Title: 
				</td>
				<td>
					<input  style="width: 450px;" type="text" value="<?php echo $imagetitle; ?>" name="imagetitle" id="imagetitle" />
				</td>
			</tr>
			<tr>
				<td align="left">
					Start Date(dd-mm-yyyy): 
				</td>
				<td>
					<input  style="width: 450px;" type="text" value="<?php echo $startdate; ?>" name="startdate" id="startdate" />
				</td>
			</tr>
			<tr>
				<td align="left">
					End Data(dd-mm-yyyy): 
				</td>
				<td>
					<input  style="width: 450px;" type="text" value="<?php echo $enddate; ?>" name="enddate" id="enddate" />
				</td>
			</tr>
			<tr colspan=""2>
				<td>
					<input name="banner_submit" id="banner_submit" class="button-primary" value="Submit" type="submit" />'
				</td>
			</tr>
		</table>
	</form>

	<?php
}

function sfy_slideshow_widget_init() 
{
  	if(function_exists('register_sidebar_widget')) 	
	{
		register_sidebar_widget(__('Safeway Banner'), 'sfy_slideshow_widget');   
	}
	
	if(function_exists('register_widget_control')) 	
	{
		register_widget_control(array('Safeway Banner', 'widgets'), 'sfy_slideshow_control',400,400);
	} 
}

function sfy_slideshow_add_to_menu() 
{
	add_menu_page('Safeway Banner', 'Safeway Banner', 7, 'all_banners', 'sfy_slideshow_admin_option_allbanners' );
	add_submenu_page('all_banners', 'Add Banners', 'Add Banners', 7, 'add_banners' , 'sfy_slideshow_admin_option_editbanners' );
}

add_action('admin_menu', 'sfy_slideshow_add_to_menu');
add_action("plugins_loaded", "sfy_slideshow_widget_init");
add_action('init', 'sfy_slideshow_widget_init');

if (isset($_GET['page']) && $_GET['page'] == 'add_banners') {
	add_action('admin_print_scripts', 'sfy_slideshow_admin_scripts');
	add_action('admin_print_styles', 'sfy_slideshow_admin_styles');
}


function ssdb_install() {
   global $wpdb;
   
   $table_name = "BANNER_SLIDESHOW";
      
   $sql = "CREATE TABLE $table_name (
		BANNER_ID INT NOT NULL AUTO_INCREMENT, 
		HREF VARCHAR(150),
		TARGET VARCHAR(10),
		IMAGE_SOURCE VARCHAR(200),
		IMAGE_ALT VARCHAR(2000),
		IMAGE_TITLE VARCHAR(2000),
		START_DATE DATE DEFAULT '1000-01-01',
		END_DATE DATE DEFAULT '9999-12-31',
		PRIMARY KEY BANNER_ID (BANNER_ID)
    );";

   require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   dbDelta($sql);
}

register_activation_hook(__FILE__,'ssdb_install');
?>
