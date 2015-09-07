<?php
 	require_once "./user/controller.php";
 	$starttime = microtime(); 

 	handler();
    
 	 $difftime = $starttime-microtime();
   	 echo $difftime;   



?>
