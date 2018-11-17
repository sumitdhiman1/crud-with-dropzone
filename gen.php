<?php 
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    $c = implode($pass); 
	echo $c;
}





  ?>
  
<html>

<button></button>

<form>

<input type ="submit" name = "submit" value "generate" onsubmit =  " return randomPassword()">



</form>

</html>