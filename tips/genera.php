<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

//ini_set("auto_detect_line_endings", true);
$gn = fopen("Tips.txt","r");
if($gn){
	
	/*
   while (($bufer = fgets($gn, 4096)) !== false) {
        echo $bufer;
    }
    if (!feof($gn)) {
        echo "Error: fallo inesperado de fgets()\n";
    }
   fclose($gn);
   */ 

   
      while(!feof($gn)) {
         $line = fgets($gn);
         $cLine = htmlentities($line);
         echo ("$cLine" . "<br>");
      }
      fclose($gn);
   

   /*
   $pos = 0; 
   $cLinea = "";
   for($i=0; $i<1000; $i++){
    	fseek($gn,$pos);
    	
      $car = fgets($gn, 2);
    	
      if( ord($car) == 13 ){
         echo $cLinea . "<br>";
         $cLinea = "";
      }else{
         $cLinea .= $car;
      }
      echo $i . ") " . $car . ":" . ord($car) . "<br>";
      $pos += 1;
   }
   */
}

?>