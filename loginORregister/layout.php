<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

 session_start();
 session_destroy();
 echo "<script>alert('退出成功');window.location='login.html'</script>";
?>