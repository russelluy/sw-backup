<?php /*?><input type="text" name="address" id="address" value="1600 Amphitheatre Pky, Mountain View, CA" size="50" /><?php */?>
<script type="text/javascript">
function get_address()
{
	var post_location=document.getElementById('post_location').value;
	return post_location;
}
</script>
<p><input type="button" class="b_continue" value="<?php _e('Set Location on Map');?>" onclick="geocode();initialize();" /></p>
<div id="map_canvas" style="float:left;height:300px;margin-right:36px;position:relative;width:550px;"  class="form_row clearfix"></div>