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
