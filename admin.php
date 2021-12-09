<?php
include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

$recupUsers = $bdd->query('SELECT * FROM utilisateurs');
$recupCateg = $bdd->query('SELECT * FROM categories');
$recupArticle = $bdd->query('SELECT * FROM articles');


if (isset($_SESSION['id']) && $usersinfo['id_droits'] == 1337) {

    if (isset($_POST['supprimer'])) {
        $getidadmin = intval($_GET['idadmin']);
        $sql = $bdd->prepare('DELETE FROM utilisateurs WHERE id = ?');
        $sql->execute(array($getidadmin));
        header("Refresh:0");
    }

    if (isset($_POST['edit'])) {
        $getidadmin = $_GET['idadmin'];
        if (!empty($_POST['login'])) {
            $login = htmlspecialchars($_POST['login']);
            $recupLogin = $bdd->prepare('UPDATE utilisateurs SET login = ? WHERE id = ?');
            $recupLogin->execute(array($login, $getidadmin));
            header("Refresh:0");
        }
    }
    if (isset($_POST['edit'])) {
        $getidadmin = $_GET['idadmin'];
        if (!empty($_POST['password'])) {
            $password = sha1($_POST['password']);
            $recupPassword = $bdd->prepare('UPDATE utilisateurs SET password = ? WHERE id = ?');
            $recupPassword->execute(array($password, $getidadmin));
            header("Refresh:0");
        }
    }
    if (isset($_POST['edit'])) {
        $getidadmin = $_GET['idadmin'];
        if (!empty($_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);
            $recupEmail = $bdd->prepare('UPDATE utilisateurs SET email = ? WHERE id = ?');
            $recupEmail->execute(array($email, $getidadmin));
            header("Refresh:0");
        }
    }
    if (isset($_POST['droits'])) {
        $getidadmin = $_GET['idadmin'];
        if (!empty($_POST['droits'])) {
            $droits = htmlspecialchars($_POST['droits']);
            $recupdroits = $bdd->prepare('UPDATE utilisateurs SET id_droits = ? WHERE id = ?');
            $recupdroits->execute(array($droits, $getidadmin));
            header("Refresh:0");
        }
    }
    // categorie
    if (isset($_POST['supprimer-cate'])) {
        $getidadmin = intval($_GET['idadmin']);
        $sql = $bdd->prepare('DELETE FROM categories WHERE id = ?');
        $sql->execute(array($getidadmin));
        header("Refresh:0");
    }

    if (isset($_POST['edit-cate'])) {
        $getidadmin = $_GET['idadmin'];
        if (!empty($_POST['nom'])) {
            $nom = htmlspecialchars($_POST['nom']);
            $recupNom = $bdd->prepare('UPDATE categories SET nom = ? WHERE id = ?');
            $recupNom->execute(array($nom, $getidadmin));
            header("Refresh:0");
        }
    }
    // article
    if (isset($_POST['supprimer-article'])) {
        $getidadmin = intval($_GET['idadmin']);
        $sql = $bdd->prepare('DELETE FROM articles WHERE id = ?');
        $sql->execute(array($getidadmin));
        header("Refresh:0");
    }
    if (isset($_POST['edit-article'])) {
        $getidadmin = $_GET['idadmin'];
        if (!empty($_POST['articles'])) {
            $nom = htmlspecialchars($_POST['articles']);
            $recupNom = $bdd->prepare('UPDATE articles SET nom = ? WHERE id = ?');
            $recupNom->execute(array($nom, $getidadmin));
            header("Refresh:0");
        }
    }

?>
    <!DOCTYPE html>
    <html lang="fr-FR">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
        <link rel="stylesheet" href="./css/admin.css">
        <link rel="stylesheet" href="./css/header.css">
        <link rel="stylesheet" href="./css/footer.css">
        <title>Page Admin</title>
    </head>

    <body>
        <?php include('./header.php'); ?>

        <main>

            <div class="contener-dash">
                <h1>Dashboard</h1>
                <form action="" method="post" class="list-btn-dash">
                    <button type="submit" name="usersget">Utilisateurs</button>
                    <button type="submit" name="categet">Catégories</button>
                    <button type="submit" name="artget">Articles</button>
                </form>
            </div>
            <div class="container-view">
                <?php if (isset($_POST['usersget'])) { ?>
                    <?php while ($utilisateurs = $recupUsers->fetch()) { ?>

                        <div class="contener-admin">
                            <form action="?idadmin=<?php echo $utilisateurs['id'] ?>" method="POST">
                                <div class="login-contener">
                                    <p><?php echo $utilisateurs['id']; ?></p>
                                </div>
                                <div class="login-contener">
                                    <input type="text" name="login" placeholder="<?php echo $utilisateurs['login']; ?>">
                                </div>
                                <div class="login-contener">
                                    <input type="text" name="password" placeholder="<?php echo $utilisateurs['password'] ?>">
                                </div>
                                <div class="login-contener">
                                    <input type="text" name="email" placeholder="<?php echo $utilisateurs['email'] ?>">
                                </div>
                                <div class="login-contener">
                                    <select name="droits">
                                        <option value="">--Please choose an option--</option>

                                        <?php

                                        $recupdroits = $bdd->query('SELECT * FROM droits');
                                        while ($recupdroitsinfos = $recupdroits->fetch()) {
                                        ?>
                                            <option value="<?php echo $recupdroitsinfos['id'] ?>"><?php echo $recupdroitsinfos['nom'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="login-contener">
                                    <input style="color: green; cursor:pointer;" type="submit" name="edit" value="Modifier">
                                </div>
                                <div class="login-contener">
                                    <input style="color: red; cursor:pointer;" type="submit" name="supprimer" value="Supprimer">
                                </div>
                            </form>
                            <br>
                        </div>
                    <?php } ?>
                <?php } elseif (isset($_POST['categet'])) { ?>
                    <!-- Categories -->
                    <?php while ($categories = $recupCateg->fetch()) { ?>
                        <div class="contener-admin">
                            <form action="?idadmin=<?php echo $categories['id'] ?>" method="POST">
                                <div class="login-contener">
                                    <p><?php echo $categories['id']; ?></p>
                                </div>
                                <div class="login-contener">
                                    <input type="text" name="nom" placeholder="<?php echo $categories['nom']; ?>">
                                </div>
                                <div class="login-contener">
                                    <input style="color: green; cursor:pointer;" type="submit" name="edit-cate" value="Modifier">
                                </div>
                                <div class="login-contener">
                                    <input style="color: red; cursor:pointer;" type="submit" name="supprimer-cate" value="Supprimer">
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                    <!-- Fin Categories -->
                <?php } elseif (isset($_POST['artget'])) { ?>
                    <!-- Articles -->
                    <?php while ($articles = $recupArticle->fetch()) { ?>
                        <div class="contener-art">
                            <form action="?idadmin=<?php echo $articles['id'] ?>" method="POST">
                                <div class="bloc-arto">
                                    <p><?php echo $articles['title']; ?></p>
                                    <input type="text" name="article" class="articles-bloc" placeholder="<?php echo $articles['article']; ?>">
                                    <input style="color: green; cursor:pointer;" type="submit" name="edit-article" value="Modifier">
                                    <input style="color: red; cursor:pointer;" type="submit" name="supprimer-article" value="Supprimer">
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                    <!-- Fin Articles -->
                <?php } ?>
            </div>

        </main>

        <?php include('./footer.php'); ?>

    </body>

    </html>

<?php } else {
    header('Location: ./index.php');
} ?>