<?php
global $gw_options;
##############
#edit Option name:
$optionname = "homepage";
#############
$saved_optionname = get_current_theme()."_".$optionname;

$gw_options[$optionname] = get_option($saved_optionname);

############ Adding to the menu - always do this!
function options_homepage() 
{	
	global $top_level_basename, $optionpage_name;
  	$optionpage_top_level = get_current_theme()." Options";
  	$optionpage_name ="Homepage Options";
  	add_submenu_page($top_level_basename, $optionpage_name, $optionpage_name, 7, basename(__FILE__), 'gw_generate_homepage');
}
add_action('admin_menu', 'options_homepage');

############ Adding styles and script to the menu page - only do when we are on this page

if($_GET['page'] == basename(__FILE__))
{
	add_action('admin_head', 'admin_head_addition');	
}

function gw_generate_homepage()
{		
	$optionname = "homepage";
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
<h2>Homepage Options</h2>

<form method="post" action="">
<table class="form-table">

<tr valign="top">
  <th scope="row">Homepage Slider Categories</th>
  <td><br/>
  The Homepage Slider is populated with one or more categories of your choice. It is recommended you create a separate category for posts that you want to appear in slider.<br/>
 <br/>
<div class="multiple_box">
<noscript>Please enable javascript so that this feature will work correctly.<br/></noscript>
<?php

if($options['homepage_categ_hidden'] == "" || $options['homepage_categ_hidden'] == false) 
	{
		$options['homepage_categ_hidden'] = 1;
	}
	
for($i = 0; $i < $options['homepage_categ_hidden']; $i++)
{?>
	
 
<select class="postform multiply_me" id="homepage_categ_<?php echo $i; ?>" name="homepage_categ_<?php echo $i; ?>"> 
<option value="">Add new category?</option>  
<?php 
	$categories = get_categories('title_li=&orderby=name');
	foreach ($categories as $category){
		
		if ($options['homepage_categ_'.$i] == $category->term_id){
		$selected = "selected='selected'";	
			}else{
		$selected = "";		
		}
		echo"<option $selected value='". $category->term_id."'>". $category->name."</option>";
		}
?>
</select> 
    
<?php } ?>
<input name="homepage_categ_hidden" class="homepage_categ_hidden" type="hidden" value="<?php echo $options['homepage_categ_hidden'] ?>" />
</div>

    </td>
</tr>

<tr valign="top">
<th scope="row"><label for="slide_duration">Slider duration</label></th>
<td>
<input name="slide_duration" type="text" id="slide_duration" value="<?php if ($options['slide_duration']){echo $options['slide_duration'];}else{echo"4000";}?>" size="6" /><br/>
Enter fade duration in <strong>miliseconds</strong> here(numeric value only, please note: 4 seconds = 4000 miliseconds).
</td>
</tr>

<tr valign="top">
<th scope="row">Do you want to display the welcome area ?</th>
<td>
<br />

<label><input type="radio" name="wa_option" id="wa_true" value="1" <?php if ($options['wa_option'] == 1 || $options['wa_option'] == false){echo "checked = checked";}?>/> Yes</label>&nbsp;&nbsp;&nbsp;
<label><input type="radio" name="wa_option" id="wa_false" value="2" <?php if ($options['wa_option'] == 2){echo "checked = checked";}?>/> No</label><br/>
<br />
</td>
</tr>

<tr valign="top">
<th scope="row">Do you want to display the 2 boxes ?</th>
<td>
<br />

<label><input type="radio" name="tb_option" id="tb_true" value="1" <?php if ($options['tb_option'] == 1 || $options['tb_option'] == false){echo "checked = checked";}?>/> Yes</label>&nbsp;&nbsp;&nbsp;
<label><input type="radio" name="tb_option" id="tb_false" value="2" <?php if ($options['tb_option'] == 2){echo "checked = checked";}?>/> No</label><br/>
<br />
</td>
</tr>

<!-- start welcome area -->
<tr valign="top">
<th scope="row"><label for="home_welcome_title">Home Page welcome title:</label></th>
<td>
<input name="home_welcome_title" type="text" id="home_welcome_title" value="
<?php 
if ($options['home_welcome_title']){
	echo $options['home_welcome_title'];
} 
elseif ($options['home_welcome_title'] == "") {echo "";}
else
{
	echo "Welcome to our company";
}
?>
" size="70" maxlength="400" /><br/>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home_welcome_tagline">Home Page welcome tagline:</label></th>
<td>
<input name="home_welcome_tagline" type="text" id="home_welcome_tagline" value="
<?php 
if ($options['home_welcome_tagline']){
	echo $options['home_welcome_tagline'];
} 
elseif ($options['home_welcome_tagline'] == "") {echo "";}
else
{
	echo "We bring value, innovation and growth to your business";
}
?>
" size="70" maxlength="400" /><br/>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="home_welcome_text">Homepage welcome content:</label></th>
<td>
<textarea class="code" style="width: 80%; font-size: 12px;" id="home_welcome_text" rows="14" cols="60" name="home_welcome_text">
<?php 
if ($options['home_welcome_text']){
	echo $options['home_welcome_text'];
} 
elseif ($options['home_welcome_text'] == "") {echo "";}
else
{
	echo "<p>Ut dico exerci cum. Ipsum movet dolore sit ea, pri ea dicant mediocrem aliquando. Stet maiestatis ut pri, et vim melius legimus alienum. Nam nibh ipsum ad, pri dictas ornatus consequat te. Vel quem vidit posidonium in, brute dicunt maiorum vis te, mei veniam sanctus imperdiet ad.</p> 
	
<p>Ad officiis percipitur theophrastus quo, ubique impedit ancillae per eu, pri natum tritani copiosae in. Civibus molestie deseruisse mea an, sumo omittam adolescens has te. Atqui luptatum pro ei, his eu regione sensibus necessitatibus. Ne feugait consetetur temporibus nec, inani audiam interpretaris cu vis, qui aeque ril dissentiunt ea. Ut lorem choro aliquid vix, dolor partem bonorum duo in. Enim cetero luptatum usu ne, soluta invidunt signiferumque id ius, eos eius idque audiam eu.</p>";
}
?></textarea>
</td>
</tr>

<!-- start box 1 -->
<tr valign="top">
<th scope="row"><label for="left_box_title">Left box title:</label></th>
<td>
<input name="left_box_title" type="text" id="left_box_title" value="
<?php 
if ($options['left_box_title']){
	echo $options['left_box_title'];
} 
elseif ($options['left_box_title'] == "") {echo "";}
else
{
	echo "Services Overview";
}
?>
" size="70" maxlength="400" /><br/>
</td>
</tr>


<tr valign="top">
<th scope="row"><label for="left_box_tagline">Left box tagline:</label></th>
<td>
<input name="left_box_tagline" type="text" id="left_box_tagline" value="
<?php 
if ($options['left_box_tagline']){
	echo $options['left_box_tagline'];
} 
elseif ($options['left_box_tagline'] == "") {echo "";}
else
{
	echo "Our services at a glance";
}
?>
" size="70" maxlength="400" /><br/>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="left_box_text">Left box content:</label></th>
<td>
<textarea class="code" style="width: 60%; font-size: 12px;" id="left_box_text" rows="14" cols="60" name="left_box_text">
<?php 
if ($options['left_box_text']){
	echo $options['left_box_text'];
} 
elseif ($options['left_box_text'] == "") {echo "";}
else {
	echo "<p>Phasellus ipsum nulla, dignissim condimentum mattis sit amet, feugiat a nulla.</p> 
<ul class='h-services-list'>
<li><a href='#'>Corporate Publishing</a></li>
<li><a href='#'>Interactive and Onscreen Production</a></li>
<li><a href='#'>Advertising</a></li>
<li><a href='#'>Event Management</a></li>
<li><a href='#'>Integrated Communications</a></li>                                
<li><a href='#'>Public Relations</a></li>
</ul>";
}
?></textarea>
</td>
</tr>

<!-- start box 2 -->
<tr valign="top">
<th scope="row"><label for="right_box_title">Right box title:</label></th>
<td>
<input name="right_box_title" type="text" id="right_box_title" value="
<?php 
if ($options['right_box_title']){
	echo $options['right_box_title'];
} 
elseif ($options['right_box_title'] == "") {echo "";}
else
{
	echo "Featured case study";
}
?>
" size="70" maxlength="400" /><br/>
</td>
</tr>


<tr valign="top">
<th scope="row"><label for="right_box_tagline">Right box welcome tagline:</label></th>
<td>
<input name="right_box_tagline" type="text" id="right_box_tagline" value="
<?php 
if ($options['right_box_tagline']){
	echo $options['right_box_tagline'];
} 
elseif ($options['right_box_tagline'] == "") {echo "";}
else
{
	echo "Investments and advertising campaigns";
}
?>
" size="70" maxlength="400" /><br/>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="right_box_text">Right box content:</label></th>
<td>
<textarea class="code" style="width: 60%; font-size: 12px;" id="right_box_text" rows="14" cols="60" name="right_box_text">
<?php 
if ($options['right_box_text']){
	echo $options['right_box_text'];
} 
elseif ($options['right_box_text'] == "") {echo "";}
else
{
	echo "<p>Phasellus ipsum nulla, dignissim condimentum mattis sit amet, feugiat a nulla. Nulla molestie pellentesque lorem, eu lacinia sem pellentesque ut. Aenean tempor ligula ut massa feugiat quis lacinia sem sollicitudin.</p> 
	
<p>Fusce mattis blandit libero a imperdiet. Sed lorem quam, imperdiet eu congue eget, pretium eget justo.</p>
<p>Est eu eloquentiam theophrastus suscipiantur.</p>";
}
?></textarea>
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