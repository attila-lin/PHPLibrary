<?

require_once( "init.php" );

$page = new QuickSkin( "default/searchres.htm" );
$page->assign( 'title',  '搜索结果' );

$page->set('template_dir', '_skins/');
$page->set('temp_dir', '_skins_tmp/');
$page->set('cache_dir', '_skins_tmp/');

// do substitute of template image directory
$page->assign('tpl_img', 'tplimgs/');

// do substitute of template javascript directory
$page->assign('tpl_js', 'tpljs/');
   
// $page->debug();
$page->output();
error_reporting(0);

//********************************
//以下部分是CoreSeek搜索
//********************************

require_once( "init.php" );
require ( "sphinxapi.php" );

$cl = new SphinxClient ();
$cl->SetServer ( '127.0.0.1', 9312);
$cl->SetConnectTimeout ( 3 );
$cl->SetArrayResult ( true );
$cl->SetMatchMode ( SPH_MATCH_ANY );

$res = $cl->Query ( '', "mysql" );

// $res = $cl->Query ( $_POST["q"], "mysql" );

//********************************
//以下部分将搜索结果在db中重新拿出
//********************************

require_once( "conn.php" );

$array = array();
foreach ($res["matches"] as $value){
    // print($value["id"]);
    array_push($array, $value["id"]);
}


//！！！！！！！！！！没有有序！！！！！！！！！！！！！！
$query = 'SELECT * 
            FROM `book` 
            WHERE `bno` IN (' . implode(",", $array) . ') ';

$result = mysql_query($query);
include_once 'class/mysql_fetch_all.func.php';
// while($row = mysql_fetch_array($result))
// {
//     // `bno`, `category`, `title`, `press`, `year`, `author`, `price`, `briefcontent`, 
//     // `total`, `stock`, `labels`, `cover`, `page`, `format`, `doubanID`, `ISBN`
//     echo $row['title'];
//     echo $row['category'];
//     echo $row['press'];
//     echo $row['year'];
//     echo $row['author'];
//     echo $row['price'];
//     echo $row['briefcontent'];
//     echo $row['total'];
//     echo $row['stock'];
//     echo $row['labels'];
//     echo $row['page'];
//     echo $row['format'];
//     echo $row['ISBN'];
//     echo "<br />";
// }

$res = (mysql_fetch_all($result, MYSQL_ASSOC));
// print_r($res);
foreach ($array as $value) {
    // $value 编号id
    // echo $value;
    foreach ($res as $book) {
        // $book 里放搜索得到的书
        // echo $book;
        if ($book['bno'] == $value){
            // `bno`, `category`, `title`, `press`, `year`, `author`, `price`, `briefcontent`, 
            // `total`, `stock`, `labels`, `cover`, `page`, `format`, `doubanID`, `ISBN`
            echo $book['title'] . "\t";
            echo $book['category'] . "\t";
            echo $book['press'] . "\t";
            echo $book['year'] . "\t";
            echo $book['author'] . "\t";
            echo $book['price'] . "\t";
            echo $book['briefcontent'] . "\t";
            echo $book['total'] . "\t";
            echo $book['stock'] . "\t";
            echo $book['labels'] . "\t";
            echo $book['page'] . "\t";
            echo $book['format'] . "\t";
            echo $book['ISBN'] . "\t";
            echo "<br />";
        }
    }
    
}

// //Database Connection
// $hostname = "localhost";
// $username = "root";
// $password = "lyu66559033"; 
// $database = "PHPLibrary";

// $sqlConn =  new mysqli($hostname, $username, $password, $database);

// echo $sqlConn;

// //Build SQL String
// $sqlString = 'SELECT * 
//             FROM `book` 
//             WHERE `bno` IN (' . implode(",", $array) . ') ';

// //Execute the query and put data into a result
// $result = $this->sqlConn->query($sqlString);
// //Copy result into a associative array
// $resultArray = $result->fetch_all(MYSQLI_ASSOC);
// print_r($resultArray);
?>