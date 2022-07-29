<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=user;', 'root', 'root');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupUsers = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $recupUsers->execute(array($getid));
    if($recupUsers->rowCount() > 0){

        $banniruser = $bdd->prepare('DELETE FROM utilisateurs WHERE id = ?');
        $banniruser->execute(array($getid));

        header('Location: membres.php');

    } else {
        echo "Aucun membre n'a été trouvé";
    }
} else {
    echo "l'identifiant n'a pas été récupéré";
}


?>