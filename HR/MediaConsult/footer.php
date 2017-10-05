<?php global $gw_options; ?>
    <div id="footer">

        <div class="f-menu">
                <?php wp_nav_menu(array('theme_location' => 'footer-menu', 'depth' => '1', 'container_class' => 'f-menu')); ?>
        </div>
                        
        <div class="copyright">
<?php         
if($gw_options['general']['footer_copyright']) {
	echo $gw_options['general']['footer_copyright'];  
}
else {
	echo '&copy; 2010 <a href="#">Media Consult</a>. All rights reserved.';
}	
?>
        </div>
    </div>  
</div>

<?php wp_footer(); ?>
<?php 
if($gw_options['general']['google_analytics'])
echo $gw_options['general']['google_analytics'];
?>
</body>
</html>