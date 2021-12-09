<?php
$url = $_SERVER['PHP_SELF'];
$recupcate = $bdd->query('SELECT * FROM categories');

if (isset($_POST['gotoprofile'])) {
    header("Location:./profil.php");
}

if (isset($_POST['gotodeco'])) {
    session_destroy();
    if (isset($_GET['id'])) {
        $id_categorie = $_GET['id'];
        header("Location:" . $url . "?id=" . $id_categorie);
    } else if (isset($_GET['idc'])) {
        $id_categorie = $_GET['idc'];
        header("Location:" . $url . "?idc=" . $id_categorie);
    } else {
        header("Location:" . $url);
    }
}
?>

<header>
    <div class="block-logo" onclick="gotoindex()">
        <img src="./img/Natural-View-Logo.png" alt="">
    </div>
    <nav class="menu">
        <ol>
            <div class="dropdown">
                <button class="dropbtn">CATÉGORIES</button>
                <div class="dropdown-content">
                    <?php while ($recupcateinfos = $recupcate->fetch()) { ?>
                        <a class="btnlinko" href="./articles.php?idc=<?php echo $recupcateinfos['id'] ?>"><?php echo $recupcateinfos['nom'] ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="dropdown">
                <button onclick="gotoallarticles()" class="dropbtn">TOUS LES ARTICLES</button>
            </div>

            <?php if (!isset($_SESSION['id'])) { ?>
                <div class="dropdown">
                    <button onclick="gotoincription()" class="dropbtn">INSCRIPTION</button>
                </div>
                <div class="dropdown">
                    <button onclick="gotoconnexion()" class="dropbtn">CONNEXION</button>
                </div>
            <?php } else { ?>
                <div class="dropdown">
                    <button class="dropbtn"><?php echo $usersinfo['login'] ?></button>
                    <form action="" method="post" class="dropdown-content">
                        <button type="submit" class="btnlinko" name="gotoprofile">PROFIL</button>
                        <button type="submit" class="btnlinko" name="gotodeco">DÉCONNECTION</button>
                    </form>
                </div>
            <?php } ?>
        </ol>
    </nav>
</header>

<script>
    function gotoindex() {
        window.location = './index.php';
    }

    function gotoallarticles() {
        window.location = './articles.php?idc=0';
    }

    function gotoincription() {
        window.location = './inscription.php';
    }

    function gotoconnexion() {
        window.location = './connexion.php';
    }

</script>