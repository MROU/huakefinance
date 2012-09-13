
<?php
 if($userid==NULL)
	   {
		  header("Location:../loginORregister/login.html");   
	   }
?>
<?php
  
  
  session_start();
  //test price
  $symn=$_GET['buysymbolname'];
  
  $_SESSION['symbolname']=$symn;
  $handle = fopen("http://download.finance.yahoo.com/d/quotes.csv?s='$symn'&f=nsl1d1&e=.csv", "r");
  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    echo  "Company name:".$data[0]." Symbol Name:".$data[1]."<br>Last Trade:".$data[2]."<br>Time:".$data[3];
	$_SESSION['symbolprice']=$data[2];
  }
  
    
   $con=mysql_pconnect("localhost","root","");
   $uname=$_SESSION['userid'];
    if($con)
	{
		mysql_select_db("login",$con) or die("没有找到相应数据库".mysql_error());
		
		$sql="select cash from useraccount where uname='$uname'";
		$res=mysql_query($sql);
		if($row=mysql_fetch_row($res))
		echo "<br>你的现金为：".$row[0];
		
		    	
		
		
	}
	
	

?>
