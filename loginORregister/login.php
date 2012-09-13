<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php 
   session_start();
 //htmlspecialcharsh函数可以防止很多的攻击，最常见的如SQL
 $uname=htmlspecialchars($_POST['username']);
 $_SESSION['userid']=$uname;
 $pass=htmlspecialchars($_POST['pass']);
// $uname=$_POST['username'];
 //$pass=$_POST['pass'];

$con=mysql_pconnect("localhost","root","");
if($con)
{
mysql_select_db('login',$con) or die("failed".mysql_error());
$sql="select * from users  where uname='$uname' and upass='$pass'";
$res=mysql_query($sql);
if($row=mysql_fetch_row($res))
{
	
   header("location:../huakefinance/finance.php");
}
else
{
	echo  "<script>alert('用户名或密码错误，请重新登录！');window.location='login.html';</script>";
    	
}

}
else
{
  echo 	"连接数据库失败！";
}

?>
</body>
</html>