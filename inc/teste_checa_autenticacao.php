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
