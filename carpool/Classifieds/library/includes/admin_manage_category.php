<?php
global $wpdb,$General;
$category_array = array();
$category_array = $General->getCategoryList();
if($_POST)
{
	for($i=0;$i<count($category_array);$i++)
	{
		$cid = $category_array[$i]['ID'];
		if($_POST["cat_$cid"]!='')
		{
			$catPostarray[$cid] = $_POST["cat_$cid"];
		}else
		{
			$catPostarray[$cid] = '';
		}
	}
	$updatesql = "update $wpdb->options set option_value= '". serialize($catPostarray) ."' where option_name='category_price_info'";
	$wpdb->query($updatesql);
	$_SESSION['process_message'] = 'Category Price Updated Successfully';
}
$category_price_info = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'category_price_info'");
?>
<style>
h2 {
	color:#464646;
	font-family:Georgia, "Times New Roman", "Bitstream Charter", Times, serif;
	font-size:24px;
	font-size-adjust:none;
	font-stretch:normal;
	font-style:italic;
	font-variant:normal;
	font-weight:normal;
	line-height:35px;
	margin:0;
	padding:14px 15px 3px 0;
	text-shadow:0 1px 0 #FFFFFF;
}
</style>
<h2>Manage Category Price</h2>
<p>You may specify different prices for different categories. If you wish to keep posting in certain category free, keep 0 as price. If you wish to appy default price that you set under Classifieds &gt; general settings, leave the price field blank.</p>
<?php if($_SESSION['process_message']){?>
<div class="updated fade below-h2" id="message" style="background-color: rgb(255, 251, 204);" >
  <p><?php echo $_SESSION['process_message'];?> </p>
</div>
<?php $_SESSION['process_message'] = ''; }?>
<table width="100%">
  <tr>
    <td>
<?php
if(count($category_array)>0)
{
?>
        <form name="category_frm" method="post" action="">
        <table  style="width:70% !important;" cellpadding="5"  class="widefat post fixed" >
          <thead>
            <tr>
              <th width="200" ><strong>Categoty Title</strong></th>
              <th ><strong>Price</strong></th>
            </tr>            
			  <?php
			 global $General;
			 $blogcatids = $General->get_blog_catid();
			 $featurecatids = $General->get_feature_catid();
			$exclude_array = array();
			$exclude_array = array(1);
			if($featurecatids)
			{
				$exclude_array[] = $featurecatids;
			}
			if($blogcatids)
			{
				$exclude_array[] = $blogcatids;
			}
			 $catinfoarray = array();
			 $catpricearray = unserialize($category_price_info);
			 for($i=0;$i<count($category_array);$i++)
			 {
			 	$catIDarray[] = $category_array[$i]['ID'];
				if(!in_array($category_array[$i]['ID'],$exclude_array))
				{
					$category_counter++;
			 ?>
             <tr>
                  <td><strong><?php echo $category_array[$i]['name'];?></strong></a></td>
                  <?php
				  if($catpricearray[$category_array[$i]['ID']] != '')
				  {
				  	$price = $catpricearray[$category_array[$i]['ID']];
				  }else
				  {
				  	$price = '';
				  }
				  ?>
                  <td><input type="text" name="cat_<?php echo $category_array[$i]['ID'];?>" value="<?php echo $price;?>" size="10" /></td>
            </tr>
            <?php 
				}
			}?>
            <tr>
              <td>&nbsp;</td><td><input type="submit" name="submit" value="Submit" class="button-secondary action" /</td>
            </tr>
            <tr>
              <td colspan="2" align="center"><strong>Total Categories : <?php echo $category_counter;?></strong></td>
            </tr>
          </thead>
        </table>
        </form>
      <?php
	  if($category_price_info=='')
	  {
	  	for($c=0;$c<count($catIDarray);$c++)
		{
			$category_price_info[$catIDarray[$c]] = '0';
		}
		//$updatesql = "update $wpdb->options set option_value= '". serialize($category_price_info) ."' where option_name='category_price_info'";
		$insertsql = "insert into $wpdb->options (option_name,option_value) values ('category_price_info','". serialize($category_price_info) ."')";
		$wpdb->query($insertsql);
	  }
}else
{
?>
      <br />
      <br />
      <p><strong>No Category Available</strong></p>
      <?php
}
?>
    </td>
  </tr>
</table>
