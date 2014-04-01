<?
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
