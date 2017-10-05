<?php
$options[] = array(	"type" => "maintabletop");

    /// General Settings
	
	    $options[] = array(	"name" => "General Settings",
						"type" => "heading");
						
		    $options[] = array(	"name" => "Theme Skin",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
			$options[] = array(	"desc" => "Please select the CSS skin of your blog here.",
					                "id" => $shortname."_alt_stylesheet",
					                "std" => "Select a CSS skin:",
					                "type" => "select",
					                "options" => $alt_stylesheets);
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Homepage Template",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
			$options[] = array(	"desc" => "Please select the Index Page of your blog here.",
					                "id" => $shortname."_index_page_settings",
					                "std" => "Select a Index Page:",
					                "type" => "select",
					                "options" => array('index1.php','index2.php','index3.php'));
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Show Sub Category Homepage",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
			$options[] = array(	"desc" => "Do you want to show subcategory on the Index Page or not.",
					                "id" => $shortname."_index_page_show_cat",
					                "std" => "Show Sub Category Homepage :",
					                "type" => "select",
					                "options" => array('yes','no'));
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Show Latest Classifieds on home page",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
			$options[] = array(	"desc" => "Do you want to show Latest Classifieds insted of Featured Classifieds on home page",
					                "id" => $shortname."_index_page_latest",
					                "std" => "Show Latest Classifieds on home page:",
					                "type" => "select",
					                "options" => array('yes','no'));
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Show Contact E-mail on Ad detail page",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
			$options[] = array(	"desc" => "Do you want to show Contact E-mail on Ad detail page or not.",
					                "id" => $shortname."_detail_show_email",
					                "std" => "Show Contact E-mail on Ad detail page :",
					                "type" => "select",
					                "options" => array('yes','no'));
						
			$options[] = array(	"type" => "subheadingbottom");
			
			
			$options[] = array(	"name" => "Customize Your Design",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Use Custom Stylesheet",
						            "desc" => "If you want to make custom design changes using CSS enable and <a href='". $customcssurl . "'>edit custom.css file here</a>.",
						            "id" => $shortname."_customcss",
						            "std" => "false",
						            "type" => "checkbox");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Favicon",
						        "toggle" => "true",
								"type" => "subheadingtop");

				$options[] = array(	"desc" => "Paste the full URL for your favicon image here if you wish to show it in browsers. <a href='http://www.favicon.cc/'>Create one here</a>",
						            "id" => $shortname."_favicon",
						            "std" => "",
						            "type" => "text");	
			
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Header Your Logo Image Set",
						        "toggle" => "true",
								"type" => "subheadingtop");

                $options[] = array(	"name" => "Choose Your Logo Image",
				                    "desc" => "Paste the full URL to your logo image here.",
						            "id" => $shortname."_logo_url",
						            "std" => "",
						            "type" => "file");

				$options[] = array(	"name" => "Choose Blog Title over Logo",
				                    "desc" => "This option will overwrite your logo selection above - You can <a href='". $generaloptionsurl . "'>change your settings here</a>",
						            "label" => "Show Blog Title + Tagline.",
						            "id" => $shortname."_show_blog_title",
						            "std" => "true",
						            "type" => "checkbox");	

			$options[] = array(	"type" => "subheadingbottom");
			
			
			$options[] = array(	"type" => "maintablebreak");
		
		
    /// Navigation Settings												
				
		$options[] = array(	"name" => "Navigation Settings",
						    "type" => "heading");
										
				$options[] = array(	"name" => "Exclude Pages from Header Menu",
								"toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"type" => "multihead");
						
				$options = pages_exclude($options);
									
				$options[] = array(	"type" => "subheadingbottom");
			
				$options[] = array(	"name" => "Breadcrumbs Navigation",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Show breadcrumbs navigation bar",
						            "desc" => "i.e. Home > Blog > Title - <a href='". $breadcrumbsurl . "'>Change options here</a>",
						            "id" => $shortname."_breadcrumbs",
						            "std" => "true",
						            "type" => "checkbox");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
$options[] = array(	"name" => "Footer Navigation",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Show breadcrumbs navigation bar",
                	                "desc" => "Enter a comma-separated list of the <code>page ID's</code> that you'd like to display in footer (on the right). (ie. <code>1,2,3,4</code>)",
						            "id" => $shortname."_footerpages",
						            "std" => "",
						            "type" => "text");	
						
			$options[] = array(	"type" => "subheadingbottom");
						
		$options[] = array(	"type" => "maintablebreak");
		
		
 
		$options[] = array(	"type" => "maintablebreak");

	
	$options[] = array(	"type" => "maintablebottom");
				
$options[] = array(	"type" => "maintabletop");


	/// Blog Section Settings												
				
		$options[] = array(	"name" => "Category Settings",
						    "type" => "heading");
			
		
		$options[] = array(	"name" => "Select Categories As Blog Categories",
								"toggle" => "true",
								"type" => "subheadingtop");
						
		$options[] = array(	"type" => "multihead");
				
		$options = category_exclude($options);
			
		$options[] = array(	"type" => "subheadingbottom");
		
		$options[] = array(	"name" => "Select Categories As Feature Category",
								"toggle" => "true",
								"type" => "subheadingtop");
						
		$options[] = array(	"name" => "Select a category for your Feature posts",
			    		            "desc" => "Pick a category where your Feature posts will be. It is advisable to create category and name it 'Feature'.",
									"id" => $shortname."_feature_catid",
			    		            "type" => "select",
			    		            "options" => $pn_categories);
			
		$options[] = array(	"type" => "subheadingbottom");


 $options[] = array(	"name" => "Image Setting (Tim thumb setting - Image Cutting Edge)",
						        "toggle" => "true",
								"type" => "subheadingtop");	

$options[] = array(	"name" => __("Default Image Cutting Edge"),
					                "desc" => __("Set Default Image Cutting Edge Position."),
					                "id" => $shortname."_image_x_cut",
					                "std" => "",
									"options" => array('center','top','bottom','left','right','top right','top left','bottom right','bottom left'),
					                "type" => "select");
				$options[] = array(	"type" => "subheadingbottom");
			 
			 					
		$options[] = array(	"type" => "maintablebreak");

    
		
	/// Blog Stats and Scripts	
	$options[] = array(	"type" => "maintablebottom");
?>