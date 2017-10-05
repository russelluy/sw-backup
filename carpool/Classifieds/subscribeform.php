
<div class="subscribe">
 <h3 class="clear spcaer"> Subscribe </h3>
 
   <p><span  class="spacer2" ><a href="feed:<?php bloginfo('rss2_url'); ?>" class="i_rss"><strong>Entries (RSS)</strong></a></span> <a href="feed:<?php bloginfo('comments_rss2_url'); ?>" class="i_rss"><strong>Comment (RSS)</strong></a></p>
   
    <p class="i_email"><strong > Subscribe via Email</strong></p>
 
 
	    
<form action="http://www.feedburner.com/fb/a/emailverify" method="post" target="popupwindow" onsubmit="window.open('http://www.feedburner.com/fb/a/emailverifySubmit?feedId=<?php echo $pt_feedburner_id; ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
      <input name="email" type="text" value="Your Email Address" class="subscribe_textield" onFocus="if (this.value == 'Your Email Address') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Your Email Address';}" />
      <br />
        <input type="hidden" value="http://feeds.feedburner.com/~e?ffid=<?php echo $pt_feedburner_id; ?>" name="url"/>
        <input type="hidden" value="<?php bloginfo('name'); ?>" name="title"/>
        <input type="hidden" name="loc" value="en_US"/>
        
        <input type="image" src="<?php bloginfo('template_url'); ?>/images/none.png"   value="Subscribe" class="bsubscribe" />
      </form> 
    
  
    
</div>