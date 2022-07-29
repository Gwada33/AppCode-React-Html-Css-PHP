<?php 
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', 'root');
if(isset($_GET['id']) AND !empty($_GET['id'])){
  $getid = $_GET['id'];

  $recupArticle = $bdd->prepare('SELECT * FROM articles WHERE id = ? ');
  $recupArticle->execute(array($getid));
  if($recupArticle->rowCount() > 0){
    $articleInfos = $recupArticle->fetch();
    $titre = $articleInfos['titre'];
    $description =     str_replace ('<br />', '', $articleInfos['description']);
    $content = $articleInfos['content'];

    if(isset($_POST['valider'])){
    $titre_saisi = htmlspecialchars($_POST['titre']);
    $description_saisi = nl2br(htmlspecialchars($_POST['description']));
    $content_saisi = htmlspecialchars($_POST['content']);

    $updateArticle = $bdd->prepare('UPDATE articles SET titre = ?, description = ?, content = ? WHERE id = ?');
    $updateArticle->execute(array($titre_saisi, $description_saisi, $content_saisi, $getid));

    header('Location: articles.php');
    }



  } else {
    echo "No articles found";
  }


} else {
    echo "Aucun identifiant trouvé";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
</head>
<body>
    <form method="POST" action="">
    <input type="text" name="titre" <?= $titre; ?>>
        <br>
        <input type="text" name="description" value="<?= $titre; ?>">
        <br>
        <textarea name="content">
        <?= $content; ?>
    </textarea>
        <br>
        <input type="submit" name="valider">
    </form>
</body>
</html>