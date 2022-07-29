<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=user;', 'root', 'root');
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membres</title>
 </head>
 <body>
    <!-- Afficher tous les membres -->
    <?php 
        $recupUsers = $bdd->query('SELECT * FROM utilisateurs');
        while($user = $recupUsers->fetch()){
            ?>
            <p><?= $user['pseudo']; ?> <a style="color:red;font-weight:bold;text-decoration:none;" href="bannir.php?id=<?= $user['id']; ?>">Bannir le membre</a></p>
            <?php 
        }    
       
       ?>
        <!-- Fin d'Afficher tous les membres -->
 </body>
 </html>