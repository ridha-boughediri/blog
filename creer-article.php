<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

setlocale(LC_TIME, 'fr_FR');
date_default_timezone_set('Europe/Paris');

if (isset($_SESSION['id']) && $usersinfo['id_droits'] == 42 || isset($_SESSION['id']) && $usersinfo['id_droits'] == 1337) {

    $getcate = $bdd->query('SELECT * FROM categories');
    if (isset($_POST['btn-art'])) {
        if (!empty($_POST['article']) and !empty($_POST['id_categorie'])) {

            $article = htmlspecialchars($_POST['article']);
            $id_categorie = htmlspecialchars($_POST['id_categorie']);


            $insertart = $bdd->prepare('INSERT INTO articles (article,id_utilisateur,id_categorie) VALUES (?,?,?)');
            $insertart->execute(array($article, $_SESSION['id'], $id_categorie));
            $message = 'Votre article a bien été posté';
        } else {
            $message = 'Veuillez remplir tous les champs';
        }
    } else {
        $message = 'Créer un article';
    }


?>
    <!DOCTYPE html>
    <html lang="fr-FR">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
        <link rel="stylesheet" href="./css/creer-article.css">
        <link rel="stylesheet" href="./css/header.css">
        <link rel="stylesheet" href="./css/footer.css">
        <title>CRÉER UN ARTICLE</title>
    </head>

    <body>

        <?php include('./header.php'); ?>

        <main>
            <div class="contener-flex">
                <h1>Ecrire un article</h1>
                <form action="" method="POST">
                    <div class="login-container">
                        <select type="text" name="id_categorie">

                            <option name="" value="">--Choisir une catégorie--</option>
                            <?php while ($getcateinfos = $getcate->fetch()) { ?>
                                <option value="<?php echo $getcateinfos['id']; ?>"><?php echo $getcateinfos['nom']; ?></option>
                            <?php } ?>
                            <textarea name="article" placeholder="Contenu de l'article"></textarea>

                        </select>
                    </div>
                    <div class="login-container-zwei">
                        <button class="btn-submit" type="submit" name="btn-art">Envoyer l'article</button>
                    </div>
                </form>

                <?php if (isset($message)) {
                    echo $message;
                } ?>

            </div>
        </main>
        <?php include('./footer.php'); ?>
    </body>

    </html>
<?php } else {
    header("Location:./index.php");
} ?>