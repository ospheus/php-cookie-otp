<?
include "inc/checa_autenticacao.php";
?>
<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<title>..:: Poc OTP ::..</title>

	<link rel="stylesheet" href="css/form.css" media="screen">
	<script src="js/f5.js" language="javascript"></script>

	<style>body{background:url(img/bg.png) center;margin: 0 auto;width: 960px;padding-top: 50px}.footer{margin-top:50px;text-align:center;color:#666;font:bold 14px Arial}.footer a{color:#999;text-decoration:none}.geral-form{margin: 50px auto;}</style>
<meta name="robots" content="noindex,follow" />
<script>
   function enviar(){
         document.form1.csrf.value = document.cookie.split("<?=$_SESSION['cookieOtp']?>=")[1].split(";")[0];
         return true;  
 
	 }
</script>
</head>

<body>


<div class="geral-form">

	<h1>Cadastro</h1>

<form name="form1" method="post" onsubmit="return enviar();">
  <input type="text" name="nome" placeholder="Nome" ><br>
  <input type="text" name="email" placeholder="E-mail"><br>
  <input type="hidden" name="csrf"><br>
  <input type="submit" vale="enviar">

</form>

</div>




</body>

</html>