<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: connexion.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($db, $_GET['id']);
    
    $sql = "DELETE FROM blood WHERE id = '$id'";
    
    if (mysqli_query($db, $sql)) {
        header('Location: liste_poches.php');
        exit();
    } else {
        echo "Erreur lors de la suppression: " . mysqli_error($db);
    }
}
?>