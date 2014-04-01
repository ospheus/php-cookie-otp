<?
include "../inc/config.php";
session_start();
if( empty($_SESSION['work']) ){
   $_SESSION['work'] = 1;
    if($_SESSION['token_script']==$_GET['t']){
			$decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, OTP_SESSION_PWD, base64_decode($_SESSION['secret']), MCRYPT_MODE_CBC, OTP_SESSION_IV);
			echo $decrypted;
      //  echo "VGQWIALN4ROLT57X";
		}else{
      echo "Token inválido.";
		}
}
?>
