<?
/*
 * Cookie OTP - https://github.com/ospheus/php-cookie-otp
 * Copyright (C) 2015 Osvaldo osvaldo@studiomovel.com.br
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

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
