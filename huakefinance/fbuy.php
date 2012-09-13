<!DOCTYPE html>
<?php
 if($userid==NULL)
	   {
		  header("Location:../loginORregister/login.html");   
	   }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<body>
<?php 


    session_start();
    $num=$_GET['num'];
	echo "你买了".$num."股";
    $time=date('Y-m-d h:i:s');
	echo "时间".$time;
	$userid=$_SESSION['userid'];
	
	$symbolname=$_SESSION['symbolname'];
	
	$price=$_SESSION['symbolprice'];
  
	$all=$price*$num;
	$shengyu=0;
	$nownum=0; 
	$nowsymbolprice=0;
	$con=mysql_pconnect("localhost","root","");
	if($con)
	{
		mysql_select_db("login",$con);
		$sql="select cash from useraccount where uname='$userid'";
		$res=mysql_query($sql);
	if($row=mysql_fetch_row($res))
	{
		echo "现金".$row[0]."<br>";
		echo $all."<br>";
	 	$shengyu=$row[0]-$all;
		echo "剩余".$shengyu;
		
	}	
	
	   if($shengyu>=0)
	   {
		  $sql1="update useraccount set cash='$shengyu' where uname='$userid'";
		  mysql_query($sql1);
		  echo "你的现金剩余".$shengyu;
		  
		  
	      $sql4="SELECT sum( num ) FROM userbuyorsell WHERE symbol = '$symbolname' AND uname = '$userid'";
		  $res4=mysql_query($sql4);
		  if($row1=mysql_fetch_row($res4))
	       {
	         	 echo "geshu".$row1[0]."<br>";
	    	     $nownum=$row1[0]; 
	       }
		   $sql5="SELECT nowprice FROM userbuyorsell WHERE symbol = '$symbolname' AND uname = '$userid'";
		   $res5=mysql_query($sql5);
		   if($row2=mysql_fetch_row($res5))
	       {
	         	echo $row2[0]."<br>";
	    	    $nowsymbolprice=$row2[0];
	       }	
		  		
	        
	      $sql3="insert into userbuyorsell values('$userid','$symbolname','buy',$num,'$price','$time')";
	       mysql_query($sql3);
		   $oldmoney=0;
		    $sql6="select money from users where uname='$userid'";
	       $res6=mysql_query($sql6);
			   if($row3=mysql_fetch_row($res6))
	       {
	         	echo "xianj".$row3[0]."<br>";
	    	    $oldmoney=$row3[0];
	       }	
		   $money=($price-$nowsymbolprice)*$nownum+$oldmoney;
		  echo $money;
	      $sql2="update users set money='$money' where uname='$userid'";
	      mysql_query($sql2);
	 
	   }
	   else
	   {
	 	  echo "你的现金不够！";
	   }
	
	   	
	}
	else
	{
	     echo "连接数据库失败！";	
	}

?>
</body>
</html>