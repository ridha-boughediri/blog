<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
