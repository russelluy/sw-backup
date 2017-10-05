<?php
global $gw_options;
##############
#edit Option name:
$optionname = "services";
#############
$saved_optionname = get_current_theme()."_".$optionname;

$gw_options[$optionname] = get_option($saved_optionname);

############ Adding to the menu - always do this!
function options_services() 
{	
	global $top_level_basename, $optionpage_name;
  	$optionpage_top_level = get_current_theme()." Options";
  	$optionpage_name ="Services Options";
  	add_submenu_page($top_level_basename, $optionpage_name, $optionpage_name, 7, basename(__FILE__), 'gw_generate_services');
}
add_action('admin_menu', 'options_services');

############ Adding styles and script to the menu page - only do when we are on this page

if($_GET['page'] == basename(__FILE__))
{
	add_action('admin_head', 'admin_head_addition');	
}

function gw_generate_services()
{		
	$optionname = "services";
	$saved_optionname = get_current_theme()."_".$optionname;
	$options = $newoptions  = get_option($saved_optionname);

	if ( $_POST['gw_options_save'] ) 
	{
		foreach ($_POST as $key => $value)
		{	
			$newoptions[$key] = stripslashes($value); 
			
			if (preg_match("/(\w+)(hidden)$/", $key, $result))
			{
				$loops = $newoptions[$key];
				$newoptions[$key] = 0;
				$final =  $result[1].'final';
				$newoptions[$final] = "";
				for($i = 0; $i < $loops; $i++)
				{
					$name = $result[1].$i;
					$newoptions[$name] = stripslashes($_POST[$name]);
					if($newoptions[$name] != "")
					{
						$newoptions[$key]++;
						
						$newoptions[$final] .= $newoptions[$name];
						if($i+2 < $loops)
						{
							$newoptions[$final] .=", ";
						}
					}		
				}
				$newoptions[$key]++;
			}
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
<h2>Services Options</h2>

<form method="post" action="">
<table class="form-table">
<tr>
  <th scope="row">Media Consult Services</th>
  <td><br/>
  The page you choose from the following dropdown will display your services.<br/>

<select class="postform" id="services_page" name="services_page"> 
<option value="">Select Page</option>  
<?php 
	$pages = get_pages('title_li=&orderby=name');
	foreach ($pages as $page){
		
		if ($options['services_page'] == $page->ID){
		$selected = "selected='selected'";	
			}else{
		$selected = "";		
		}
		echo"<option $selected value='". $page->ID."'>". $page->post_title."</option>";
		}
?>
</select><br/><br/>
    </td>
</tr>

<tr valign="top">
<th scope="row"><label for="services_paragraph_title">Services paragraph title</label></th>
<td>
<input name="services_paragraph_title" type="text" id="services_paragraph_title" value="<?php if ($options['services_paragraph_title']){echo $options['services_paragraph_title'];}?>" size="70" maxlength="255" /><br/>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="services_paragraph">Services paragraph description</label></th>
<td>
<textarea class="code" style="width: 80%; font-size: 12px;" id="services_paragraph" rows="10" cols="60" name="services_paragraph">
<?php if ($options['services_paragraph']){echo $options['services_paragraph'];}?>
</textarea>
</td>
</tr>

<tr valign="top">
  <th scope="row">Services Categories</th>
  <td><br/>
  The services page is populated with the following categories:<br/>  
 <br/>
<div class="multiple_box">
<noscript>Please enable javascript so that this feature will work correctly.<br/></noscript>
<?php

if($options['services_categ_hidden'] == "" || $options['services_categ_hidden'] == false) 
	{
		$options['services_categ_hidden'] = 1;
	}
	
for($i = 0; $i < $options['services_categ_hidden']; $i++)
{?>
	
 
<select class="postform multiply_me" id="services_categ_<?php echo $i; ?>" name="services_categ_<?php echo $i; ?>"> 
<option value="">Add new category?</option>  
<?php 
	$categories = get_categories('title_li=&orderby=name');
	foreach ($categories as $category){
		
		if ($options['services_categ_'.$i] == $category->term_id){
		$selected = "selected='selected'";	
			}else{
		$selected = "";		
		}
		echo"<option $selected value='". $category->term_id."'>". $category->name."</option>";
		}
?>
</select> 
    
<?php } ?>
<input name="services_categ_hidden" class="services_categ_hidden" type="hidden" value="<?php echo $options['services_categ_hidden'] ?>" />
</div>

    </td>
</tr>

<tr valign="top">
<th scope="row"><label for="services_adinfo">Services additional information</label></th>
<td>
<textarea class="code" style="width: 80%; font-size: 12px;" id="services_adinfo" rows="14" cols="60" name="services_adinfo">
<?php 
if ($options['services_adinfo']){
	echo $options['services_adinfo'];
} 
elseif ($options['services_adinfo'] == "") {echo "";}
else
{
	echo "<h4>Additional information</h4>
<p>
Lorem ipsum nostrud insolens mediocritatem at vel, an reque eligendi eleifend usu. Ne has iudico vocibus prodesset, mucius omittam erroribus at mei, puto eripuit accumsan id mel. Ut esse ferri mollis usu. Ea est omnesque consetetur, tollit constituam consectetuer qui ne. 
</p>
<p>
Affert intellegam sadipscing eu vix, sit tibique delicata eu. Ne has possim aliquam detraxit, quidam appareat id per. In clita malorum invidunt nec, utinam vivendum phaedrum qui at. Dicit iisque cu pri, eu scaevola mandamus reformidans ius. 
</p>";
}
?></textarea>
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