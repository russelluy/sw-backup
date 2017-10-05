<?php
/*
Template Name: Ajax Post
*/
//wp_enqueue_script('jqueryForm', '/wp-content/themes/safewaytheme/sfypedia/jquery.form.js');
//wp_enqueue_script('updatePost', '/wp-content/themes/safewaytheme/sfypedia/updatePost.js');
$post = get_post($_POST['id']);
if ($post){
	setup_postdata($post); 
        
        $elements = new DOMDocument();
        $elements->loadHTML(get_the_content()); 
        $xpath = new DOMXPath($elements);
        $tags = $xpath->query('//div[@class="acro_title"]');
        foreach ($tags as $tag) {
            $description = $tag->textContent;
        }
        $tags = $xpath->query('//div[@class="acro_desc"]');
        foreach ($tags as $tag) {
            $definition = $tag->textContent;
        }      

        if(!isset($description) && !isset($definition)){
            $description = get_the_content();
        }        
	
	$postData = new stdClass();
	$postData->id = $post->ID;
	$postData->title = get_the_title($post->ID);
	$postData->description = $description;
	$postData->definition = $definition;
	
	header('Content-type: application/json');
	header($_SERVER["SERVER_PROTOCOL"].' 200 OK');
	echo json_encode($postData);
}
