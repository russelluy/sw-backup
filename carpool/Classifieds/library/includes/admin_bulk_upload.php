<?php
global $wpdb,$upload_folder_path;

if($_POST)
{
	if($_FILES['bulk_upload_csv']['name']!='' && $_FILES['bulk_upload_csv']['error']=='0')
	{
		$filename = $_FILES['bulk_upload_csv']['name'];
		$filenamearr = explode('.',$filename);
		$extensionarr = array('csv','CSV');
		if(in_array($filenamearr[count($filenamearr)-1],$extensionarr))
		{
			$destination_path = ABSPATH . $upload_folder_path."csv/";
			if (!file_exists($destination_path))
			{
				mkdir($destination_path, 0777);				
			}
			$target_path = $destination_path . $filename;
			$csv_target_path = $target_path;
			//$user_path = get_option( 'siteurl' ) ."/wp-content/uploads/csv/".$filename;
			$extension_file1=array('.php','.js','.PHP','.JS');
			$file_ext= substr($target_path, -4, 4);		
			if(!in_array($file_ext,$extension_file1))
			{
				if(@move_uploaded_file($_FILES['bulk_upload_csv']['tmp_name'], $target_path)) 
				{
					$fd = fopen ($target_path, "rt");
	
					$taxonomysql = "select term_taxonomy_id,term_id from $wpdb->term_taxonomy where taxonomy='category'";
					$taxonomyres = $wpdb->get_results($taxonomysql);
					$term_taxonomy_array = array();
					foreach($taxonomyres as $taxonomyObj)
					{
						$term_taxonomy_array[$taxonomyObj->term_id] = $taxonomyObj->term_taxonomy_id; 
					}
					$rowcount = 0;
					$customKeyarray = array();
					while (!feof ($fd))
					{
						$buffer = fgetcsv($fd, 4096);
						if($rowcount == 0)
						{
							for($k=3;$k<count($buffer);$k++)
							{
								$customKeyarray[$k] = $buffer[$k];
							}
						}else
						{
							$post_title = addslashes($buffer[0]);
							$post_desc = addslashes($buffer[1]);
							$post_cat = $buffer[2]; // comma seperated
							if($post_title!='')
							{
								$date = date('Y-m-d H:i:s');
								$post_name = str_replace(array("'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," "),'',$post_title);
								$postsql = "insert into $wpdb->posts (post_author,post_date,post_date_gmt,post_title,post_content,post_status,post_modified,post_modified_gmt,post_name) values ('1',\"$date\",\"$date\",\"$post_title\",\"$post_desc\",'publish',\"$date\",\"$date\",\"$post_name\")";
								if($is_debug_flag)
								{
									echo $postsql; echo "<br>";
								}
								$wpdb->query($postsql); 
								$last_postid = $wpdb->get_var("SELECT max(ID) as ID FROM $wpdb->posts");
								if($last_postid)
								{
									$guid = get_option('siteurl')."/?p=$last_postid";
									$post_update = "update $wpdb->posts set guid=\"$guid\" where ID=\"$last_postid\"";
									$wpdb->query($post_update); 
								}
								$customArr = array();
								for($c=3;$c<count($buffer);$c++)
								{
									update_post_meta($last_postid,$customKeyarray[$c],$buffer[$c]);
								}
								
								if($post_cat)
								{
									$post_cat_arr = explode(',',$post_cat);
									if(count($post_cat_arr)>0)
									{
										for($cat=0;$cat<count($post_cat_arr);$cat++)
										{
											$categoryId = $post_cat_arr[$cat];
											$chkcat = $wpdb->get_var("select name from $wpdb->terms where term_id=\"$categoryId\"");
											if(!$chkcat)
											{
												$categoryId = 1;
											}
											$cat_texonomyid = $term_taxonomy_array[$categoryId];
											$termsql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_postid\",\"$cat_texonomyid\")";
											if($is_debug_flag)
											{
												echo $termsql; echo "<br>";
											}
											$wpdb->query($termsql);	
										}
									}
								}else
								{
									$categoryId = 1;
									$cat_texonomyid = $term_taxonomy_array[$categoryId];
									$termsql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_postid\",\"$cat_texonomyid\")";
									if($is_debug_flag)
									{
										echo $termsql; echo "<br>";
									}
									$wpdb->query($termsql);	
								}
								if($is_debug_flag)
								{
									echo "<br>";
								}
							}
						}
					$rowcount++;
					}
					foreach($term_taxonomy_array as $catid=>$term_taxonomy_id)
					{
						$updatetaxonomycount = "update $wpdb->term_taxonomy set count=(select count(object_id) from $wpdb->term_relationships where term_taxonomy_id=\"$term_taxonomy_id\") where term_taxonomy_id=\"$term_taxonomy_id\"";
						$wpdb->query($updatetaxonomycount);	
					}
					echo "<br><br>csv uploaded successfully";
					$rowcount = $rowcount-2;
					echo "<br><br>Total of $rowcount records inserted</b>";
					@unlink($csv_target_path);
				}
				else
				{
					$msg = "muerror";
				}
			}else
			{
				$msg="Only allowed csv file.";
			}
		}
	}else
	{
		$msg = "ferror";
	}
}
?>

<form action="<?php echo get_option('siteurl')?>/wp-admin/admin.php?page=bulkupload" method="post" name="bukl_upload_frm" enctype="multipart/form-data">
  <style>
h2 { color:#464646;font-family:Georgia,"Times New Roman","Bitstream Charter",Times,serif;
font-size:24px;
font-size-adjust:none;
font-stretch:normal;
font-style:italic;
font-variant:normal;
font-weight:normal;
line-height:35px;
margin:0;
padding:14px 15px 3px 0;
text-shadow:0 1px 0 #FFFFFF;  }
</style>
  <h2>Bulk Upload</h2>
  <p>Have a classified site somewhere else that you wish to import here? Simply  download <a href="<?php echo get_option('siteurl')?>/?page=csvdl">sample CSV file</a> and import your data accordingly.</p>
  <?php if($_REQUEST['msg']=='exist'){?>
  <div class="updated fade below-h2" id="message" style="background-color: rgb(255, 251, 204);" >
    <p>Uploaded successully.</p>
  </div>
  <?php }?>
  <table width="75%" cellpadding="3" cellspacing="3" class="widefat post fixed" >
    <tr>
      <td width="14%">Select CSV file</td>
      <td width="86%">:
        <input type="file" name="bulk_upload_csv" id="bulk_upload_csv"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    <td><input type="submit" name="submit" value="Submit" onClick="return check_frm();" class="button-secondary action" >    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>    
    </tr>
    <tr><td></td>
      <td>You can download <a href="<?php echo get_option('siteurl')?>/?page=csvdl">sample CSV file</a></td>
          
    </tr>
  </table>
</form>
<script>
function check_frm()
{
	if(document.getElementById('bulk_upload_csv').value == '')
	{
		alert("Please select csv file to upload");
		return false;
	}
	return true;
}
</script>