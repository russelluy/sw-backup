<?php
global $gw_options;
##############
#edit Option name:
$optionname = "portfolio";
#############
$saved_optionname = get_current_theme()."_".$optionname;

$gw_options[$optionname] = get_option($saved_optionname);

############ Adding to the menu - always do this!
function options_portfolio() 
{	
	global $top_level_basename, $optionpage_name;
  	$optionpage_top_level = get_current_theme()." Options";
  	$optionpage_name ="Portfolio Options";
  	add_submenu_page($top_level_basename, $optionpage_name, $optionpage_name, 7, basename(__FILE__), 'gw_generate_portfolio');
}
add_action('admin_menu', 'options_portfolio');

############ Adding styles and script to the menu page - only do when we are on this page

if($_GET['page'] == basename(__FILE__))
{
	add_action('admin_head', 'admin_head_addition');	
}

function gw_generate_portfolio()
{		
	$optionname = "portfolio";
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
<h2>Portfolio Options</h2>

<form method="post" action="">
<table class="form-table">
<tr>
  <th scope="row">Media Consult Portfolio</th>
  <td><br/>
  The page you choose from the following dropdown will display your portfolio.<br/>

<select class="postform" id="folio_page" name="folio_page"> 
<option value="">Select Page</option>  
<?php 
	$pages = get_pages('title_li=&orderby=name');
	foreach ($pages as $page){
		
		if ($options['folio_page'] == $page->ID){
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
<th scope="row"><label for="portfolio_paragraph_title">Portfolio paragraph title</label></th>
<td>
<input name="portfolio_paragraph_title" type="text" id="portfolio_paragraph_title" value="<?php if ($options['portfolio_paragraph_title']){echo $options['portfolio_paragraph_title'];}?>" size="70" maxlength="255" /><br/>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="portfolio_paragraph">Portfolio paragraph description</label></th>
<td>
<textarea class="code" style="width: 80%; font-size: 12px;" id="portfolio_paragraph" rows="10" cols="60" name="portfolio_paragraph">
<?php if ($options['portfolio_paragraph']){echo $options['portfolio_paragraph'];}?>
</textarea>
</td>
</tr>

<tr valign="top">
  <th scope="row">Portfolio Categories</th>
  <td><br/>
  The portfolio page is populated with the following categories:<br/>
 <br/>
<div class="multiple_box">
<noscript>Please enable javascript so that this feature will work correctly.<br/></noscript>
<?php

if($options['port_categ_hidden'] == "" || $options['port_categ_hidden'] == false) 
	{
		$options['port_categ_hidden'] = 1;
	}
	
for($i = 0; $i < $options['port_categ_hidden']; $i++)
{?>
	
 
<select class="postform multiply_me" id="port_categ_<?php echo $i; ?>" name="port_categ_<?php echo $i; ?>"> 
<option value="">Add new category?</option>  
<?php 
	$categories = get_categories('title_li=&orderby=name');
	foreach ($categories as $category){
		
		if ($options['port_categ_'.$i] == $category->term_id){
		$selected = "selected='selected'";	
			}else{
		$selected = "";		
		}
		echo"<option $selected value='". $category->term_id."'>". $category->name."</option>";
		}
?>
</select> 
    
<?php } ?>
<input name="port_categ_hidden" class="port_categ_hidden" type="hidden" value="<?php echo $options['port_categ_hidden'] ?>" />
</div>

    </td>
</tr>

<tr valign="top">
<th scope="row"><label for="item_pp">Number of entries per page</label></th>
<td><br/>
How many items do you want to display per page? (default is 9)<br />
<input name="port_pp" type="text" id="port_pp" value="<?php if ($options['port_pp']){echo $options['port_pp'];}else{echo"9";}?>" size="4" maxlength="4" /> 
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