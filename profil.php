<?php
include('./fileconfig/config.php');



if (isset($_SESSION['id'])) {

    include('./fileconfig/configuser.php');

    if (isset($_POST['update'])) {


        $login = htmlspecialchars($_POST["login"]);
        $passe = sha1($_POST["password"]);

        if (!empty($_POST["login"])) {
            $updatelogin = $bdd->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
            $updatelogin->execute(array($login, $_SESSION['id']));
            header("Refresh:0");
        }

        if (!empty($_POST["password"])) {
            $updatepasse = $bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
            $updatepasse->execute(array($passe, $_SESSION['id']));
            header("Refresh:0");
        }
    }
}

if (isset($_POST['btn-admin'])) {
    header("Location: ./admin.php");
}

?>



<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/profil.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <title>PROFIL</title>
</head>

<body>

    <?php include("./header.php"); ?>

    <main>
        <?php if (isset($_SESSION['id'])) {
            if ($usersinfo['id_droits'] == 1337) { ?>
                <div class="container-add">
                    <form action="" method="post" class="form-profile">
                        <button type="submit" class="btn-add" name="btn-admin" title="Espace Admin"><img src="./img/couronne.png" alt=""></button>
                    </form>
                </div>
        <?php }
        } ?>

        <form action="" method="post" class="form-profile">

            <h2>Quelques informations sur vous : </h2>

            <input type="text" name="login" class="input-login" placeholder="<?php echo $usersinfo['login'] ?>">

            <input type="password" name="password" class="input-login" placeholder="<?php echo $usersinfo['password'] ?>">

            <input type="submit" name="update" class="submit-login" value="MODIFIER">

            <?php if (isset($recupinfos['login']) and $recupinfos['login'] == 'admin') { ?>
                <a href="admin.php">espace admin</a>

            <?php } ?>


        </form>
    </main>

    <?php include('./footer.php'); ?>

</body>

</html>