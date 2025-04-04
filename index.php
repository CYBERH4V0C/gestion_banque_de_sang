<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: connexion.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Banque de Sang - Accueil</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Gestion de la Banque de Sang</h1>
    <nav>
        <ul>
            <li><a href="ajout_poche.php">Ajouter une poche de sang</a></li>
            <li><a href="liste_poches.php">Liste des poches de sang</a></li>
            <li><a href="ajout_utilisateur.php">Ajouter un utilisateur</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        </ul>
    </nav>
</body>
</html>