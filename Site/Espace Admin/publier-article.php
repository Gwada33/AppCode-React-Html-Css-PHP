<?php session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', 'root');
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
}

if(isset($_POST['envoie'])){
    if(!empty($_POST['titre']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
        $titre = htmlspecialchars($_POST['titre']);
        $description = nl2br(htmlspecialchars($_POST['description']));
        $content = htmlspecialchars($_POST['content']);

        $insererArticle = $bdd->prepare('INSERT INTO articles(titre, description, content) VALUES(?, ?, ?)');
        $insererArticle->execute(array($titre, $description, $content));

        echo "L'article a bien été envoie";
    } else {
        echo 'Remplis tous les champs';
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
    <form method="POST" action="">
        <input type="text" name="titre">
        <br>
        <input type="text" name="description">
        <br>
        <textarea name="content"></textarea>
        <br>
        <input type="submit" name="envoie">
    </form>
</body>
</html>