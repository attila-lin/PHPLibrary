<?

//********************************
//以下部分用来 登陆
//********************************
if($_GET['action'] == "login"){

	$username = $_POST["name"]
	$password =  $_POST["pass"]

	requir_once( 'conn.php' );

	// $query = mysql_query("SELECT `mpassword` FROM `manager` WHERE `mid` LIKE '" . mysql_escape_string($username) . "';");

	// $query = @mysql_query("select mid from manager " 
	//                         ."where mid = '$username' and mpassword = '$password'") or die("SQL语句执行失败"); 

	$query = mysql_query("select mno,mid from manager where mid='$username' and mpassword='$password' limit 1");

	//判断用户是否存在，密码是否正确 
	if($row = mysql_fetch_array($query)) 
	{ 
	    session_start(); //标志Session的开始 

	    $_SESSION['mno'] = $row['mno']; 
	    $_SESSION['mid'] = $row['mid']; 

	    echo "<a href="main.php" href="main.php">欢迎登录，点击此处进入欢迎界面</a>"; 

	} 
	else //如果用户名和密码不正确，则输出错误 
	{ 
	    echo "用户名或密码错误"; 
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
