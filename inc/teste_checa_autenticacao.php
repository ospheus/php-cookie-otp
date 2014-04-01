<?
session_start();
//date_default_timezone_set('America/Denver');
$s = date("Y-m-d g:i:s A", time());

echo $s;
echo "<br><br>";
require_once 'inc/GoogleAuthenticator.php';
//require_once 'GoogleAuthenticator.php';
include "config.php";

$ga = new PHPGangsta_GoogleAuthenticator();

$secret = $_SESSION['secret'];

$tempo = floor(time() / TEMPO_OTP);
$oneCode0 = $ga->getCode($secret,$tempo-1);
$oneCode1 = $ga->getCode($secret,$tempo);
$oneCode2 = $ga->getCode($secret,$tempo+1);

echo $_COOKIE["cookie-otp"]." - $oneCode0 - ".$_SESSION['secret']."<br>\n";
echo $_COOKIE["cookie-otp"]." - $oneCode1 - ".$_SESSION['secret']."<br>\n";
echo $_COOKIE["cookie-otp"]." - $oneCode2 - ".$_SESSION['secret']."<br>\n";

echo "<br><br>TEMPO: $tempo<br>";
echo floor(time());


echo "<br>[".TEMPO_OTP."]";

//if ( $_COOKIE["cookie-otp"] != $oneCode1) {
if ( ($_COOKIE["cookie-otp"] != $oneCode0) & ($_COOKIE["cookie-otp"] != $oneCode1) & ($_COOKIE["cookie-otp"] != $oneCode2) ) {
  echo "Não aceito";
}else{
  echo "OK";
}

exit;
$checkResult = $ga->verifyCode($secret, $_COOKIE["cookie-otp"], 2);    // 2 = 2*30sec clock tolerance
if ($checkResult) {
   // echo 'cookie - OK<br>';
} else {
    session_destroy();  
    header("Location: index.php");
    exit;
}


?>
