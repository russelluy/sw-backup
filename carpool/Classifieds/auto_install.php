<?php
set_time_limit(0);
global  $wpdb;
//require_once (TEMPLATEPATH . '/delete_data.php');
$dummy_image_path = get_template_directory_uri().'/images/dummy/';

//require_once (TEMPLATEPATH . '/delete_data.php');
/////////////// WIDGET SETTINGS START ///////////////
$sidebars_widgets = get_option('sidebars_widgets');  //collect widget informations
////widget 1 start//
$feature_post_info[1] = array(
					"title"				=>	'Featured Classified',
					"post_number"		=>	'5',
					"post_link"			=>	'',
					);
$feature_post_info['_multiwidget'] = '1';

update_option('widget_widget_posts1',$feature_post_info);
$feature_post_info = get_option('widget_widget_posts1');
krsort($feature_post_info);
foreach($feature_post_info as $key1=>$val1)
{
	$feature_post_info_key = $key1;
	if(is_int($feature_post_info_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-1"] = array('widget_posts1-'.$feature_post_info_key);
////widget 1 end//
////widget 2 start//
$link_info[1] = array(
					"images"			=>	1,
					"name"				=>	1,
					"description"		=>	0,
					"ratingrating"		=>	0,
					"category"			=>	0,
					);
$link_info['_multiwidget'] = '1';

update_option('widget_links',$link_info);
$link_info = get_option('widget_links');
krsort($link_info);
foreach($link_info as $key1=>$val1)
{
	$links_info_key = $key1;
	if(is_int($links_info_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-2"] = array('links-'.$links_info_key);
////widget 2 end//
////widget 3 start//
$categories_info[1] = array(
					"title"				=>	'Categories',
					"count"				=>	'0',
					"hierarchical"		=>	'0',
					"dropdown"			=>	'0',
					);
$categories_info['_multiwidget'] = '1';

update_option('widget_categories',$categories_info);
$categories_info = get_option('widget_categories');
krsort($categories_info);
foreach($categories_info as $key1=>$val1)
{
	$cat_info_key = $key1;
	if(is_int($cat_info_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-3"] = array('categories-'.$cat_info_key);
////widget 3 end//
////widget 4 start//
$text_widget_info[1] = array(
					"title"				=>	'About Us',
					"desc"				=>	'<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis. <p>',
					);
$text_widget_info['_multiwidget'] = '1';

update_option('widget_widget_Location',$text_widget_info);
$text_widget_info = get_option('widget_widget_Location');
krsort($text_widget_info);
foreach($text_widget_info as $key1=>$val1)
{
	$text_widget_info_key = $key1;
	if(is_int($text_widget_info_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-4"] = array('widget_location-'.$text_widget_info_key);
////widget 4 end//		
////widget 5 start//
$popular_classified_info[1] = array(
					"title"			=>	'',
					"name"			=>	'Popular Classified',
					"number"		=>	'5',
					);
$popular_classified_info['_multiwidget'] = '1';

update_option('widget_widget_popularposts',$popular_classified_info);
$popular_widget_info_info = get_option('widget_widget_popularposts');
krsort($popular_widget_info_info);
foreach($popular_widget_info_info as $key=>$val)
{
	$popular_widget_info_key = $key;
	if(is_int($popular_widget_info_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-5"] = array('pt-popular-classifieds');
////widget 5 end//
////widget 6 start//
$subscribe_info[1] = array(
					"title"			=>	'Subscribe',
					"id"			=>	'templatic/eKPs',
					"text"			=>	'If you\'d like to stay updated with all our latest news please enter your e-mail address here ',
					);
$subscribe_info['_multiwidget'] = '1';

update_option('widget_widget_subscribewidget',$subscribe_info);
$subscribe_info = get_option('widget_widget_subscribewidget');
krsort($subscribe_info);
foreach($subscribe_info as $key=>$val)
{
	$subscribe_info_key = $key;
	if(is_int($subscribe_info_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-6"] = array('pt-subscribe');
////widget 6 end//
////widget 7 start//
$home_advt_info = array();
//$home_advt_info = get_option('widget_widget_home_advt');
$home_advt_info[1] = array(
					"title"			=>	'Advertise Banner Title',
					"desc"			=>	'<p>List your business for free and get exposure for your business. Simply create an account, create a listing and thats it !</p><ul><li>Lorem ipsum dolor sit amet, consectetuer </li><li>Adipiscing elit. Praesent aliquam,  justo </li><li>Convallis luctus rutrum, erat nulla fermentum </li></ul>',
					"link_title"			=>	'Post Classified &raquo;',
					);
$home_advt_info['_multiwidget'] = '1';

update_option('widget_widget_home_advt',$home_advt_info);
$home_advt_info = get_option('widget_widget_home_advt');
krsort($home_advt_info);
foreach($home_advt_info as $key=>$val)
{
	$home_advt_key = $key;
	if(is_int($home_advt_key))
	{
		break;
	}
}
$sidebars_widgets["sidebar-9"] = array("widget_home_advt-$home_advt_key");
////widget 7 end//
update_option('sidebars_widgets',$sidebars_widgets);  //save widget iformations
/////////////// WIDGET SETTINGS END ///////////////
/////////////// GENERAL SETTINGS START ///////////////
$mysite_general_settings = get_option('mysite_general_settings');
if(!$mysite_general_settings || ($mysite_general_settings && count($mysite_general_settings)==0))
{
	$settingsinfo = array(
						"currency"				=> 'USD',
						"currencysym"			=> '$',
						"site_email"			=>  get_option('admin_email'),
						"site_email_name"		=>	get_option('blogname'),
						"paypal_merchantid"		=>	'paypal_merchant_id@gmail.com',
						"ads_days"				=>	30,
						"ads_price"				=>	10,
						"feature_ads_price"		=>	5,		
						"max_ads_char"			=>	"1000",
						"approve_ads"			=>	"publish",
						"imagepath"				=>	"",
						"google_map_key"		=>	"ABQIAAAACJaMD6rQF-OxJkIN_3y66RT6YE6PgXjAxO6sEDi1JEKzHm1n-xQBwJLjc28YFQR8xn8VLh1DAtStNA",
						//"is_send_from_email"	=>	'0',				
						);
	update_option("mysite_general_settings",$settingsinfo);
}
/////////////// GENERAL SETTINGS END ///////////////
//====================================================================================//
/////////////// TERMS START ///////////////
require_once(ABSPATH.'wp-admin/includes/taxonomy.php');
$category_array = array('Blog','Auto','Business','Buy &amp; Sell','Computer','Construction','Education','Employment','Featured','Finance','Health &amp; Beauty, Immigration','Industrial & Agricultural','Matrimonty','Personal','Real Estate','Rent/Hire','Services','Special Deals','Hotels');
insert_category($category_array);
function insert_category($category_array)
{
	for($i=0;$i<count($category_array);$i++)
	{
		$parent_catid = 0;
		if(is_array($category_array[$i]))
		{
			$cat_name_arr = $category_array[$i];
			for($j=0;$j<count($cat_name_arr);$j++)
			{
				$catname = $cat_name_arr[$j];
				$last_catid = wp_create_category( $catname, $parent_catid);
				if($j==0)
				{
					$parent_catid = $last_catid;
				}
			}
			
		}else
		{
			$catname = $category_array[$i];
			wp_create_category( $catname, $parent_catid);
		}
	}
}

/////////////// TERMS END ///////////////
//====================================================================================//
$post_info = array();
////post start 1///
$image_array = array();
$post_meta = array();
$post_meta = array(
				   "tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Sample Lorem Ipsum Post',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using "Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for "lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Blog'),
					"post_tags"		=>	array('tag')
					);
////post end///
////post start 2///
$image_array = array();
$post_meta = array();
$post_meta = array(
				   "tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'another sample post',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using "Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for "lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Blog'),
					"post_tags"		=>	array('Friday')
					);
////post end///
////post start 3///
$image_array = array();
$post_meta = array();
$post_meta = array(
				   "tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Sample Blog Post',
					"post_content"	=>	'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Blog'),
					"post_tags"		=>	array('Friday')
					);
////post end///
////post start 4///
$image_array = array();
$post_meta = array();
$post_meta = array(
				   "tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'What is Lorem Ipsum?',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using "Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for "lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Blog'),
					"post_tags"		=>	array('Art')
					);
////post end///
////post start 5///
$image_array = array();
$post_meta = array();
$post_meta = array(
				  "tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Letraset sheets',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using "Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for "lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Blog'),
					"post_tags"		=>	array('Exhibition')
					);
////post end///
////post start 6///
$image_array = array();
$post_meta = array();
$post_meta = array(
				  "tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Why do we use it?',
					"post_content"	=>	'What is Lorem Ipsum?<br><br>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
Why do we use it?<br><br>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using "Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for "lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
<br><br>Where does it come from?',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Blog'),
					"post_tags"		=>	array('Festival')
					);
////post end///
////post start 7///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				   "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img1.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img4.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'The Hypocrisy of Civilized Society 18 ',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Auto'),
					"post_tags"		=>	array('Automobiles')
					);
////post end///
////post start 8///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				  "post_price"				=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img4.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Reception',
					"post_content"	=>	'Dorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Auto'),
					"post_tags"		=>	array('tag1','tag2','tag3')
					);
////post end///
////post start 9///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				   "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img3.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img4.jpg,'.$dummy_image_path.'img1.jpg,',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Intellectual and Moral Education ',
					"post_content"	=>	'Dolor Site amet Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Auto'),
					"post_tags"		=>	array('Sampletag1')
					);
////post end///
////post start 10///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				  "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img4.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Parodies of Popular Romance Novels',
					"post_content"	=>	'Dolor Site amet Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Auto'),
					"post_tags"		=>	array('Sampletag1')
					);
////post end///



/// Attractions ////post start 1///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				  "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	' Conflict between civilization and natural life ',
					"post_content"	=>	'Dolor Site amet Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Auto','Feature'),
					"post_tags"		=>	array('Tags','Sample Tags')
					);
////post end///
/// Attractions ////post start 2///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				  "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img1.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img4.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'The Hypocrisy of Civilized Society 1',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Business'),
					"post_tags"		=>	array('Civilized','Sample Tags')
					);
////post end///
/// Attractions ////post start 3///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				   "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img4.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Reception1',
					"post_content"	=>	'Dorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Business'),
					"post_tags"		=>	array('wood','garden')
					);
////post end///
/// Attractions ////post start 4///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				   "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img3.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img4.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Intellectual and Moral Education 1 ',
					"post_content"	=>	'Dolor Site amet Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Business'),
					"post_tags"		=>	array('wood','garden')
					);
////post end///
/// Attractions ////post start 5///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				   "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img4.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Parodies of Popular Romance Novels 1',
					"post_content"	=>	'Dolor Site amet Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Business','Feature'),
					"post_tags"		=>	array('Tag','Center')
					);
