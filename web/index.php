<?php
$sqlhost='localhost';
$sqluser='root';
$sqlpwd='';
$sqldb='';
$username='10001';
$uid=;
$payno='';
?>

<?php
$mysqli = new mysqli("$sqlhost", "$sqluser", "$sqlpwd", "$sqldb");
if (mysqli_connect_errno()){
    printf("ERROR: %s\n", mysqli_connect_error());
    $mysqli=null;
    exit;
}
$query="SELECT * FROM members WHERE username=$username";
$result=$mysqli->query($query);
$row = $result->fetch_array();
$price=$row['price'];
$expire_time=$row['expire_time'];
$email=$row['email'];
$result->free();
$mysqli->close();

?>



<!DOCTYPE html>
<html lang="en_US">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>LazyPT-雷击霹雳</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link href="./css" rel="stylesheet" type="text/css">
<link href="./style.css" rel="stylesheet" type="text/css">
</head>

<body>
<header>
<h1>LazyPT</h1>
<p><a href="http://www.lazypt.co/">lazypt.co</a>雷击霹雳</p>
</header>

<main>
<section>
<img src="./utorrent.png">
<div>
<h2>RuTorrent</h2>
    <p>SeedBox IP: <?php echo $email; ?>
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
  if (($expire_time-time())<604800) {echo "  请即使续费";}
?>

<?php
echo '<form name="alipaypay" method="post" accept-charset="gbk" action="http://senlinpay.com/api.php" target="_black">';
echo '<input type="hidden" name="uid" value="'.$uid.'">';
echo '<input type="hidden" name="payno" value="'.$payno.'">';
echo '<input type="hidden" name="price" value="'.$price.'">';
echo '<input type="hidden" name="title" value="'.$username.'">';
echo '<input type="submit" value="充值30天"></form>';
?>

<p><a href="http://pt.lazypt.co/" target="_blank">修改密码</a></p>

</div>
</section>
</main>

<footer>
<p>©2016 - 2017 <br> <a href="http://www.lazypt.co/">雷击霹雳</a></p>
</footer>
</body>
</html>
