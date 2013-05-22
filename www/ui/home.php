<?php
require_once __DIR__ . '/include/ppotalk_include.php';
?>

<!DOCTYPE html>
<html>

<!-- #BeginTemplate "ppotalk_main_template.dwt" -->

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<!-- #BeginEditable "doctitle" -->
<title>Home - PpoTalk.com</title>

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

$strCurrentPageTitle = "Home";

ppo_render_main_site_menu($strCurrentPageTitle);

?>

			
<!-- #EndEditable -->
		</div>        
        <div id="wrap2">
        
<!-- #BeginEditable "main_content" -->
			<p>(main-content)</p>
<!-- #EndEditable -->
        
        </div>
        
        <div class="clear"></div>
        <div id="footer">footer</div>
    </div>

</body>

<!-- #EndTemplate -->

</html>
