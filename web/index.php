<?php include "inc.php";?>

<?php
$con = mysql_connect($sqlhost,$sqluser,$sqlpwd);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($sqldb, $con);

$result = mysql_query("SELECT * FROM members WHERE username=$username");
$price=mysql_fetch_array($result)['price'];

$result = mysql_query("SELECT * FROM members WHERE username=$username");
$expire_time=mysql_fetch_array($result)['expire_time'];
mysql_close($con);

?>


<!DOCTYPE html>
<html lang="en_US">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>LazyPT</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link href="./css" rel="stylesheet" type="text/css">
<link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>
<h1>LazyPT</h1>
<p>Enjoy PT!</p>
</header>

<main>
<section>
<img src="./utorrent.png">
<div>
<h2>RuTorrent</h2>
<p><a href="./rutorrent/">PT下载工具</a></p>
</div>
</section>

<section>
<img src="./explorer.png">
<div>
<h2>File explorer</h2>
<p><a href="./Downloads/">浏览文件</a></p>
</div>
</section>

<section>
<img src="./recharge.png">
<div>
<h2>Recharge</h2>

<?php
  echo "到期日:";
  echo date('Y-m-d',$expire_time);
  echo "<br />";

?>

<p><a href="http://senlinpay.com/api.php?
<?php echo "uid=".$uid."&payno=".$payno."&price=".$price."&title=".$username; ?>
" target="_blank">充值</a></p>

<p><a href="http://www.lazypt.co/" target="_blank">修改密码</a></p>

</div>
</section>
</main>

<footer>
<p>©2016 - 2017 <br> <a href="http://ip100.info/">IP100.info</a> | <a href="https://www.google.com/">Blog</a> | <a href="https://www.google.com">Google</a></p>
</footer>
</body>
</html>