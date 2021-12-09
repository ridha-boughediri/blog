<?php
if (isset($_SESSION['id'])) {
    $getid = $_SESSION['id'];
    $getusers = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ? ');
    // $getusers->execute(array($getid));
    $getusers->execute(["$getid"]);
    $usersinfo = $getusers->fetch();
}
