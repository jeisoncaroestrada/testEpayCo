<?php
    //require 'vendor/autoload.php';
    require_once('Routes.php');
    
     function __autoload($class_name){
        
        if(file_exists('./app/'.$class_name.'.php')){
            
            require_once './app/'.$class_name.'.php';
            
        } else if (file_exists('./controllers/'.$class_name.'.php')){
            
            require_once './controllers/'.$class_name.'.php';

        } else if (file_exists('./vendor/'.$class_name.'.php')){
            
            require_once './vendor/'.$class_name.'.php';
        }
    } 
?>