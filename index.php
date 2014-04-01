<?
include "inc/session.php";
include "inc/config.php";

function removeCookieOtp(){
   if(isset($_COOKIE)){
       $arrCookieOtp = $_COOKIE;  
       foreach(array_keys($arrCookieOtp) as $key){
 				  setcookie($name = $key, $value='deleted', $expire = time()-999999, "/", $domain='', $secure=false, $httponly=false);
			 }
	 }
}

$autenticacao = 0;
if( isset($_POST['username']) ){
   if( ($_POST['username'] == 'teste') && ($_POST['password'] == '123456') ) {         
			 require_once 'inc/GoogleAuthenticator.php';
			 $ga = new PHPGangsta_GoogleAuthenticator();
			 $secret = $ga->createSecret();
			 $tempo = floor(time() / TEMPO_OTP);
			 $oneCode = $ga->getCode($secret,$tempo);
			 //setcookie($name = "cookie-otp", $value=$oneCode, $expire = 0, "/", $domain='', $secure=false, $httponly=false);
			 setcookie($name = $_SESSION['cookieOtp'], $value=$oneCode, $expire = 0, "/", $domain='', $secure=false, $httponly=false);
       $_SESSION['autenticacao'] = 1;
			 session_regenerate_id();
			 $encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, OTP_SESSION_PWD, $secret, MCRYPT_MODE_CBC, OTP_SESSION_IV); 
			 $_SESSION['secret'] = base64_encode($encrypted);	
			 $_SESSION['token_script'] = md5(md5($secret));
       header("Location: index.php");
       exit;
   }else{
		   $autenticacao = 2;
   }
}

if(isset( $_SESSION['autenticacao'])){
  $autenticacao = $_SESSION['autenticacao'];
  $_SESSION['autenticacao'] = "";
}

if( $autenticacao == 1){
  include "inc/frame_autenticado.php";
}else{
	setcookie($name = "PHPSESSID", $value='deleted', $expire = time()-999999, $pathApp, $domain='', $secure=false, $httponly=true);		
//	setcookie($name = "cookie-otp", $value='deleted', $expire = time()-999999, "/", $domain='', $secure=false, $httponly=false);	
//	setcookie($name = $_SESSION['cookieOtp'], $value='deleted', $expire = time()-999999, "/", $domain='', $secure=false, $httponly=false);
	removeCookieOtp();
  include "inc/form_autenticacao.php";
}
?>
