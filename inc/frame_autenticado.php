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

?>
<html>
<head>
<title>..:: Poc OTP ::..</title>
<script src="js/f5.js" language="javascript"></script>
<script>

function setCookie(value) {
    //document.cookie = "cookie-otp=" + value + "; path=/";
		document.cookie = "<?=$_SESSION['cookieOtp']?>=" + value + "; path=/";
    return true;
}

var w;

function startWorker(){
	if(typeof(Worker)!=="undefined"){
		if(typeof(w)=="undefined")    {    
			w=new Worker("js/otp.php?t=<?=$_SESSION['token_script']?>");
		  }
			w.onmessage = function (event) {
			  otp = event.data; 
			  setCookie(otp)
			};
	}else{      
		    window.onload = function(){ 
						var ifr = document.createElement('iframe')
											ifr.src = 'swf/?t=<?=$_SESSION['token_script']?>'
											document.body.appendChild(ifr)
				};
	}
}

function stopWorker()
{
w.terminate();
}
startWorker();
</script>
</head>
<!--
<div id="divSwf"></div>
<frameset rows="*" cols="100%" framespacing="0" frameborder="NO" border="0"> 
  <frame src="principal.php" name=menu scrolling=auto>
<noframes> 
<body bgcolor="#CCCCCC" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
-->
<body style="margin:0px;padding:0px;overflow:hidden">
    <iframe src="principal.php" frameborder="0" style="overflow:hidden;height:100%;width:100%" height="100%" width="100%"></iframe>
</body>
</noframes> 
</html>



