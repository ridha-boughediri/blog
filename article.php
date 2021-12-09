<?php
include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

setlocale(LC_TIME, 'fr_FR');
date_default_timezone_set('Europe/Paris');

$getart = $_GET['id'];

$recupart = $bdd->prepare('SELECT * FROM articles WHERE id = ? ORDER BY date DESC');
$recupart->execute(array($getart));
$artinfos = $recupart->fetch();

$recupcom = $bdd->prepare('SELECT * FROM commentaires WHERE id_article = ? ORDER BY date DESC');
$recupcom->execute(array($getart));
$cominfos = $recupcom->fetchall();
$comcount = $recupcom->rowCount();

if (isset($_POST['btn-com'])) {
    if (!empty($_POST['commentaire'])) {

        $commentaire = htmlspecialchars($_POST['commentaire']);


        $insertcom = $bdd->prepare('INSERT INTO commentaires (commentaire,id_article,id_utilisateur) VALUES (?,?,?)');
        $insertcom->execute(array($commentaire, $getart, $_SESSION['id']));
        $message = 'Votre commentaire a bien été posté';

        header("Refresh:3");
    } else {
        $commentaire = 'Veuillez remplir tous les champs';
    }
} else {
    $noisset = 'Créer un commentaire';
}


?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/article.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <title>Article | <?php echo $artinfos['title'] ?></title>
</head>

<body>
    <?php include('./header.php'); ?>
    <main>
        <section>
            <h2><?php echo $artinfos['title'] ?></h2>
            <p><?php echo $artinfos['article'] ?></p>
        </section>

        <article>
            <div class="contener-flex">
                <h1>Ecrire un commentaire</h1>
                <?php if (isset($_SESSION['id'])) { ?>
                    <form action="" method="POST">
                        <div class="login-container">
                            <textarea name="commentaire" placeholder="Contenu du commentaire"></textarea>
                        </div>
                        <div class="login-container">
                            <button class="btn-submit" type="submit" name="btn-com">Envoyer le commentaire</button>
                        </div>
                    </form>
                    <?php if (isset($message)) { ?>
                        <p style="color: green;"><?php echo $message; ?></p>
                    <?php } elseif (isset($commentaire)) { ?>
                        <p style="color: red;"><?php echo $commentaire; ?></p>
                    <?php } elseif (isset($noisset)) { ?>
                        <p style="color: rgb(203, 188, 178);"><?php echo $noisset; ?></p>
                    <?php } ?>
                <?php } else { ?>
                    <div class="nocolink">
                        <p>Connectez-Vous en cliquant <a href="./connexion.php">ici</a>... </p>
                    </div>
                <?php } ?>

            </div>
        </article>
        <article>
            <div class="contener-flex" id="contener-flex-id">
                <h1>Fil des commentaires</h1>
                <?php if ($comcount >= 1) { ?>
                    <div class="contain-com">
                        <?php for ($c = 0; $c < $comcount; $c++) {
                            $selectusercom = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ? ');
                            $selectusercom->execute(array($cominfos[$c]['id_utilisateur']));
                            $userscominfo = $selectusercom->fetch();
                        ?>
                            <div class="card-com">
                                <div class="card-head">
                                    <p><?php echo $cominfos[$c]['date'] ?></p>
                                    <p><?php echo $userscominfo['login'] ?></p>
                                </div>
                                <div class="card-body">
                                    <p><?php echo $cominfos[$c]['commentaire'] ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div class="contain-com">
                        <p>Aucun Commentaire</p>
                    </div>
                <?php } ?>
            </div>
        </article>
    </main>
    <?php include('./footer.php'); ?>
</body>

</html>