<?php 
session_start();
 if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo_par_défaut = "admin";
        $mdp_par_défaut = "admin1234";

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi = htmlspecialchars($_POST['mdp']);

        if($pseudo_saisi == $pseudo_par_défaut AND $mdp_saisi == $mdp_par_défaut){
            $_SESSION['mdp'] = $mdp_saisi;
            header('Location: index.php');
        } else {
            echo "Votre mot de passe est incorect";
        }

    } else {
        echo "Please enter a pseudo and mdp";
    }
 }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="" align="center">
        <input type="text" name="pseudo" autocomplete="off">
        <br />
        <input type="password" name="mdp">
        <br />
        <input type="submit" name="valider" />
    </form>
</body>
</html>