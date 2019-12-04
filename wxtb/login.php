
<?php 

 header("Content-Type:text/html;charset=utf-8"); 
 session_start(); 
 if(isset($_POST['login'])) 
 { 
  $username = trim($_POST['username']); 
  $password = md5(md5(md5(trim($_POST['password'])))); 
    	//连接数据库
        $dsn = mysqli_connect('localhost','root','aa5251020','cnzzdb');
        //查询
        $sql = "SELECT * from _device where u = '".$username."' and p = '".$password."'";
        //echo "$sql";
        $result = mysqli_query($dsn,$sql);
        $row = mysqli_fetch_assoc($result);
  if(($username=='')||($password=='')) 
  { 
   header('refresh:1;url=login.html'); 
   echo "改用户名或密码不能为空，1秒后跳转到登录页面"; 
   exit; 
  } 
    
  else if($row['u']!=$username && $row['p']!=$password) 
  { 
   //用户名或密码错误 
   header('refresh:1;url=login.html'); 
   echo "用户名或密码错误，1秒后跳转到登录页面"; 
   exit; 
  } 
  else if($row['u']==$username && $row['p']==$password) 
  { 
   //登录成功将信息保存到session中 
   $_SESSION['username']=$username; 
   $_SESSION['islogin']=1; 
   //如果勾选7天内自动保存，则将其保存到cookie 
   if(@$_POST['remember']=="yes") 
   { 
    setcookie("username",$username,time()+7*24*60*60); 
    setcookie("code",md5($username.md5($password)),time()+7*24*60*60); 
   } 
   else
   { 
    setcookie("username",'',time()-1); 
    setcookie("code",'',time()-1); 
   } 
   //跳转到用户首页 
   header('refresh:1;url=index.php'); 
  } 
 } 
?>