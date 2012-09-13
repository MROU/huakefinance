<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php 
   
   sleep(5);
   $username=$_POST['username'];
   //$pass=hash("SHA1",$_POST['pass']);
   $pass=$_POST['pass'];
   //在接收email时，出了一点小问题，那就是提示email。undefined，原来就是因为我在register.html中定义name=“email ”时，多了一个空格。，
   $email=$_POST['email'];
   
   
  
   
  
 $con=mysql_pconnect('localhost','root','');
 if($con)
 {
  	 
	    //echo "success!"; 

	    
	    mysql_select_db('login',$con) or die("failed".mysql_error());
		$sql1="select *  from users where uname='$username'";
		$res1=mysql_query($sql1);
		 echo "success1!"; 
		if($row=mysql_fetch_row($res1))
		{
			echo "success!"; 
		     echo  "<strong>用户名已经存在</strong>";	
		}
		else
		{
			
			//echo "success!"; 
			//echo "用户名".$username."密码".$pass;
	        $sql="insert into  users  values('$username','$pass','$email',10000)";
	        $res=mysql_query($sql) or die("数据插入失败".mysql_error());
			$sql1="insert into  useraccount  values('$username',10000)";
	        $res1=mysql_query($sql1) or die("数据插入失败".mysql_error());
	        header("location:login.html");
	   
}
}
else
{
echo  "<script>alert('failed！');window.location='register.html';</script>";
}
//如果不关闭，也不会出错。

 mysql_close($con);
?>
</body>
</html>