<!DOCTYPE html>
<html>
<?php
 if($userid==NULL)
	   {
		  header("Location:../loginORregister/login.html");   
	   }
?>
<head>
<link rel="icon" type="image/ico" href="../images/1.ico"/>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HuaKe Finance</title>
<link   type="text/css"  rel="stylesheet" href="../common//header.css" />

</head>

<body>

<script>
/*$(document).ready(function()
{
	$(".getsymbol").click(function()
	{
		 htmlobj=$.ajax({url:"fgetcsv4.php",async:false});
         $("symbollasttrade").html(htmlobj.responseText);

})
	
});*/
var xhr=null;
function getsymbol()
{ 
     var buysymn=document.getElementById("buysymbolname").value;
	try
	{
	   xhr=new XMLHttpRequest();
	}
	catch(e)
	{
	     xhr=new ActiveXObject("Microsoft.XMLHTTP");	
	}
	if(xhr==null)
	{
		alert("Ajax 不支持！");
	}
	var url="fgetcsv4.php?buysymbolname="+buysymn;
	xhr.onreadystatechange=function()
	{
		
            if (xhr.readyState == 4)
            {
                if (xhr.status == 200)
				{
				  
				   document.getElementById("symbollasttrade").innerHTML=xhr.responseText;
				   document.getElementById("buysymbol").style.display='block';		   
				}
               else
			   {
                    alert("Error with Ajax call!");
			   }
            }
		
	}
	xhr.open("GET",url,true);
	xhr.send(null);
	
	
	
	
	
}



function buysymbol()
{ 
   var num=document.getElementById("num").value;
   
	try
	{
	   xhr=new XMLHttpRequest();
	}
	catch(e)
	{
	     xhr=new ActiveXObject("Microsoft.XMLHTTP");	
	}
	if(xhr==null)
	{
		alert("Ajax 不支持！");
	}
	var url="fbuy.php?num="+num;
	xhr.onreadystatechange=function()
	{
		
            if (xhr.readyState == 4)
            {
                if (xhr.status == 200)
				{
				  
				   document.getElementById("buysymbol").innerHTML=xhr.responseText;
		          	   
				}
               else
			   {
                    alert("Error with Ajax call!");
			   }
            }
		
	}
	xhr.open("GET",url,true);
	xhr.send(null);
	
	
	
}

//当这里用函数sellsymbol()不能运行成功，我怀疑是下面id也是sellsymbol的原因，
function testsellsymbol()
{ 
   
 
   var symbolname=document.getElementById("sellsymbol").value;
     var num=document.getElementById("sellnum").value;
	try
	{
	   xhr=new XMLHttpRequest();
	}
	catch(e)
	{
	     xhr=new ActiveXObject("Microsoft.XMLHTTP");	
	}
	if(xhr==null)
	{
		alert("Ajax 不支持！");
	}
	//var url="fsell.php?sellsymbol="+symbolname&"sellnum="+num;
	var url="testfsell.php?sellsymbol="+symbolname+"&sellnum="+num;
	xhr.onreadystatechange=function()
	{
		
            if (xhr.readyState == 4)
            {
                if (xhr.status == 200)
				{
				  
				   document.getElementById("textsellsymbol").innerHTML=xhr.responseText+"jjjj";
		          	   
				}
               else
			   {
                    alert("Error with Ajax call!");
			   }
            }
		
	}
	xhr.open("GET",url,true);
	xhr.send(null);
	
	
	
}


</script>
<?php 
  require_once("../common/banner.html");
?>
<div class="content">
<div class="incontent1">
<strong>Get  shares of a stock:</strong> 
<form method="get"  action=""  onsubmit="getsymbol();return false;"><input  name="buysymbolname"  id="buysymbolname" type="text" /><input  type="submit"  class="getsymbol" value="Get Symbol Quot"/></form>
<p id="symbollasttrade"></p>
<!--当要提交数据时，用了return false，则数据并没有提交-->
<div  style="display:none" id="buysymbol">
<strong>Buy  shares of a stock:</strong> 
<form method="get" action="" onsubmit="buysymbol();return false;" >
Num:<input  name="num" type="text"  id="num"/>
<input type="submit"  id="buy" value="Buy">
</form>
</div>
<p id="buysymbol"></p>
</div>






<!--如果要在本页面显示，表单里面的return false不能少-->
<div class="incontent1">
<strong>Sell  shares of a stock:</strong> 

<form method="get"  action="" onsubmit="testsellsymbol();return false;"  >
Company symbol:<input type="text"  name="sellsymbol" id="sellsymbol"  />
Stock  Share:<input id="sellnum" type="text"   name="sellnum"/>
<input type="submit"  value="Sell"   />
</form>
<p id="textsellsymbol"></p>
</div>

<div class="incontent1">
<strong>(History Trade):</strong> 
<form method="get" action="fcvalue.php" onsubmit="">
<input type="submit"  value="now money"/>
</form>
</div>

<div class="footer">
Huake Finance. Copyright 2013. All right Ouyang Songbai reserved.
</div>
</div>

</body>
</html>
