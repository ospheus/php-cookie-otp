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
include "../inc/config.php";

if( empty($_SESSION['work']) ){
   $_SESSION['work'] = 1;
//{
?>

//--Sha1-----------------------------------------------------------------------------------------------------------------------------------//
importScripts('sha.js');
//-----------------------------------------------------------------------------------------------------------------------------------------//
//<![CDATA[ 
    function dec2hex(s) { return (s < 15.5 ? '0' : '') + Math.round(s).toString(16); }
    function hex2dec(s) { return parseInt(s, 16); }

    function base32tohex(base32) {
        var base32chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ234567";
        var bits = "";
        var hex = "";

        for (var i = 0; i < base32.length; i++) {
            var val = base32chars.indexOf(base32.charAt(i).toUpperCase());
            bits += leftpad(val.toString(2), 5, '0');
        }

        for (var i = 0; i+4 <= bits.length; i+=4) {
            var chunk = bits.substr(i, 4);
            hex = hex + parseInt(chunk, 2).toString(16) ;
        }
        return hex;

    }

    function leftpad(str, len, pad) {
        if (len + 1 >= str.length) {
            str = Array(len + 1 - str.length).join(pad) + str;
        }
        return str;
    }

<?
$tempo = floor(time() );
?>
        var time_server = <?=$tempo?>;
        var time_local = Math.round(new Date().getTime() / 1000.0);
        var time_comp = time_server - time_local;

        function getTime(){
              var epoch = Math.round(new Date().getTime() / 1000.0);
              return  epoch+time_comp;
        }  

    function updateOtp() {
				<? if($_SESSION['token_script']==$_GET['t']){ 
						$decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, OTP_SESSION_PWD, base64_decode($_SESSION['secret']), MCRYPT_MODE_CBC, OTP_SESSION_IV);
				?>
        var key = base32tohex("<?=$decrypted?>");
        <?}else{ 
            echo "Token inválido!";
          }   
				?>  
        var epoch = getTime();
        var time = leftpad(dec2hex(Math.floor(epoch / <?=TEMPO_OTP?>)), 16, '0');

        var hmacObj = new jsSHA(time, 'HEX');
        var hmac = hmacObj.getHMAC(key, 'HEX', 'SHA-1', "HEX");


       if (hmac == 'KEY MUST BE IN BYTE INCREMENTS') {
        } else {
            var offset = hex2dec(hmac.substring(hmac.length - 1));
            var part1 = hmac.substr(0, offset * 2);
            var part2 = hmac.substr(offset * 2, 8);
            var part3 = hmac.substr(offset * 2 + 8, hmac.length - offset);
        }

        var otp = (hex2dec(hmac.substr(offset * 2, 8)) & hex2dec('7fffffff')) + '';
        otp = (otp).substr(otp.length - 6, 6);
				
				postMessage(otp);
        
    }

function timer()
{
    var epoch = getTime();
    var countDown = <?=TEMPO_OTP?> - (epoch % <?=TEMPO_OTP?>);
    if (epoch % <?=TEMPO_OTP?> == 0) updateOtp();
    
}

 setInterval(timer, 1000);
 updateOtp();

//]]>  

<?
 }
?>

