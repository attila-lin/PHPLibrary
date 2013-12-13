<html>
<head>
	<title><?php
echo $_obj['title'];
?>
</title>
</head>
<body>

<form action="cardmanage.php" method="post">
name      
<input type="text" name="cname" />
<br />
company
<input type="text" name="company" />
<br />
category
<input type="text" name="category" />
<br />
<input type="submit" name="action" value="增加"/>
</form>

<br /><br /><br /><br />

<form action="cardmanage.php" method="post">
cardID      
<input type="text" name="cno" />
<br />
<input type="submit" name="action" value="删除"/>
</form>


</body>
</html>