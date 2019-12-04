<?php 
 header("Content-Type:text/html;charset=utf-8"); 
 session_start(); 
 //首先判断Cookie是否有记住用户信息 
 if(isset($_COOKIE['username'])) 
 { 
  $_SESSION['username']=$_COOKIE['username']; 
  $_SESSION['islogin']=1; 
 } 
 if(isset($_SESSION['islogin'])) 
 { 
  //已经登录 
  echo $_SESSION['username'].":你好，欢迎进入个人中心！<br/>"; 
  echo "<a href='logout.php'>注销</a>"; 
	echo '<form action="add.php" method="post">';
	echo '<em>Single Create</em><br>';
	echo '<input type="text" name="table_name">';
	echo '<input type="submit" value="Generate" ><br>';
	echo '</form><br>';
	echo '<form action="add_mass.php" method="post">';
	echo '<em>Mass Create</em>';
	echo '<p>Prefix name<input type="text" name="prefix_name"><br>';
	echo 'From index<input type="text" name="fromindex">';
	echo 'To index<input type="text" name="toindex">';
	echo '<input type="submit" value="Mass Generate" ></p>';
	echo '</form>';
	}
 else
 { //为登录 
  echo "你还未登录，请<a href='login.html'>登录</a>"; 
 } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WXTB</title>
	<!-- 	<script src="http://wechatfe.github.io/vconsole/lib/vconsole.min.js?v=3.2.0"></script>
	    <script>
	        // init vConsole
	        var vConsole = new VConsole();
	        console.log('Hello world');
	    </script> -->
	<!-- <script src="fn.js"></script> -->
<link href="./cnzz_files/sCommon_1dc4fc12.css" rel="stylesheet" type="text/css">
  <link href="./cnzz_files/site_getcode_9680ce5c.css" rel="stylesheet" type="text/css">
</head>
<body>


		
</body>
</html>