<?php
global $gw_options;
##############
#edit Option name:
$optionname = "general";
#############
$saved_optionname = get_current_theme()."_".$optionname;

$gw_options[$optionname] = get_option($saved_optionname);

function admin_top_level()
{
	global $top_level_basename;
	$top_level_basename = basename(__FILE__);
	$optionpage_top_level = get_current_theme()." Options";

	add_menu_page($optionpage_top_level, $optionpage_top_level, 7, basename(__FILE__), 'gw_generate');
}

add_action('admin_menu', 'admin_top_level');

function admin_head_addition() 
{	
	$current_folder = preg_replace("!".TEMPLATEPATH."!","", dirname(__FILE__));
	
	$admin_stylesheet_url = get_bloginfo('template_url').'/options/admin.css';
	echo '<link rel="stylesheet" href="'. $admin_stylesheet_url . '" type="text/css" />';
	
	$admin_js_url = get_bloginfo('template_url').'/options/supporting_scripts.js';
	echo '<script type="text/javascript" src="'.$admin_js_url.'"></script>';	
}

if($_GET['page'] == basename(__FILE__))
{
	add_action('admin_head', 'admin_head_addition');	
}

function gw_generate()
{	
	$optionname = "general";
	$saved_optionname = get_current_theme()."_".$optionname;

	global $optionpage_top_level;
	
	$options = $newoptions  = get_option($saved_optionname);

	if ( $_POST['gw_options_save'] ) 
	{
		foreach ($_POST as $key => $value)
		{
			$newoptions[$key] = stripslashes($value); 
		}
	}
		
	if ( $options != $newoptions ) 
	{
		$options = $newoptions;
		update_option($saved_optionname, $options);
	}
	
	if($options)
	{
		foreach ($options as $key => $value)
		{
			$options[$key] = empty($options[$key]) ? false : $options[$key];
		}
	}
?>


<div class="wrap">
<h2><?php if ($optionpage_top_level == '') echo "General Options"; else {echo $optionpage_top_level;} ?></h2>

<form method="post" action="">
<table class="form-table">
<tr valign="top">
  <th scope="row">Media Consult Skin</th>
  <td><br/>
	<label><input type="radio" name="cssswitch" id="cssswitch" value="1" <?php if ($options['cssswitch'] == 1 || $options['cssswitch'] == false){echo "checked = checked";}?> /> Media Consult - White Orange</label><br/>
    
    <label><input type="radio" name="cssswitch" id="cssswitch2" value="2" <?php if ($options['cssswitch'] == 2){echo "checked = checked";}?>/> Media Consult - White Blue</label><br/>
    <label><input type="radio" name="cssswitch" id="cssswitch3" value="3" <?php if ($options['cssswitch'] == 3){echo "checked = checked";}?>/> Media Consult - White Green</label><br/>
    <label><input type="radio" name="cssswitch" id="cssswitch4" value="4" <?php if ($options['cssswitch'] == 4){echo "checked = checked";}?>/> Media Consult - Dark Red Blue</label><br/>
	<label><input type="radio" name="cssswitch" id="cssswitch5" value="5" <?php if ($options['cssswitch'] == 5){echo "checked = checked";}?>/> Media Consult - Dark Orange</label><br/>
	<label><input type="radio" name="cssswitch" id="cssswitch6" value="6" <?php if ($options['cssswitch'] == 6){echo "checked = checked";}?>/> Media Consult - Dark Brown</label><br/>
	<label><input type="radio" name="cssswitch" id="cssswitch7" value="7" <?php if ($options['cssswitch'] == 7){echo "checked = checked";}?>/> Media Consult - Red Brown</label><br/>
	<label><input type="radio" name="cssswitch" id="cssswitch8" value="8" <?php if ($options['cssswitch'] == 8){echo "checked = checked";}?>/> Media Consult - Krem</label><br/>      
    </td>
</tr>

<tr valign="top">
<th scope="row">Do you want your logo to have a slogan ?</th>
<td>
<br />
<label><input type="radio" name="lt_option" id="lt_true" value="1" <?php if ($options['lt_option'] == 1 || $options['lt_option'] == false){echo "checked = checked";}?>/> Yes</label>&nbsp;&nbsp;&nbsp;
<label><input type="radio" name="lt_option" id="lt_false" value="2" <?php if ($options['lt_option'] == 2){echo "checked = checked";}?>/> No</label><br/>
<br />
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="seo_keywords">SEO: Meta keywords</label></th>
<td>

<input name="seo_keywords" type="text" id="seo_keywords" value="<?php if ($options['seo_keywords']){echo $options['seo_keywords'];}?>" size="70" /><br/>
Type your meta keywords here(separated by commas)
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="seo_description">SEO: Meta description</label></th>
<td>
<textarea class="code" style="width: 80%; font-size: 12px;" id="seo_description" rows="6" cols="60" name="seo_description">
<?php if ($options['seo_description']){echo $options['seo_description'];}?>
</textarea><br />
Type your meta description here.
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="footer_copyright">Logo tagline</label></th>
<td>

<input name="logo_tagline" type="text" id="logo_tagline" value="<?php if ($options['logo_tagline']){echo $options['logo_tagline'];}?>" size="70" /><br/>
Type your logo slogan. Note: if left empty the default logo slogan will be:  your attractive and simple slogan
</td>
</tr>

<tr valign="top">
<th scope="row">Do you want your theme to have search functionality ?</th>
<td>
<br />
<label><input type="radio" name="search_option" id="search_true" value="1" <?php if ($options['search_option'] == 1 || $options['search_option'] == false){echo "checked = checked";}?>/> Yes</label>&nbsp;&nbsp;&nbsp;
<label><input type="radio" name="search_option" id="search_false" value="2" <?php if ($options['search_option'] == 2){echo "checked = checked";}?>/> No</label><br/>
<br />
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="custom_css">Custom css</label></th>
<td>
<textarea class="code" style="width: 80%; font-size: 12px;" id="custom_css" rows="10" cols="60" name="custom_css">
<?php if ($options['custom_css']){echo $options['custom_css'];}?>
</textarea>
<br />
	Add custom css to your theme.
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="blog_identificator">Blog category identificator</label></th>
<td>
<input name="blog_identificator" type="text" id="blog_identificator" value="<?php if ($options['blog_identificator']){echo $options['blog_identificator'];}?>" size="2" /><br/>
Put the <strong>id</strong> of the blog category in the above input. This is needed so that wordpress will list the <strong>blog categories</strong> in <br />the sidebar if the widget <strong>MC BLog Categories</strong> is active. 
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="brochure_link">Brochure link</label></th>
<td>
<input name="brochure_link" type="text" id="brochure_link" value="<?php if ($options['brochure_link']){echo $options['brochure_link'];}?>" size="70" /><br/>
Paste your brochure link here.
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="footer_copyright">Footer copyright notice</label></th>
<td>
<textarea class="code" style="width: 80%; font-size: 12px;" id="footer_copyright" rows="3" cols="60" name="footer_copyright">
<?php if ($options['footer_copyright']){echo $options['footer_copyright'];}?>
</textarea>
<br />
	Enter your footer copyright notice. Note: if empty it will display the default message that comes with the theme.
</td>
</tr>


<tr valign="top">
<th scope="row"><label for="google_analytics">Google analytics tracking code</label></th>
<td>
<textarea class="code" style="width: 80%; font-size: 12px;" id="google_analytics" rows="10" cols="60" name="google_analytics">
<?php if ($options['google_analytics']){echo $options['google_analytics'];}?>
</textarea>
<br />
	Enter your google analytics tracking code here
</td>
</tr>

</table>
<p class="submit">
    <input id="gw_options_save" type="hidden" value="1" name="gw_options_save" />
    <input type="submit" name="Submit" value="Save Changes" />
</p>
</form>

</div>
<?php
}

?>