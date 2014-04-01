<?
//$pathApp = "/html5/otp/";
//session_set_cookie_params(0,$pathApp,"",false,true);
session_start();
if( empty($_SESSION['cookieOtp']) ){
	$_SESSION['cookieOtp'] = md5(time());
}
?>
