<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', 'root');
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
    <title>Afficher tous les articles</title>
</head>
<body>
    <?php 
        $recupArticles = $bdd->query('SELECT * FROM articles');
        while($article = $recupArticles->fetch()){
            
            ?>
            <div class="article" style="border: 4px solid #ccc;">
                <h1><?= $article['titre']; ?></h1>
                <p><?= $article['description']; ?></p>
                <a href="supprimer-article.php?id=<?= $article['id']; ?>">
                <button style="background-color: black; color: #fff; font-size: 30px; margin-bottom: 10px;" >Supprimer l'article
            </button>
            </a>
            <a href="modifier-article.php?id=<?= $article['id']; ?>">
                <button style="background-color: yellow; color: #fff; font-size: 30px; margin-bottom: 10px;" >Modifier l'article
            </button>
            </a>
            </div>
            <br>
            <?php
        }
    
    ?>
</body>
</html>