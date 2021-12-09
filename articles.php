<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

if (isset($_GET['idc'])) {
    $id_categorie = $_GET['idc'];
} else {
    $id_categorie = 0;
}


if ($id_categorie == 0) {
    $articlesbypages = 5;
    $allarticles = $bdd->query('SELECT id FROM articles');
    $allarticlescount = $allarticles->rowCount();

    $allpages = ceil($allarticlescount / $articlesbypages);

    if (isset($_GET['start']) && !empty($_GET['start']) && $_GET['start'] > 0 && $_GET['start'] < $allpages) {
        $_GET['start'] = intval($_GET['start']);
        $thisisthepage = $_GET['start'];
    } else {
        $thisisthepage = 1;
    }

    $start = ($thisisthepage - 1) * $articlesbypages;

    $recupart = $bdd->query('SELECT * FROM articles ORDER BY date DESC LIMIT ' . $start . ',' . $articlesbypages);
    $artinfos = $recupart->fetchall();
    $title = 'Tous Les Articles';
} else {
    $recupart = $bdd->prepare('SELECT * FROM articles WHERE id_categorie = ? ORDER BY date DESC');
    $recupart->execute(array($id_categorie));
    $artinfos = $recupart->fetchall();

    $getocato = $bdd->prepare('SELECT * FROM categories WHERE id = ? ');
    $getocato->execute(array($id_categorie));
    $getocatoinfoso = $getocato->fetch();

    $title = 'Articles | ' . $getocatoinfoso['nom'];
}

if (isset($_POST['btn-add'])) {
    header("Location: ./creer-article.php");
}

?>
<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/articles.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <title><?php echo $title ?></title>
</head>

<body>
    <?php include('./header.php'); ?>
    <main>
        <?php foreach ($artinfos as $recupartinfos) { ?>
            <div class="card">
                <a href="./article.php?id=<?php echo $recupartinfos['id'] ?>" class="card-a">
                    <div class="content-img">
                        <img src="./img/imgcard/<?php echo $recupartinfos['imgcard'] ?>" alt="">
                    </div>

                    <div class="content-text">
                        <h6 class="text-article"><?php echo $recupartinfos['title'] ?></h6>
                        <img src="./img/play.png" alt="">
                    </div>
                </a>
            </div>

        <?php } ?>

        <?php if ($id_categorie == 0) { ?>
            <div class="container-list-pages">
                <?php for ($i = 1; $i < $allpages; $i++) { ?>
                    <?php if ($i == $thisisthepage) { ?>
                        <div class="bloc-page selected">
                            <p><?php echo $i; ?></p>
                        </div>
                    <?php } else { ?>
                        <div class="bloc-page">
                            <a href="./articles.php?idc=<?php echo $id_categorie; ?>&start=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if (isset($_SESSION['id'])) {
            if ($usersinfo['id_droits'] == 42 || $usersinfo['id_droits'] == 1337) { ?>
                <div class="container-add">
                    <form action="" method="post">
                        <button type="submit" class="btn-add" name="btn-add" title="Ajouter un article"><img src="./img/plus.png" alt=""></button>
                    </form>
                </div>
        <?php }
        } ?>
    </main>
    <?php include('./footer.php'); ?>
</body>

</html>