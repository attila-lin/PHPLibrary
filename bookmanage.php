<?
//********************************
//以下部分用来判断是否登陆
//********************************

session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
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

// 如果信息完整
if( $_POST['cno'] && $_POST['bno']){
    
    // 借书模式
    if($_GET['action'] == "borrow"){
  
        $bno = $_POST['bno'];
        $cno = $_POST['cno'];
        $query = mysql_query("select stock from book where bno='$bno' limit 1");
        $row = mysql_fetch_array($query);
        //如果该书还有库存，则借书成功，同时库存数减一。
        if ($row['stock'] >= 1){

            //当前时间
            $now = date('Y-m-d H:i:s');
            //当前操作员
            $mid = $_SESSION['mid'];

            //更新borrow
            // bno`, `cno`, `borrowdate`, `returndata`, `mid`
            mysql_query("insert into borrow values ('$bno', '$cno', '$now', '', '$mid'");

            //更新book
            mysql_query("update book set stock=stock-1 where bno='$bno' limit 1");
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
        $query = mysql_query("select stock from book where bno='$bno' limit 1");
        $row = mysql_fetch_array($query);
        //如果该书还有库存，则借书成功，同时库存数减一。
        if ($row['stock'] >= 1){

            //当前时间
            $now = date('Y-m-d H:i:s');
            //当前操作员
            $mid = $_SESSION['mid'];

            //更新borrow
            // bno`, `cno`, `borrowdate`, `returndata`, `mid`
            mysql_query("insert into borrow values ('$bno', '$cno', '$now', '', '$mid'");

            //更新book
            mysql_query("update book set stock=stock-1 where bno='$bno' limit 1");
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
    while($row = mysql_fetch_array($result))
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