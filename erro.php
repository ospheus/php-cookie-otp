<?
include "inc/checa_autenticacao.php";
?>
<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<title>..:: Poc OTP ::..</title>

	<link rel="stylesheet" href="css/form.css" media="screen">

	<style>body{background:url(img/bg.png) center;margin: 0 auto;width: 960px;padding-top: 50px}.footer{margin-top:50px;text-align:center;color:#666;font:bold 14px Arial}.footer a{color:#999;text-decoration:none}.geral-form{margin: 50px auto;}</style>
<meta name="robots" content="noindex,follow" />
</head>

<body>
<div class="geral-form">
<br><br>

	<h1>  <?=$_SESSION['msg-erro']?></h1>

<form name="form1" method="post" onsubmit="return false">
  <input type="submit" value="voltar" onclick="window.history.back()">
</form>

</div>

</body>

</html>
