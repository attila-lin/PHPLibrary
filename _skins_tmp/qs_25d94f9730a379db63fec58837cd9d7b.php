<html>
<head>
	<title><?php
echo $_obj['title'];
?>
</title>
</head>
<body>

<form action="bookmanage.php" method="post">
单本入库<br />

类别<input type="text" name="category" /><br /> 
书名<input type="text" name="title" /><br /> 
出版社<input type="text" name="press" /><br /> 
年份<input type="text" name="year" /><br /> 
作者<input type="text" name="author" /><br /> 
价格<input type="text" name="price" /><br /> 
数量<input type="text" name="total" /><br />
<br /><br /><br />
briefcontent <input type="text" name="briefcontent" /><br />
labels<input type="text" name="labels" /><br />
cover<input type="text" name="cover" /><br />
page<input type="text" name="page" /><br />
format<input type="text" name="format" /><br />
doubanID<input type="text" name="doubanID" /><br />
ISBN<input type="text" name="ISBN" /><br />

<input type="submit" name="action" value="insert"/>
</form>

<form action="bookmanage.php" method="post">
批量入库<br />
<input type="file" name="file" value="" />
<p></p>
<input type="submit" name="action" value="提交"  />

</form>

</body>
</html>