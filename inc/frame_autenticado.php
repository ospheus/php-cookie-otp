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



