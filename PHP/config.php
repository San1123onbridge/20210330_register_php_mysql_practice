<?php
    try {
        $db = new PDO('mysql:host=localhost;
                       dbname=allmight_test',
                       'bloodjoker2',
                       'successful1');        
    } catch (PDOException $e){
        print "Couldnt connect mysql database." . $e->getMessage();
    }    
?>