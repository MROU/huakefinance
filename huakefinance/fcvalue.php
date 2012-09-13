<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
 if($userid==NULL)
	   {
		  header("Location:../loginORregister/login.html");   
	   }
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link   type="text/css"  rel="stylesheet" href="../common//header.css" />
</head>

<body>
<?php 
  require_once("../common//banner.html");
?>
<?php
  session_start();
  $userid=$_SESSION['userid'];
    $con=mysql_connect("localhost","root","");
   mysql_select_db("login",$con);
   $sql="SELECT * FROM userbuyorsell where uname='$userid'";
   $res=mysql_query($sql);
  while($row=mysql_fetch_row($res))
	{
	  echo $row[0]."  ".$row[1]."  ".$row[2]."  ".$row[3]."  ".$row[4]."  ".$row[5]."<br>";
	  	
	} 

?>
</body>
</html>