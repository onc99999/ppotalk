<?php

$f3=require('../f3/lib/base.php');
$f3->config('../app/app.cfg');
$f3->config('../app/routes.cfg');



/* DB params */
//$f3->set('dbuser','ppotalk');
//$f3->set('dbpasswd','822fmhc3');
//$f3->set('dburi','mongodb://127.0.0.1:27017');
//$f3->set('dburi','mysql:host=localhost;port=3306;dbname=ppotalk');
//$f3->set('dbname','ppotalk');


/*Enable to insert this route in config file atm. */
//$f3->route('GET /minify/@type',	function() use($f3) {
//		echo Web::instance()->minify($_GET['files']);
//	},6400
//);

$f3->run();


/*

$f3->set('DEBUG',3);
$f3->set('UI','ui/');

$f3->set('DB', new DB\SQL(
        'mysql:host=localhost;port=3306;dbname=ppotalk',
        'ppotalk',
        '822fmhc3'
      )
);

$f3->set('PPOTALK_TOPICS_PER_PAGE_LIMIT', 10);
$f3->set('PPOTALK_POSTS_PER_PAGE_LIMIT', 10);

$f3->route('GET /',
        function ($f3) {
        $f3->reroute('/c/1/page/1');
        }    
);

// Forum 1 home page
$f3->route('GET /forum1',
  function ($f3) {
    echo Template::instance()->render('forum1.html');
  }
);


// Display topics in chosen category
// example: GET /c/1/page/1
$f3->route('GET /c/@cat_id/page/@page_no',
  function ($f3) {
    
    $intSelectedCategoryID = 1;
    $intSelectedTopicID = 0;
    
    $f3->set('topic_id', $intSelectedTopicID);
    $db = $f3->get('DB');
    
    $intTopicsPerPageLimit = $f3->get('PPOTALK_POSTS_PER_PAGE_LIMIT');
//    $intPageNum = 1;
    $intTopicsPageNum = $f3->get('PARAMS.page_no');
    
    if ($intTopicsPageNum <= 0) {
        $intTopicsPageNum = 1;
    }
    
    $intTopicsPageOffset = ($intTopicsPageNum - 1) * $intTopicsPerPageLimit;
    
    $strSQL = "select topic_id, topic_description from topics order by topic_id asc limit $intTopicsPerPageLimit offset $intTopicsPageOffset";
    
    $f3->set('forum_topics', $db->exec($strSQL));
    
    $strCurrentPageTitle = "Forum_1";
    $f3->set('main_menu_bar1', ppo_render_main_site_menu($strCurrentPageTitle));
    //$main_menu_bar1 = ppo_render_main_site_menu($strCurrentPageTitle);
    
    //$view = new View;
    echo Template::instance()->render('forum1.html');    
    //echo $view->render('forum1.html');    
  }
);


// Display posts in chosen topic
// examples: GET /c/1/t/1/page/1
$f3->route('GET /c/@cat_id/t/@topic_id/page/@page_no',
  function ($f3) {
            
    $topic_id = $f3->get('PARAMS.topic_id');
    $f3->set('topic_id', $topic_id);
    
    $intPageNum = $f3->get('PARAMS.page_no');
    $db = $f3->get('DB');

    $intTopicsPerPageLimit = $f3->get('PPOTALK_TOPICS_PER_PAGE_LIMIT');
    
    $intTopicsPageNum = $f3->get('PARAMS.page_no');
    
    if ($intTopicsPageNum <= 0) {
        $intTopicsPageNum = 1;
    }
    
    $intTopicsPageOffset = ($intTopicsPageNum - 1) * $intTopicsPerPageLimit;
        

    $intPostsPerPageLimt = $f3->get('PPOTALK_POSTS_PER_PAGE_LIMIT');
    $intPostsPageNum = 
    
    
    
    $strSQL = 'select topic_id, topic_description from topics order by topic_id asc';
    $f3->set('forum_topics', $db->exec($strSQL));
    
    $strSQL = "select content from posts where topic_id =$topic_id order by post_order_in_topic asc";
    $f3->set('forum_posts', $db->exec($strSQL));
    
    echo Template::instance()->render('forum1.html');    
    
    }
);


/* 
 * 
GET /
 * GET /category
 * GET /category/@category_id
 * 
 * ; show list of topics
 * GET /topic/@pageNumber
 
 * ; show list of posts of a topic
 * GET /post/@topic_id/@pageNumber
 
 * ;sort post listing
 * GET /post/by/@sortKey/page/@pageNumber
 * 
; post CRUD
 * ; if topic_id = 0 means create new topic
 * POST | GET /post/create/@topic_id/@refer_post_id
 * POST | GET /post/update/@post_id
 * GET /post/delete/@post_id
 * 
 * ;AUTH
 * POST /login
 * GET /logout

 * * 
 * 
 */

/*

$f3->run();

*/

?>
