<?php 
session_start();
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
    <title>Document</title>
</head>
<body>
    <a href="membres.php">Afficher tous les membres</a>
    <a href="publier-article.php">Publier Article</a>
    <a href="articles.php">Afficher tous les article</a>
</body>
</html>

