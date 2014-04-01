<?
session_start();
//print_r($_SESSION);
print_r($_COOKIE);
echo "<br>";
       $arrCookieOtp = $_COOKIE;  
       for($i=0;$i<count($arrCookieOtp);$i++){
 				  echo $arrCookieOtp{$i}."<br>";
			 }
foreach(array_keys($arrCookieOtp) as $key){
    echo $key."\n";
}

?>

<script language="javascript" type="text/javascript">

    document.onkeydown = checkKeycode
    function checkKeycode(e) {
        var keycode;
        if (window.event)
            keycode = window.event.keyCode;
        else if (e)
            keycode = e.which;


				 if (navigator.userAgent.indexOf('Firefox') != -1 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Firefox') + 8)) >= 3.6){//Firefox
								    if (keycode == 116 ||(e.ctrlKey && keycode == 82)) {
								        if (e.preventDefault)
								        {
								            e.preventDefault();
								            e.stopPropagation();
								        }
								    }
				 }else if (navigator.userAgent.indexOf('Chrome') != -1 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Chrome') + 7).split(' ')[0]) >= 15){//Chrome
								    if (keycode == 116 ||(e.ctrlKey && keycode == 82)) {
								        if (e.preventDefault)
								        {
								            e.preventDefault();
								            e.stopPropagation();
								        }
								    }
				 }else if(navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Version') != -1 && parseFloat(navigator.userAgent.substring(navigator.userAgent.indexOf('Version') + 8).split(' ')[0]) >= 5){//Safari
								    if (keycode == 116 ||(e.ctrlKey && keycode == 82)) {
								        if (e.preventDefault)
								        {
								            e.preventDefault();
								            e.stopPropagation();
								        }
								    }
				 }else{
								    if (keycode == 116 || (window.event.ctrlKey && keycode == 82)) {
								        window.event.returnValue = false;
								        window.event.keyCode = 0;
								        window.status = "Refresh is disabled";
								    }
				 }

    }
</script>
