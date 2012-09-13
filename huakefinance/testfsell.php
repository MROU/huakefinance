    <!DOCTYPE html>
    <?php
 if($userid==NULL)
	   {
		  header("Location:../loginORregister/login.html");   
	   }
?>
    <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    </head>
    
    <body>
    <?php 
       session_start();
       
       $sellsymbol=$_GET['sellsymbol'];//出售的公司名称
       $sellnum=$_GET['sellnum'];//出售的数量
       $con=mysql_pconnect("localhost","root","");
       mysql_select_db("login",$con);
       $sql="SELECT sum(num) FROM userbuyorsell where symbol='$sellsymbol'";
       $res=mysql_query($sql);
       $allnum=0;//初始化用户已买查询公司的股票数量
       $price=$_SESSION['symbolprice'];
       
       $chajia=0;//求出两次的差价
       $liyun=0;
       $userid=$_SESSION['userid'];
       
       $newmoney=0;//更新后users中money
       $newcash=0;//更新后useraccount中的cash
       $time=date('Y-m-d h:i:s');
       
     if($res==NULL)
     {
         echo "你没有买".$sellsymbol."的股票";
             
     }
     else
     {
        
        if($row=mysql_fetch_row($res))
        {
          
          $allnum=$row[0];	
        } 
        if($sellnum>=0&&$sellnum<=$allnum)
        {
             $sql1="SELECT nowprice FROM userbuyorsell where symbol='$sellsymbol'";
             $res1=mysql_query($sql1);
             if($row1=mysql_fetch_row($res1))
             {
               
               $chajia=$row1[0]-$price;
              
               $liyun=$chajia*$sellnum;
              
             }
        } 
             $sql2="SELECT money FROM users where uname='$userid'";
             $res2=mysql_query($sql2);
            if($row2=mysql_fetch_row($res2))
             {
                echo $row2[0];
                $newmoney=$row2[0]+$liyun;
                
                echo "money".$newmoney;
             }
             $sql3="update users set money='$newmoney' where uname='$userid'";
             $res3=mysql_query($sql3);
             
                $sql4="SELECT cash FROM useraccount where uname='$userid'";
                $res4=mysql_query($sql4);
          if($row4=mysql_fetch_row($res4))
             {
                echo $row4[0];
                $newcash=$row4[0]+$sellnum*$price;
             }
                 $sql5="update useraccount set cash='$newcash' where uname='$userid'";
                 $res5=mysql_query($sql5);
                $sql6="insert into userbuyorsell values('$userid','$sellsymbol','sell',$sellnum,'$price','$time')";
                mysql_query($sql6);
          }
    ?>
    </body>
    </html>