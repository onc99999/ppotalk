<?php
require_once __DIR__ . '/include/ppotalk_include.php';
?>

<!DOCTYPE html>
<html>

<!-- #BeginTemplate "ppotalk_main_template.dwt" -->

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<!-- #BeginEditable "doctitle" -->
<title>Forum - PpoTalk.com</title>

<!-- #EndEditable -->

<link href="ppotalk_main.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="wrap1">
        <div id="header">
			header logo and content
		</div>
        <div id="main_menu_bar">
		<!-- #BeginEditable "main_menu_bar" -->

<?php

$strCurrentPageTitle = "Forum_1";

ppo_render_main_site_menu($strCurrentPageTitle);

?>

			
<!-- #EndEditable -->
		</div>        
        <div id="wrap2">
        
<!-- #BeginEditable "main_content" -->


            <div id="forum_page_left_column">
                <div id="forum_topic_list_box">
                    <!-- header -->
                    <div id="forum_topic_list_box_header">
                      TOPICS
                    </div>
                    <!-- content -->
                    <div id="forum_topic_list_box_content">

<?php 

    $intSelectedCategoryID = 1;
    

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['topic_id'])) {
        $intSelectedTopicID = $_GET['topic_id'];
    } else {
        $intSelectedTopicID = 0;
    }
    ppo_render_topic_list_of_category_id($intSelectedCategoryID, $intSelectedTopicID);        
    
}


    
    
?>                        
                    </div>
                </div>        
            </div>
            
            <div id="forum_page_center_column">

<?php                
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['topic_id']) && isset($_GET['post_id'])) {
        $intSelectedTopicID = $_GET['topic_id'];
        $intSelectedPostID = $_GET['post_id'];
        
        ppo_render_post_list_of_topic_id($intSelectedTopicID, $intSelectedPostID);
        
    } else {
        
        echo "Welcome, please click a Topic on the left.";
    }
    
    
}
?>
                
            </div>
            <div id="forum_page_right_column">right content and divs</div>
            
<!-- #EndEditable -->
        
        </div>
        
        <div class="clear"></div>
        <div id="footer">footer</div>
    </div>

</body>

<!-- #EndTemplate -->

</html>