////post end///
/// Attractions ////post start 6///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				   "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	' Conflict between civilization and natural life 1 ',
					"post_content"	=>	'Dolor Site amet Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Business'),
					"post_tags"		=>	array('sample','tags')
					);
////post end///
/// Attractions ////post start 7///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				   "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img1.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img4.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'The Hypocrisy of Civilized Society 2',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Buy &amp; Sell'),
					"post_tags"		=>	array('Museum')
					);
////post end///
/// Attractions ////post start 8///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				  "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img1.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img4.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'The Hypocrisy of Civilized Society 4',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Buy &amp; Sell','Feature'),
					"post_tags"		=>	array('Tag1')
					);
////post end///
/// Attractions ////post start 9///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				  "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img4.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Reception3',
					"post_content"	=>	'Dorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Buy &amp; Sell','Feature'),
					"post_tags"		=>	array('')
					);
////post end///
/// Attractions ////post start 10///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				   "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img3.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img4.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Intellectual and Moral Education 3',
					"post_content"	=>	'Dolor Site amet Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Buy &amp; Sell','Feature'),
					"post_tags"		=>	array('Museum')
					);
////post end///
/// Hotels ////post start 1///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				   "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img1.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img4.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'The Hypocrisy of Civilized Society 5',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Buy &amp; Sell','Feature'),
					"post_tags"		=>	array('')
					);
