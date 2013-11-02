<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php
echo $_obj['title'];
?>
</title>
<!-- Fav icon -->
<link href=<?php
echo $_obj['tpl_img'];
?>
'favicon.ico' rel='shortcut icon' type=<?php
echo $_obj['tpl_img'];
?>
'x-icon'>
<link href=<?php
echo $_obj['tpl_css'];
?>
bootstrap.min.css rel="stylesheet" media="screen">
<link href=<?php
echo $_obj['tpl_css'];
?>
bootstrap-responsive.min.css rel="stylesheet" media="screen">
<script src=<?php
echo $_obj['tpl_js'];
?>
jquery.js ></script>
<script src=<?php
echo $_obj['tpl_js'];
?>
bootstrap.min.js ></script>
</head>

<body style="background-color:#333333;width:960px">
<div class="container">
	<div class="span12" style="margin-top:1%;margin-left:14%">
		<div class="span2 ">
			<a href="#"><img src=<?php
echo $_obj['tpl_img'];
?>
logo.png /></a>
	    </div>
		<div class="span4 offset5" style="margin-top:0.7%">
			<a href="#"><img src=<?php
echo $_obj['tpl_img'];
?>
sign.png width="120px"/></a>
			<a href="#"><img src=<?php
echo $_obj['tpl_img'];
?>
login.png width="120px" /></a>
	    </div>
	</div>
	<div class="span12" style="margin-top:1%;margin-left:10%;background-image:url(<?php
echo $_obj['tpl_img'];
?>
banner1.png);height:435px;width:1200px">
		<form action="searchres.php" method="get">
			<input type="text" name="q" style="margin-top:13.8%;margin-left:23.5%;width:185px;height:40px;"/>

			<a href="javascript:form1.submit();">
				<img src=<?php
echo $_obj['tpl_img'];
?>
submit.png border="0" style="margin-top:12.8%;margin-left:0.4%;width55px;height:45px;" >
			</a>
			<input type ="submit" value="ok" />
		</form>
	</div>
	<div class="span12 row-fluid" style="margin-top:2%;margin-left:14%;white-space:nowrap">
		<div class="span2">
			<h2 style="color:#66ccff">Really like us? Share with your friends!</h2>
		</div>
		<div class="span10">
			<a><img src=<?php
echo $_obj['tpl_img'];
?>
sina.png width="50px" height="50px" style="margin-left:70%"></a>
			<a><img src=<?php
echo $_obj['tpl_img'];
?>
QQ.png width="50px" height="50px"></a>
			<a><img src=<?php
echo $_obj['tpl_img'];
?>
renren.png width="50px" height="50px"></a>
		</div>
	</div>		
</div>

</body>

</html>