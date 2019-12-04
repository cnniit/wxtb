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
$prefix_name = $_POST['prefix_name'];
$fromindex = $_POST['fromindex'];
$toindex = $_POST['toindex'];
$a = $prefix_name.$fromindex;
$b = $prefix_name.$toindex;

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

$sql = "
CREATE DEFINER=`root`@`localhost` PROCEDURE `cnzzdb`.`myproce3`(in `prefix_name` varchar(80),in `fromindex` int,in `toindex` int)
begin

DECLARE i INT;
DECLARE table_name VARCHAR(120);
SET i = fromindex;
 
WHILE  i<toindex DO

SET table_name = CONCAT(prefix_name,i);

SET @csql = CONCAT(
	'CREATE TABLE ',table_name,'(
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`cnzzdm` varchar(255) DEFAULT NULL,
		`cnzztj` varchar(255) DEFAULT NULL,
		`utq2` varchar(255) DEFAULT NULL,
		`utq3` varchar(255) DEFAULT NULL,
		`byjc` varchar(255) DEFAULT NULL,
		`byzh` varchar(255) DEFAULT NULL,
		`bPC` varchar(11) DEFAULT NULL,
		PRIMARY KEY (`id`)
	  
	  )ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8'
	  );
 
PREPARE create_stmt FROM @csql;
EXECUTE create_stmt;
SET i = i+1;
END WHILE;
	
end
";
mysqli_query($conn, $sql);//创建一个myproce2的存储过程
$sql = "call `cnzzdb`.`myproce3`('$prefix_name',$fromindex,$toindex);";

if (mysqli_query($conn, $sql)) {
    echo "$dbname 数据表 $a ~ $b 批量创建成功<br/>";
} else {
    echo "$dbname 批量创建数据表错误: " . mysqli_error($conn)."<br/>";
}

mysqli_close($conn);

$dbname = "zhwechat";

// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}

$sql = "
CREATE DEFINER=`root`@`localhost` PROCEDURE `zhwechat`.`myproce2`(in `prefix_name` varchar(80),in `fromindex` int,in `toindex` int)
begin

DECLARE i INT;
DECLARE table_name VARCHAR(120);
SET i = fromindex;
 
WHILE  i<toindex DO

SET table_name = CONCAT(prefix_name,i);

SET @csql = CONCAT(
'CREATE TABLE ',table_name,'(
`id` int(50) unsigned NOT NULL AUTO_INCREMENT,
`weixin` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
)ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8'
);
 
PREPARE create_stmt FROM @csql;
EXECUTE create_stmt;
SET i = i+1;
END WHILE;
	
end
";
mysqli_query($conn, $sql);//创建一个myproce2的存储过程
$sql = "call `zhwechat`.`myproce2`('$prefix_name',$fromindex,$toindex);";

if (mysqli_query($conn, $sql)) {
    echo "$dbname 数据表 $a ~ $b 批量创建成功<br/>";
} else {
    echo "$dbname 批量创建数据表错误: " . mysqli_error($conn);
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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<!-- <script src="fn.js"></script> -->
</head>
<body>
</body>
</html>