////post end///
/// Hotels ////post start 2///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				   "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img4.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Reception 4',
					"post_content"	=>	'Dorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Computer'),
					"post_tags"		=>	array('')
					);
////post end///
/// Hotels ////post start 3///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				  "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img3.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img4.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Intellectual and Moral Education 4',
					"post_content"	=>	'Dolor Site amet Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Hotels'),
					"post_tags"		=>	array('')
					);
////post end///
/// Hotels ////post start 4///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				  "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img1.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img4.jpg',
					"active_days"			=> 60,

					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'The Hypocrisy of Civilized Society 6',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Hotels','Feature'),
					"post_tags"		=>	array('')
					);
////post end///
/// Hotels ////post start 4///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				   "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img4.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Reception 5',
					"post_content"	=>	'Dorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Hotels'),
					"post_tags"		=>	array('')
					);
////post end///
/// Hotels ////post start 5///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				  "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img3.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img4.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Intellectual and Moral Education 5',
					"post_content"	=>	'Dolor Site amet Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Hotels','Employment'),
					"post_tags"		=>	array('Employment')
					);
////post end///
/// Hotels ////post start 6///
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				  "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img1.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img4.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'The Hypocrisy of Civilized Society 7',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Hotels','Employment'),
					"post_tags"		=>	array('')
					);
