<?php
global $gw_options;
##############
#edit Option name:
$optionname = "fullwidth";
#############
$saved_optionname = get_current_theme()."_".$optionname;

$gw_options[$optionname] = get_option($saved_optionname);

############ Adding to the menu - always do this!
function options_fullwidth() 
{	
	global $top_level_basename, $optionpage_name;
  	$optionpage_top_level = get_current_theme()." Options";
  	$optionpage_name ="Fullwidth Options";
  	add_submenu_page($top_level_basename, $optionpage_name, $optionpage_name, 7, basename(__FILE__), 'gw_generate_fullwidth');
}
add_action('admin_menu', 'options_fullwidth');

############ Adding styles and script to the menu page - only do when we are on this page

if($_GET['page'] == basename(__FILE__))
{
	add_action('admin_head', 'admin_head_addition');	
}

function gw_generate_fullwidth()
{		
	$optionname = "fullwidth";
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
<h2>Fullwidth Page Options</h2>

<form method="post" action="">
<table class="form-table">

<tr valign="top">
<th scope="row">Do you want to display the age title and paragraph ?</th>
<td>
<br />

<label><input type="radio" name="fwi_option" id="fwi_true" value="1" <?php if ($options['fwi_option'] == 1 || $options['fwi_option'] == false){echo "checked = checked";}?>/> Yes</label>&nbsp;&nbsp;&nbsp;
<label><input type="radio" name="fwi_option" id="fwi_false" value="2" <?php if ($options['fwi_option'] == 2){echo "checked = checked";}?>/> No</label><br/>
<br />
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="fullwidth_paragraph_title">Fullwidth page paragraph title</label></th>
<td>
<input name="fullwidth_paragraph_title" type="text" id="fullwidth_paragraph_title" value="<?php if ($options['fullwidth_paragraph_title']){echo $options['fullwidth_paragraph_title'];}?>" size="70" maxlength="255" /><br/>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="fullwidth_paragraph">Fullwidth page paragraph description</label></th>
<td>
<textarea class="code" style="width: 80%; font-size: 12px;" id="fullwidth_paragraph" rows="10" cols="60" name="fullwidth_paragraph">
<?php if ($options['fullwidth_paragraph']){echo $options['fullwidth_paragraph'];}?>
</textarea>
</td>
</tr>

</table>

<p class="submit">
    <input id="gw_options_save" type="hidden" value="1" name="gw_options_save" />
        
        <input id="hp_exist" type="hidden" value="10" name="hp_exist" />
        
    <input type="submit" name="Submit" value="Save Changes" />
</p>

</form>

</div>

<?php
}
?>