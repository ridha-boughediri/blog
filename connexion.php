<?php

include('./fileconfig/config.php');
include('./fileconfig/configuser.php');

if (isset($_POST['button-co'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = sha1($_POST['password']);

    if (!empty($_POST['login']) and !empty($_POST['password'])) {
        $sql = $bdd->prepare("SELECT * FROM utilisateurs where login = ? and password = ? ");
        $sql->execute(array($login, $password));
        $sqlcount = $sql->rowCount();
        if ($sqlcount == 1) {
            $sqlinfos = $sql->fetch();
            $_SESSION['id'] = $sqlinfos['id'];
            header('Location: index.php');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/inscri-co.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <title>Page de connexion</title>
</head>

<body>
    <?php include('./header.php'); ?>
    <main>
        <div class="contener-flex">
            <form action="" method="POST">
                <div class="login-container">
                    <label for="">Login</label>
                    <input type="text" name="login">
                </div>
                <div class="login-container">
                    <label for="">Password</label>
                    <input type="password" name="password" id="input-pass">
                    <div class="logo-pass-view" onclick="mydots()">
                        <svg alt="" aria-hidden="true" aria-label="" role="img" transform="" version="1.1" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="logo-view">
                            <path d="M1.393 4.222l1.415-1.414 18.384 18.384-1.414 1.415-3.496-3.497c-1.33.547-2.773.89-4.282.89-6.627 0-12-6.625-12-8 0-.752 1.607-3.074 4.147-5.024L1.393 4.222zM12 4c6.627 0 12 6.625 12 8 0 .752-1.607 3.074-4.147 5.024l-3.198-3.196a5 5 0 0 0-6.483-6.483L7.718 4.89C9.048 4.343 10.49 4 12 4zm-4.656 6.173a5 5 0 0 0 6.483 6.483l-1.661-1.66L12 15a3 3 0 0 1-3-3l.005-.166-1.66-1.66zM12 9a3 3 0 0 1 3 3l-.005.166-3.162-3.161L12 9z" class="pass-view"></path>
                        </svg>
                    </div>
                </div>
                <div class="login-container">
                    <input class="btn-submit" type="submit" name="button-co" value="Connexion">
                </div>
            </form>
        </div>
    </main>
    <?php include('./footer.php'); ?>
</body>

<script>
    function gotoindex() {
        window.location = './index.php';
    }

    function mydots() {
        var x = document.getElementById("input-pass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</html>