////post end///
/// Hotels ////post start 7//
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				   "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img4.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Reception 6',
					"post_content"	=>	'Dorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Hotels','Employment'),
					"post_tags"		=>	array('')
					);
////post end///
/// Hotels ////post start 8//
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				   "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img3.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img4.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Intellectual and Moral Education 6',
					"post_content"	=>	'Dolor Site amet Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Hotels'),
					"post_tags"		=>	array('')
					);
////post end///
/// Hotels ////post start 9//
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				   "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img1.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img4.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'The Hypocrisy of Civilized Society 8',
					"post_content"	=>	'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Hotels','Employment'),
					"post_tags"		=>	array('')
					);
////post end///
/// Hotels ////post start 10//
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				  "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img2.jpg,'.$dummy_image_path.'img3.jpg,'.$dummy_image_path.'img4.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Reception 7',
					"post_content"	=>	'Dorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Hotels','Employment','Feature'),
					"post_tags"		=>	array('')
					);
////post end///
/// Restaurants ////post start 1//
$image_array = array();
$image_array[] = 'dummy/img3.jpg';
$image_array[] ='dummy/img2.jpg';
$image_array[] ='dummy/img4.jpg';
$image_array[] ='dummy/img1.jpg';
$post_meta = array();
$post_meta = array(
				   "post_price"			=> 10,	
					"post_location"			=> 'Surat,Gujarat,India',		
					"owner_name"			=> 'owner name',		
					"owner_email"			=> 'info@mycompany.com',		
					"owner_phone"			=> '+91 123 4785123',		
					"post_url"				=> 'http://www.ycompany.com',		
					"post_images"			=> $dummy_image_path.'img3.jpg,'.$dummy_image_path.'img2.jpg,'.$dummy_image_path.'img4.jpg,'.$dummy_image_path.'img1.jpg',
					"active_days"			=> 60,
					"tl_dummy_content"	=> '1',
				);
$post_info[] = array(
					"post_title"	=>	'Intellectual and Moral Education 7',
					"post_content"	=>	'Dolor Site amet Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam. Nam blandit lacus. Quisque ornare risus quis ligula.Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy.',
					"post_meta"		=>	$post_meta,
					"post_image"	=>	$image_array,
					"post_category"	=>	array('Finance','Feature'),
					"post_tags"		=>	array('Sample Tag1')
					);

