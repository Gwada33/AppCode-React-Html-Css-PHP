<?php 
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', 'root');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupArticle = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $recupArticle->execute(array($getid));
    if($recupArticle->rowCount() > 0){

        $suppraticle = $bdd->prepare('DELETE FROM articles WHERE id = ?');
        $suppraticle->execute(array($getid));
        header('Location: articles.php');
    } else {
        echo "No articles found";
    }
} else {
    echo "Aucun identifiant trouvé";
}

?>