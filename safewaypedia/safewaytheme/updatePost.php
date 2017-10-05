<?php

//wp_enqueue_script('jqueryForm', '/wp-content/themes/safewaytheme/sfypedia/jquery.form.js');
//wp_enqueue_script('updatePost', '/wp-content/themes/safewaytheme/sfypedia/updatePost.js');

require dirname(dirname(dirname(__DIR__))).'/wp-load.php';

if( 'POST' == $_SERVER['REQUEST_METHOD']) { 	
	if (isset ($_POST['id']) && isset ($_POST['title']) && isset ($_POST['description']) && isset ($_POST['definition'])) {
		$id =  $_POST['id'];	
		$title =  $_POST['title'];	
		$description = $_POST['description'];
                $definition = $_POST['definition'];
                // ADD THE FORM INPUT TO $new_post ARRAY
            $post = array(
            'ID'	=>	$id,
            'post_title'	=>	$title,
            'post_content'	=>	'<div class="acro_title">'.$description.'</div><div class="acro_desc">'.$definition.'</div>'
            );

            header('Content-type: application/json');
            //SAVE THE POST

            if(wp_update_post($post) !== 0){
                    echo json_encode(array('success'=>'true'));
            }
            else{
                    echo json_encode(array('success'=>'false'));
            }
	}
        else{
            header('Content-type: application/json');
            echo json_encode(array('success'=>'false'));
        }
 
		
}