insert_posts($post_info);
function insert_posts($post_info)
{
	global $wpdb,$current_user;
	for($i=0;$i<count($post_info);$i++)
	{
		$post_title = $post_info[$i]['post_title'];
		$post_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_title like \"$post_title\" and post_type='post' and post_status in ('publish','draft')");
		if(!$post_count)
		{
			$post_info_arr = array();
			$catids_arr = array();
			$my_post = array();
			$post_info_arr = $post_info[$i];
			if($post_info_arr['post_category'])
			{
				for($c=0;$c<count($post_info_arr['post_category']);$c++)
				{
					$catids_arr[] = get_cat_ID($post_info_arr['post_category'][$c]);
				}
			}else
			{
				$catids_arr[] = 1;
			}
			$my_post['post_title'] = $post_info_arr['post_title'];
			$my_post['post_content'] = $post_info_arr['post_content'];
			if($post_info_arr['post_author'])
			{
				$my_post['post_author'] = $post_info_arr['post_author'];
			}else
			{
				$my_post['post_author'] = 1;
			}
			$my_post['post_status'] = 'publish';
			$my_post['post_category'] = $catids_arr;
			$my_post['tags_input'] = $post_info_arr['post_tags'];
			$last_postid = wp_insert_post( $my_post );
			$post_meta = $post_info_arr['post_meta'];
			if($post_meta)
			{
				foreach($post_meta as $mkey=>$mval)
				{
					update_post_meta($last_postid, $mkey, $mval);
				}
			}
			
			$post_image = $post_info_arr['post_image'];			
			if($post_image)
			{
				for($m=0;$m<count($post_image);$m++)
				{
					$menu_order = $m+1;
					$image_name_arr = explode('/',$post_image[$m]);
					$img_name = $image_name_arr[count($image_name_arr)-1];
					$img_name_arr = explode('.',$img_name);
					$post_img = array();
					$post_img['post_title'] = $img_name_arr[0];
					$post_img['post_status'] = 'attachment';
					$post_img['post_parent'] = $last_postid;
					$post_img['post_type'] = 'attachment';
					$post_img['post_mime_type'] = 'image/jpeg';
					$post_img['menu_order'] = $menu_order;
					$last_postimage_id = wp_insert_post( $post_img );
					update_post_meta($last_postimage_id, '_wp_attached_file', $post_image[$m]);					
					$post_attach_arr = array(
										"width"	=>	580,
										"height" =>	480,
										"hwstring_small"=> "height='150' width='150'",
										"file"	=> $post_image[$m],
										//"sizes"=> $sizes_info_array,
										);
					
					wp_update_attachment_metadata( $last_postimage_id, $post_attach_arr );
				}
			}
		}
	}
}

/////////////// Design Settings START ///////////////
$blog_cat_name = 'Blog';
$blog_cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name=\"$blog_cat_name\"");
update_option("cat_exclude_$blog_cat_id",$blog_cat_id);
update_option("ptthemes_breadcrumbs",'true');
update_option("ptthemes_add_to_cart_button_position",'Below Description');
$feature_cat_name = 'Feature';
//$feature_cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name=\"$feature_cat_name\"");
update_option("ptthemes_feature_catid","$feature_cat_name");
update_option("ptthemes_index_page_settings",'index2.php');
update_option("ptthemes_detail_show_email",'no');

/////////////// Design Settings END ///////////////

