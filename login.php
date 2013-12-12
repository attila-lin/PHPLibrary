<?

// print_r($_POST);
// print_r($_POST['action']);

//********************************
//以下部分用来 登陆
//********************************
if($_POST['action'] == "login"){

	
	$username = $_POST["name"];
	$password =  $_POST["pass"];

	include( 'conn.php' );
	
	// $query = mysql_query("SELECT `mpassword` FROM `manager` WHERE `mid` LIKE '" . mysql_escape_string($username) . "';");

	// $query = mysql_query("select mid from manager " 
	//                         ."where mid = '$username' and mpassword = '$password'") or die("SQL语句执行失败"); 
	// print_r($username);
	// print_r($password);

	$query = mysql_query("SELECT `mno`,`mid` from `manager` where `mid`='$username' and `mpassword`='$password' limit 1");
	

	//判断用户是否存在，密码是否正确 
	if($row = mysql_fetch_array($query)) 
	{ 
		// print_r($row);
	    session_start(); //标志Session的开始 

	    $_SESSION['mno'] = $row['mno']; 
	    $_SESSION['mid'] = $row['mid']; 

	    echo "<a href='main.php' >欢迎登录，点击此处进入欢迎界面</a>"; 
	    echo "<a href='insert.php' >图书入库</a>"; 
	    echo "<a href='borrow.php' >借书</a>";
	    echo "<a href='return.php' >还书</a>";
	    echo "<a href='card.php' >借书证管理</a>";
	} 
	else //如果用户名和密码不正确，则输出错误 
	{ 
	    echo "<html><head><title>login failed</title></head><body>";
		echo "<a href='loginin.php' href='main.php'>用户名或密码错误</a>"; 
		echo "</body></html>";
	} 

}


//********************************
//以下部分用来 注销登录
//********************************

if($_GET['action'] == "logout"){
    unset($_SESSION['mno']);
    unset($_SESSION['mid']);
    echo '注销登录成功！点击此处 <a href="login.html">登录</a>';
    exit;
}



?>
