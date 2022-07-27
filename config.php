<?php 

    // start la session PHP
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    // déclaration des identifiants BDD
    $db_host = "APPCODE HOST HERE";
    $db_user = "AppCode";
    $db_name = "AppCode";
    $db_password = "PASSWORD";

    // connexion à la BDD
    try {
        $db = new PDO("mysql:host=" . $db_host . ";dbname=" . $db_name, $db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        // en cas d'erreur
        echo $e;
    }

?>