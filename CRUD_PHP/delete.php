<?php

// Connexion à la base de données
try {
    $bdd = new PDO("mysql:host=localhost;dbname=espace_membre;charset=UTF8", "root", "");
}
catch (Exception $e) {
    die('Erreur :' . $e->getMessage());
}

// Récupération de l'id via l'URL
$id = $_GET['id'];
// Requête SQL de suppression

//$req = $bdd->prepare("DELETE id FROM formulaire WHERE id = $id");
$req = $bdd->prepare('DELETE FROM formulaire WHERE id=' . $id);
$req->execute(compact('id'));
// redirection vers la page home.php
header('location:home.php');
