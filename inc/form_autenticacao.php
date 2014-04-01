<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<title>..:: Poc OTP ::..</title>

	<link rel="stylesheet" href="css/login-form.css" media="screen">

	<style>body{background:url(img/bg.png) center;margin: 0 auto;width: 960px;padding-top: 50px}.footer{margin-top:50px;text-align:center;color:#666;font:bold 14px Arial}.footer a{color:#999;text-decoration:none}.login-form{margin: 50px auto;}</style>
<meta name="robots" content="noindex,follow" />
<script>
 if(top.frames.length>0){
	 top.location = 'index.php';
 }
</script>
</head>

<body>

<div class="login-form">

	<h1>Poc OTP</h1>

	<form action="index.php" method="post">

		<input type="text" name="username" placeholder="username">
		
		<input type="password" name="password" placeholder="password">
		
		
		<input type="submit" value="log in">

	</form>

</div>

<? 
if( $autenticacao == 2){
?>
 <script>alert('Login ou senha invalidos!')</script>
<?
}
?>
</body>

</html>
