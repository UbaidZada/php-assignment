<?php


 try{
    
$connection = new PDO('mysql:host=localhost;dbname=2209g2','root','');
    
    
 }catch(PDOException $er){


 echo $er->getmessage();   
 echo "database is not conneted";


 }









?>