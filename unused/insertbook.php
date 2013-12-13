<?
// `bno`, `category`, `title`, `press`, `year`, `author`, `price`, `briefcontent`, 
// `total`, `stock`, `labels`, `cover`, `page`, `format`, `doubanID`, `ISBN`
$category = $_POST['category'];
$title = $_POST['title'];
$press = $_POST['press'];
$year = $_POST['year'];
$author = $_POST['author'];
$price = $_POST['price'];
$briefcontent = $_POST['briefcontent'];
$total = $_POST['total'];
$labels = $_POST['labels'];
$stock = $_POST['stock'];
$cover = $_POST['cover'];
$format = $_POST['format'];
$doubanID = $_POST['doubanID'];
$ISBN = $_POST['ISBN'];

include 'conn.php';
// `bno`, `category`, `title`, `press`, `year`, `author`, `price`, `briefcontent`, `total`, `stock`, `labels`, `cover`, `page`, `format`, `doubanID`, `ISBN`
$query = "INSERT INTO borrow VALUES 
            ( null, '$category', '$title', '$press', '$year', '$author', '$price', '$briefcontent', 
                '$total', '$stock', '$labels', '$cover', '$page', '$format', '$doubanID', '$ISBN' )";
mysql_query($query);

?>