function set_post_tag($pid,$post_tags)
{
	global $wpdb;
	$post_tags_arr = explode(',',$post_tags);
	for($t=0;$t<count($post_tags_arr);$t++)
	{
		$posttag = $post_tags_arr[$t];
		$term_id = $wpdb->get_var("SELECT t.term_id FROM $wpdb->terms t join $wpdb->term_taxonomy tt on tt.term_id=t.term_id where t.name=\"$posttag\" and tt.taxonomy='post_tag'");
		if($term_id == '')
		{
			$srch_arr = array("'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_');
			$replace_arr = array('','','','','','','','','','','','','','','','','','','','',',','');
			$posttagslug = str_replace($srch_arr,$replace_arr,$posttag);
			$termsql = "insert into $wpdb->terms (name,slug) values (\"$posttag\",\"$posttagslug\")";
			$wpdb->query($termsql);
			$last_termsid = $wpdb->get_var("SELECT max(term_id) as term_id FROM $wpdb->terms");
		}else
		{
			$last_termsid = $term_id;
		}
		$term_taxonomy_id = $wpdb->get_var("SELECT term_taxonomy_id FROM $wpdb->term_taxonomy where term_id=\"$last_termsid\" and taxonomy='post_tag'");
		if($term_taxonomy_id=='')
		{
			$termpost = "insert into $wpdb->term_taxonomy (term_id,taxonomy,count) values (\"$last_termsid\",'post_tag',1)";
			$wpdb->query($termpost);
			$term_taxonomy_id = $wpdb->get_var("SELECT term_taxonomy_id FROM $wpdb->term_taxonomy where term_id=\"$last_termsid\" and taxonomy='post_tag'");
		}else
		{
			$termpost = "update $wpdb->term_taxonomy set count=count+1 where term_taxonomy_id=\"$term_taxonomy_id\"";
			$wpdb->query($termpost);
		}
		$termsql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$pid\",\"$term_taxonomy_id\")";
		$wpdb->query($termsql);
	}
}
function set_post_info_autorun($post_info_arr)
{
	if(count($post_info_arr)>0)
	{
		global $last_tt_id,$feature_cat_name,$post_author,$wpdb;
		for($p=0;$p<count($post_info_arr);$p++)
		{
			$post_title = $post_info_arr[$p]['post_title'];
			$post_content = $post_info_arr[$p]['post_content'];
			$post_date = date('Y-m-d H:s:i');
			$post_IDs = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like \"$post_title\" and post_type='post'");
			if($post_IDs==0)
			{
				$post_name = strtolower(str_replace(array("'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_'),array('','','','','','','','','','','','','','','','','','','','',',',''),$post_title));
				$post_name_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_name like \"$post_name%\" and post_type='post'");
				if($post_name_count>0)
				{
					$post_name = $post_name.'-'.($post_name_count+1);
				}
				$post_sql = "insert into $wpdb->posts (post_author,post_date,post_date_gmt,post_content,post_title,post_name) values (\"$post_author\", \"$post_date\", \"$post_date\", \"$post_content\", \"$post_title\", \"$post_name\")";
				$wpdb->query($post_sql);
				$last_post_id = $wpdb->get_var("SELECT max(ID) FROM $wpdb->posts");
				$guid = get_option('siteurl')."/?p=$last_post_id";
				$guid_sql = "update $wpdb->posts set guid=\"$guid\" where ID=\"$last_post_id\"";
				$wpdb->query($guid_sql);
				if($post_info_arr[$p]['post_meta'])
				{
					foreach($post_info_arr[$p]['post_meta'] as $mkey=>$mval)
					{
						update_post_meta( $last_post_id, $mkey, $mval );
					}
				}
				update_post_meta( $last_post_id, 'pt_dummy_content', 1 );
				if($post_info_arr[$p]['post_tags'])
				{
					set_post_tag($last_post_id,$post_info_arr[$p]['post_tags']);
				}
				$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$last_tt_id\")";
				$wpdb->query($ter_relation_sql);
				$post_feature = $post_info_arr[$p]['post_feature'];
				$feature_cat_id = $wpdb->get_var("SELECT term_id FROM $wpdb->terms where name=\"$feature_cat_name\"");
				
				if($post_feature && $feature_cat_id)
				{
					$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$feature_cat_id\")";
					$wpdb->query($ter_relation_sql);
					$tt_update_sql = "update $wpdb->term_taxonomy set count=count+1 where term_id=\"$feature_cat_id\"";
					$wpdb->query($tt_update_sql);
				}
			}
		}
	}
}
$pages_array = array('Contact','Pages1','Page2');
$page_info_arr = array();
$page_info_arr['Contact'] = '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.
</p><p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>';
$page_info_arr['Pages1'] = '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.
</p><p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>';
$page_info_arr['Page2'] = '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.
</p><p>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>';

set_page_info_autorun($pages_array,$page_info_arr);

function set_page_info_autorun($pages_array,$page_info_arr_arg)
{
	global $post_author,$wpdb;
	$last_tt_id = 1;
	if(count($pages_array)>0)
	{
		$page_info_arr = array();
		for($p=0;$p<count($pages_array);$p++)
		{
			if(is_array($pages_array[$p]))
			{
				for($i=0;$i<count($pages_array[$p]);$i++)
				{
					$page_info_arr1 = array();
					$page_info_arr1['post_title'] = $pages_array[$p][$i];
					$page_info_arr1['post_content'] = $page_info_arr_arg[$pages_array[$p][$i]];
					$page_info_arr1['post_parent'] = $pages_array[$p][0];
					$page_info_arr[] = $page_info_arr1;
				}
			}
			else
			{
				$page_info_arr1 = array();
				$page_info_arr1['post_title'] = $pages_array[$p];
				$page_info_arr1['post_content'] = $page_info_arr_arg[$pages_array[$p]];
				$page_info_arr1['post_parent'] = '';
				$page_info_arr[] = $page_info_arr1;
			}
		}
		
		if($page_info_arr)
		{
			for($j=0;$j<count($page_info_arr);$j++)
			{
				$post_title = $page_info_arr[$j]['post_title'];
				$post_content = $page_info_arr[$j]['post_content'];
				$post_parent = $page_info_arr[$j]['post_parent'];
				if($post_parent)
				{
					$post_parent_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like \"$post_parent\" and post_type='page'");
				}else
				{
					$post_parent_id = 0;
				}
				$post_date = date('Y-m-d H:s:i');
				$post_name = strtolower(str_replace(array("'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," ",';',',','_'),array('','','','','','','','','','','','','','','','','','','','',',',''),$post_title));
				$post_name_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_name like \"$post_name%\" and post_type='page'");
				if($post_name_count>0)
				{
					$post_name = $post_name.'-'.($post_name_count+1);
				}
				$post_id_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_title like \"$post_title\" and post_type='page'");
				if($post_id_count==0)
				{
					$post_sql = "insert into $wpdb->posts (post_author,post_date,post_date_gmt,post_content,post_title,post_name,post_parent,post_type) values (\"$post_author\", \"$post_date\", \"$post_date\", \"$post_content\", \"$post_title\", \"$post_name\",\"$post_parent_id\",'page')";
					$wpdb->query($post_sql);
					$last_post_id = $wpdb->get_var("SELECT max(ID) FROM $wpdb->posts");
					$guid = get_option('siteurl')."/?p=$last_post_id";
					$guid_sql = "update $wpdb->posts set guid=\"$guid\" where ID=\"$last_post_id\"";
					$wpdb->query($guid_sql);
					$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$last_tt_id\")";
					$wpdb->query($ter_relation_sql);
					update_post_meta( $last_post_id, 'pt_dummy_content', 1 );
				}
			}
		}
	}
}

// COPY THE DUMMY FOLDER ======================================================================
global $upload_folder_path;
global $blog_id;
$upload_folder_path = wp_upload_dir();
$upload_folder_path = $upload_folder_path['basedir']."/dummy";
global $blog_id;
if($blog_id){ $thumb_url = "&amp;bid=$blog_id";}
$folderpath = $upload_folder_path . "dummy/";
$strpost = strpos(get_stylesheet_directory(),'wp-content');
$target = $upload_folder_path;
full_copy( get_stylesheet_directory()."/images/dummy/", $target );
//full_copy( TEMPLATEPATH."/images/dummy/", ABSPATH . "wp-content/uploads/dummy/" );
function full_copy( $source, $target ) 
{
	global $upload_folder_path;
	$imagepatharr = explode('/',$upload_folder_path."dummy");
	$year_path = ABSPATH;
	for($i=0;$i<count($imagepatharr);$i++)
	{
	  if($imagepatharr[$i])
	  {
		  $year_path .= $imagepatharr[$i]."/";
		  //echo "<br />";
		  if (!file_exists($year_path)){
			  mkdir($year_path, 0777);
		  }     
		}
	}
	@mkdir( $target );
		$d = dir( $source );
		
	if ( is_dir( $source ) ) {
		@mkdir( $target );
		$d = dir( $source );
		while ( FALSE !== ( $entry = $d->read() ) ) {
			if ( $entry == '.' || $entry == '..' ) {
				continue;
			}
			$Entry = $source . '/' . $entry; 
			if ( is_dir( $Entry ) ) {
				full_copy( $Entry, $target . '/' . $entry );
				continue;
			}
			copy( $Entry, $target . '/' . $entry );
		}
	
		$d->close();
	}else {
		copy( $source, $target );
	}
}


/* ======================== CODE TO ADD RESIZED IMAGES ======================= */
regenerate_all_attachment_sizes();
 
function regenerate_all_attachment_sizes() {
	$args = array( 'post_type' => 'attachment', 'numberposts' => 100, 'post_status' => 'attachment'); 
	$attachments = get_posts( $args );
	if ($attachments) {
		foreach ( $attachments as $post ) {
			$file = get_attached_file( $post->ID );
			wp_update_attachment_metadata( $post->ID, wp_generate_attachment_metadata( $post->ID, $file ) );
		}
	}		
}

?>