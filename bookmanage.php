<?
//********************************
//以下部分用来判断是否登陆
//********************************

session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['mno']) &&  !isset($_SESSION['mid'])){
    header("Location:loginin.php");
    exit();
}

// //********************************
// //借书操作
// //********************************

// if($_GET['action'] == "borrow"){
//  // 如果信息完整，借书
//  if( $_POST['cno'] && $_POST['bno']){

//  }
//  // 如果只有借书证，显示借书证借过的书
//  elseif( $_POST['cno'] && !$_POST['bno'] ){
//      $query = mysql_query("select mno,mid from borrow where mid='$username' and mpassword='$password' limit 1");

//  }
// }

// //********************************
// //还书操作
// //********************************

// if($_GET['action'] == "return"){
//  if( $_POST['cno'] && $_POST['bno']){

//  }
//  elseif( $_POST['cno'] && !$_POST['bno'] ){
        
//  }
// }

//********************************
//借还书操作
//********************************

include('conn.php');




if( $_POST['action'] == 'insert'){
    echo "insert";

    print_r($_POST);


    $query = mysql_query("SELECT `mno`,`mid` from `manager` where `mid`='$username' and `mpassword`='$password' limit 1");
    $query = mysql_query(" INSERT INTO book (`category`, `title`, `press`, `year`, `author`, `price`, `briefcontent`, `total`, `stock`, `labels`, `cover`, `page`, `format`, `doubanID`, `ISBN`)\
             VALUES ( '$_POST[category]', '$_POST[title]','$_POST[press]','$_POST[year]','$_POST[author]','$_POST[price]','$_POST[total]','$_POST[briefcontent]','$_POST[labels]','$_POST[cover]','$_POST[page]','$_POST[format]','$_POST[doubanID]','$_POST[ISBN]')" ); 

    //判断用户是否存在，密码是否正确 
    // if($row = mysql_fetch_array($query)) 

}
// 如果信息完整
elseif( $_POST['cno'] && $_POST['bno']){
    
    // 借书模式
    if($_GET['action'] == "borrow"){
  
        $bno = $_POST['bno'];
        $cno = $_POST['cno'];
        $query = mysql_query("SELECT stock from book where bno='$bno' limit 1");
        $row = mysql_fetch_array($query);
        //如果该书还有库存，则借书成功，同时库存数减一。
        if ($row['stock'] >= 1){

            //当前时间
            $now = date('Y-m-d H:i:s');
            //当前操作员
            $mid = $_SESSION['mid'];

            //更新borrow
            // bno`, `cno`, `borrowdate`, `returndata`, `mid`
            mysql_query("INSERT into borrow values ('$bno', '$cno', '$now', null, '$mid'");

            //更新book
            mysql_query("UPDATE book set stock=stock-1 where bno='$bno' limit 1");
        }
        //否则输出该书无库存，且输出最近归还的时间。
        elseif ($row['stock'] == 0) {
            # code...
        }

    }
    // 还书模式
    elseif ($_GET['action'] == "return") {
        //如果该书在已借书籍列表内, 则还书成功, 同时库存加一
        $bno = $_POST['bno'];
        $cno = $_POST['cno'];
        $query = mysql_query("SELECT stock from book where bno='$bno' limit 1");
        $row = mysql_fetch_array($query);
        //如果该书还有库存，则借书成功，同时库存数减一。
        if ($row['stock'] >= 1){

            //当前时间
            $now = date('Y-m-d H:i:s');
            //当前操作员
            $mid = $_SESSION['mid'];

            //更新borrow
            // bno`, `cno`, `borrowdate`, `returndata`, `mid`
            mysql_query("INSERT into borrow values ('$bno', '$cno', '$now', '', '$mid') ");

            //更新book
            mysql_query("UPDATE book set stock=stock-1 where bno='$bno' limit 1");
        }
        //否则输出该书无库存，且输出最近归还的时间。
        elseif ($row['stock'] == 0) {
            
        }

    }

}
// 如果只有借书证 
// 显示该借书证所有已借书籍 (返回, 格式同查询模块)
elseif ($_POST['cno'] && !$_POST['bno']) {
    $cno = $_POST['cno'];
    $query = mysql_query("select * from borrow where cno='$cno' limit 1");
    while($row = mysql_fetch_array($result)){
        // `bno`, `cno`, `borrowdate`, `returndata`, `mid`
        echo $row['bno'];
        echo $row['cno'];
        echo $row['borrowdate'];
        echo $row['returndata'];
        echo $row['mid'];
        echo '<br />';
    }
}
// 其他情况
else {
    echo "输入错误";
}

?>