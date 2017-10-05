<?php
global $gw_options;
##############
#edit Option name:
$optionname = "contact";
#############
$saved_optionname = get_current_theme()."_".$optionname;

$gw_options[$optionname] = get_option($saved_optionname);

############ Adding to the menu - always do this!
function options_contact() 
{	
	global $top_level_basename, $optionpage_name;
  	$optionpage_top_level = get_current_theme()." Options";
  	$optionpage_name ="Contact Options";
  	add_submenu_page($top_level_basename, $optionpage_name, $optionpage_name, 7, basename(__FILE__), 'gw_generate_contact');
}
add_action('admin_menu', 'options_contact');

############ Adding styles and script to the menu page

if($_GET['page'] == basename(__FILE__))
{
	add_action('admin_head', 'admin_head_addition');	
}

function gw_generate_contact()
{		
	$optionname = "contact";
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
<h2>Contact Options</h2>

<form method="post" action="">
<table class="form-table">
<tr>
  <th scope="row">Media Consult Contact Form</th>
  <td><br/>
  The page you choose from the following dropdown will display your contact form.<br/>

<select class="postform" id="contact_page" name="contact_page"> 
<option value="">Select Page</option>  
<?php 
	$pages = get_pages('title_li=&orderby=name');
	foreach ($pages as $page){
		
		if ($options['contact_page'] == $page->ID){
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
<th scope="row"><label for="contact_mail">Email address</label></th>
<td>
Enter the email address where mails will be sent to. (default email is <?php echo get_option('admin_email'); ?>)<br/>
<input name="contact_mail" type="text" id="contact_mail" value="<?php if ($options['contact_mail']){echo $options['contact_mail'];}else{echo get_option('admin_email');}?>" size="70" maxlength="255" /><br/>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="contact_paragraph_title">Contact paragraph title</label></th>
<td>
<input name="contact_paragraph_title" type="text" id="contact_paragraph_title" value="<?php if ($options['contact_paragraph_title']){echo $options['contact_paragraph_title'];}?>" size="70" maxlength="255" /><br/>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="contact_paragraph">Contact paragraph description</label></th>
<td>
<textarea class="code" style="width: 80%; font-size: 12px;" id="contact_paragraph" rows="10" cols="60" name="contact_paragraph">
<?php if ($options['contact_paragraph']){echo $options['contact_paragraph'];}?>
</textarea>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="contact_map_small">Small map link</label></th>
<td>
<input name="contact_map_small" type="text" id="contact_map_small" value="<?php if ($options['contact_map_small']){echo $options['contact_map_small'];}?>" size="100" maxlength="255" /><br/>
Enter the link to the small map image.
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="contact_map_big">Big map link</label></th>
<td>
<input name="contact_map_big" type="text" id="contact_map_big" value="<?php if ($options['contact_map_big']){echo $options['contact_map_big'];}?>" size="100" maxlength="255" /><br/>
Enter the link to the bigger map image.
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="address">Contact address</label></th>
<td>
<textarea class="code" style="width: 80%; font-size: 12px;" id="contact_address" rows="14" cols="60" name="contact_address">
<?php 
if ($options['contact_address']){
	echo $options['contact_address'];
} 
elseif ($options['contact_address'] == "") {echo "";}
else
{
	echo "<h3>Address</h3>            
<address>
	<span>
		27 Tollit essent vituperata<br />
		UK, London
	</span>
	<span>
		Phone: 123 456 789<br />
		Fax: 123 456 799<br />
		Website: <a href='#'>http://mediaconsult.com</a><br />
		Email: <a href='#'>info@mediaconsult.com</a> 
	</span>
</address>";
}
?>
</textarea><br />
Write your contact details here.
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