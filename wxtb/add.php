<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- <script src="fn.js"></script> -->
</head>
<body>
</body>
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
$table_name = $_POST['table_name'];

$servername = "localhost";
$username = "root";
$password = "aa5251020";
$dbname = "cnzzdb";

// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}

	$sql = 'SELECT * from _device_uuid';
	//echo "$sql";
	$result = mysqli_query($conn,$sql);
	//var_dump(mysqli_num_rows($result));
	//echo "查询结果:";
	
	//echo htmlspecialchars($_SERVER["PHP_SELF"]);
	if($result){
	    if(mysqli_num_rows($result) > 0){
	        while($row = mysqli_fetch_assoc($result)){
				
	            echo "Name: " . $row["device"]. "<br>";
	        }
	    }
	}


// 使用 sql 创建数据表
$sql = "CREATE TABLE $table_name (
`id` int(11) NOT NULL AUTO_INCREMENT,
`cnzzdm` varchar(255) DEFAULT NULL,
	`cnzztj` varchar(255) DEFAULT NULL,
	`utq2` varchar(255) DEFAULT NULL,
	`utq3` varchar(255) DEFAULT NULL,
	`byjc` varchar(255) DEFAULT NULL,
	`byzh` varchar(255) DEFAULT NULL,
	`bPC` varchar(255) DEFAULT NULL,
	PRIMARY KEY (`id`)
	)ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8
";


if (mysqli_query($conn, $sql)) {
    echo "$dbname 数据表 $table_name 创建成功<br/>";
} else {
    echo "$dbname 创建数据表错误: " . mysqli_error($conn)."<br/>";
}

mysqli_close($conn);

$dbname = "zhwechat";

// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}

// 使用 sql 创建数据表
$sql = "CREATE TABLE $table_name (
`id` int(50) unsigned NOT NULL AUTO_INCREMENT,
`weixin` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8
";


if (mysqli_query($conn, $sql)) {
    echo "$dbname 数据表 $table_name 创建成功";
} else {
    echo "$dbname 创建数据表错误: " . mysqli_error($conn);
}

mysqli_close($conn);

// header("refresh:1;url=./manage.php?web=$web");


	}
 else
 { //为登录 
  echo "你还未登录，请<a href='login.html'>登录</a>"; 
 } 
?>
<?php

?>


</html>