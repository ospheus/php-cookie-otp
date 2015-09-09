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

session_start();
require_once 'inc/GoogleAuthenticator.php';
include "config.php";

$ga = new PHPGangsta_GoogleAuthenticator();

$decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, OTP_SESSION_PWD, base64_decode($_SESSION['secret']), MCRYPT_MODE_CBC, OTP_SESSION_IV);
$secret = $decrypted;

$tempo = floor(time() / TEMPO_OTP);
//$oneCode = $ga->getCode($secret,$tempo);
$oneCode0 = $ga->getCode($secret,$tempo-1);
$oneCode1 = $ga->getCode($secret,$tempo);
$oneCode2 = $ga->getCode($secret,$tempo+1);

$debug = "";
//$debug = "c=".$_COOKIE["cookie-otp"]."&o=$oneCode&s=".$_SESSION['secret']."&t=".TEMPO_OTP."&tempo=$tempo";

//echo $_COOKIE["cookie-otp"]." - $oneCode - ".$_SESSION['secret']."<br>\n";
/**/
if ( ($_COOKIE[$_SESSION['cookieOtp']] != $oneCode0) & ($_COOKIE[$_SESSION['cookieOtp']] != $oneCode1) & ($_COOKIE[$_SESSION['cookieOtp']] != $oneCode2) ) {
   session_destroy();  
   header("Location: index.php");
   exit;
}else{
   if( ($_SERVER['REQUEST_METHOD']=='POST') & ($_COOKIE[$_SESSION['cookieOtp']] != $_POST["csrf"]) ){
     $_SESSION['msg-erro'] = "Token anti csrf inválido, refaça a operação.";
     header("Location: erro.php");
     exit;
   }

}



?>
