<?php
if (!class_exists('General')) 
{
	class General 
	{
		// Class initialization
		function General() 
		{
		}

		function get_general_settings()
		{
			global $wpdb;
			$settingoptions = $wpdb->get_var("select option_value from $wpdb->options where option_name like 'mysite_general_settings'");
			$option_value = unserialize($settingoptions);
			$option_value['feature_catid'] = $this->get_category_by_cat_name(get_option('ptthemes_feature_catid'));
			return $option_value;
		}

		function get_site_emailId()
		{
			$generalinfo = get_option('mysite_general_settings');
			if($generalinfo['site_email'] == '')
			{
				return get_option('admin_email');
			}else
			{
				return $generalinfo['site_email'];
			}
		}

		function get_site_emailName()
		{
			$generalinfo = get_option('mysite_general_settings');
			if($generalinfo['site_email_name'] == '')
			{
				return get_option('blogname');
			}else
			{
				return $generalinfo['site_email_name'];
			}
		}

		function get_currency_symbol()
		{
			$generalinfo = get_option('mysite_general_settings');
			if($generalinfo['currencysym'] == '')
			{
				return '$';
			}else
			{
				return $generalinfo['currencysym'];
			}
		}

		function get_currency_code()
		{
			$generalinfo = get_option('mysite_general_settings');
			if($generalinfo['currency'] == '')
			{
				return 'USD';
			}else
			{
				return $generalinfo['currency'];
			}
		}

		function get_paypal_merchantID()
		{
			$generalinfo = get_option('mysite_general_settings');
			if($generalinfo['paypal_merchantid'] == '')
			{
				return get_option('admin_email');
			}else
			{
				return $generalinfo['paypal_merchantid'];
			}
		}

		function get_ads_default_status()
		{
			$generalinfo = get_option('mysite_general_settings');
			if($generalinfo['approve_ads'] == '')
			{
				return 'publish';
			}else
			{
				return $generalinfo['approve_ads'];
			}
		}

		function get_index_settings()
		{
			if(get_option('ptthemes_index_page_settings') == '')
			{
				return 'index1.php';
			}else
			{
				return get_option('ptthemes_index_page_settings');
			}
		}

		function get_ads_alive_days()

		{

			$generalinfo = get_option('mysite_general_settings');

			if($generalinfo['ads_days'] == '')

			{

				return '30';

			}else

			{

				return $generalinfo['ads_days'];

			}

		}

		function get_blog_catid()
		{

			$blog_catid = get_inc_categories("cat_exclude_");

			$blog_catid_array = explode(',',$blog_catid);

			$catid_array = array();

			for($i=0;$i<count($blog_catid_array);$i++)

			{

				if($blog_catid_array[$i])

				{

					$catid_array[] = $blog_catid_array[$i];

				}

			}

			return implode(',',$catid_array);

		}	

		function getCategoryList( $parent = 0, $level = 0, $categories = 0, $page = 1, $per_page = 1000 ) 

		{

			$count = 0;

		

			if ( empty($categories) ) 

			{

				$args = array('hide_empty' => 0);

				if ( !empty($_GET['s']) )

					$args['search'] = $_GET['s'];

		

				$categories = get_categories( $args );

				if ( empty($categories) )

					return false;

			}		

			$children = _get_term_hierarchy('category');

			return $this->_cat_rows1( $parent, $level, $categories, $children, $page, $per_page, $count );

		}



		function _cat_rows1( $parent = 0, $level = 0, $categories, &$children, $page = 1, $per_page = 20, &$count ) {

		

			global $category_array;

			$start = ($page - 1) * $per_page;

			$end = $start + $per_page;

			ob_start();

		

			foreach ( $categories as $key => $category ) {

				if ( $count >= $end )

					break;

		

				if ( $category->parent != $parent && empty($_GET['s']) )

					continue;

		

				// If the page starts in a subtree, print the parents.

				if ( $count == $start && $category->parent > 0 ) {

		

					$my_parents = array();

					$p = $category->parent;

					while ( $p ) {

						$my_parent = get_category( $p );

						$my_parents[] = $my_parent;

						if ( $my_parent->parent == 0 )

							break;

						$p = $my_parent->parent;

					}

		

					$num_parents = count($my_parents);

					while( $my_parent = array_pop($my_parents) ) {

						$category_array[] =$this-> _cat_row1( $my_parent, $level - $num_parents );

						$num_parents--;

					}

				}

		

				if ($count >= $start)

				{

					//$category_array[] = _cat_row( $category, $level );

					$categoryinfo = array();

					$category = get_category( $category, '', '' );

					$default_cat_id = (int) get_option( 'default_category' );

					$pad = str_repeat( '&#8212; ', max(0, $level) );

					$name = ( $name_override ? $name_override : $pad . ' ' . $category->name );

					$categoryinfo['ID'] = $category->term_id;

					$categoryinfo['name'] = $name;

					$category_array[] = $categoryinfo;

				}

		

				unset( $categories[ $key ] );

		

				$count++;

		

				if ( isset($children[$category->term_id]) )

					$this->_cat_rows1( $category->term_id, $level + 1, $categories, $children, $page, $per_page, $count );

			}

		

			$output = ob_get_contents();

			ob_end_clean();

			return $category_array;

			

		}

		

		function get_category_dropdown_options($selectedId='',$exclude_cat='')

		{

			global $wpdb;

			$general_settings = $this->get_general_settings();

			$category_price_info = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'category_price_info'");

			$category_price_info_arr = unserialize($category_price_info);

			$category_array = array();

			$category_array = $this->getCategoryList();

			$option_str = '';

			$exclude_catarr = explode(',',$exclude_cat);

			for($i=0;$i<count($category_array);$i++)

			{

				if(!in_array($category_array[$i]['ID'],$exclude_catarr))

				{

					$selected = '';

					if($selectedId == $category_array[$i]['ID']){$selected="selected";};

					$option_str .= '<option value="'.$category_array[$i]['ID'].'" '.$selected.'>'.$category_array[$i]['name'];

					if($category_price_info_arr[$category_array[$i]['ID']])

					{

						$price = '';

						$price = $category_price_info_arr[$category_array[$i]['ID']]-$general_settings['ads_price'];

						if($price<0)

						{

							$price = '-'.$general_settings['currencysym'].abs($price);

						}elseif($price>0)

						{

							$price = '+'.$general_settings['currencysym'].abs($price);

						}

						if($price)

						{

							$option_str .= ' ('.$price.')';

						}

					}

					$option_str .= '</option>';				

				}

			}

			return $option_str;

		}

		

		function get_category_price($termid)

		{

			global $wpdb;

			$category_price_info = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'category_price_info'");

			$category_price_info_arr = unserialize($category_price_info);

			return $category_price_info_arr[$termid];

		}

		function get_currency_sym()

		{

			global $wpdb;

			$settingoptions = $wpdb->get_var("select option_value from $wpdb->options where option_name like 'mysite_general_settings'");

			$option_value = unserialize($settingoptions);

			return $option_value['currencysym'];

		}

		function get_featured_price()

		{

			global $wpdb;

			$settingoptions = $wpdb->get_var("select option_value from $wpdb->options where option_name like 'mysite_general_settings'");

			$option_value = unserialize($settingoptions);

			return number_format($option_value['feature_ads_price'],2);

		}

		

		function sendEmail($fromEmail,$fromEmailName,$toEmail,$toEmailName,$subject,$message,$extra='')

		{

			$headers  = 'MIME-Version: 1.0' . "\r\n";

			$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

			

			// Additional headers

			$headers .= 'To: '.$toEmailName.' <'.$toEmail.'>' . "\r\n";

			$headers .= 'From: '.$fromEmailName.' <'.$fromEmail.'>' . "\r\n";
			
			//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";

			//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

			/*echo "Message : ".$message;
			echo "<br>";
			echo "Headers : ".$headers;
			echo "<br>";
			echo "Email To : ".$toEmail;
			echo "<br>";
			echo "Subject : ".$subject;
			echo "<br>";
			exit;*/

			// Mail it

			//mail($toEmail, $subject, $message, $headers);
			wp_mail( $toEmail, $subject, $message, $headers );

		}

		

		function get_post_info($pid)

		{

			global $wpdb;

			$productinfosql = "select ID,post_title,post_content from $wpdb->posts where ID=$pid";

			$productinfo = $wpdb->get_results($productinfosql);

			foreach($productinfo[0] as $key=>$val)

			{

				$productArray[$key] = $val; 

			}

			return $productArray;

		}

		

		function get_feature_catid()

		{

			global $wpdb;
			$feature_catid = get_option('ptthemes_feature_catid');

			return $catid = $wpdb->get_var("SELECT term_ID FROM $wpdb->terms WHERE name = '$feature_catid'");

		}
		
		function get_category_by_cat_name($catname)
		{
			if($catname)
			{
				global $wpdb;
				return $wpdb->get_var("SELECT $wpdb->terms.term_id FROM $wpdb->terms WHERE $wpdb->terms.name = \"$catname\"");
			}
		}
		
		function delete_post($pid)
		{
			global $wpdb;
			if($pid)
			{
				$commentsql = "delete from $wpdb->comments where comment_post_ID=\"$pid\"";
				$wpdb->query($commentsql);
				$postmetasql = "delete from $wpdb->postmeta where post_id=\"$pid\"";
				$wpdb->query($postmetasql);
				$postmetasql = "delete from $wpdb->term_relationships where object_id=\"$pid\"";
				$wpdb->query($postmetasql);
				$postmetasql = "delete from $wpdb->posts where ID=\"$pid\"";
				$wpdb->query($postmetasql);
			}
		}
		
		function is_show_contact_email()
		{
			if(get_option('ptthemes_detail_show_email')=='yes')
			{
				return true;
			}else
			{
				return false;
			}
		}
		function is_show_cat_only_home()
		{
			//echo get_option('ptthemes_index_page_show_cat');exit;
			if(get_option('ptthemes_index_page_show_cat')=='no')
			{
				return true;
			}else
			{
				return false;
			}
			
		}
		
		function is_latest_listing_home()
		{
			if(get_option('ptthemes_index_page_latest')=='yes')
			{
				return true;
			}else
			{
				return false;
			}
			
		}
		
		function get_discount_amount($coupon,$amount)
		{
			global $wpdb;
			if($coupon!='' && $amount>0)
			{
				$couponsql = "select option_value from $wpdb->options where option_name='discount_coupons'";
				$couponinfo = $wpdb->get_results($couponsql);
				if($couponinfo)
				{
					foreach($couponinfo as $couponinfoObj)
					{
						$option_value = unserialize($couponinfoObj->option_value);
						foreach($option_value as $key=>$value)
						{
							if($value['couponcode'] == $coupon)
							{
								if($value['dis_per']=='per')
								{
									$discount_amt = ($amount*$value['dis_amt'])/100;
								}else
								if($value['dis_per']=='amt')
								{
									$discount_amt = $value['dis_amt'];
								}
							}
						}
					}
					return $discount_amt;
				}
			}
			return false;			
		}

	}

}

if(!$General)

{

	$General = new General();

}

?>