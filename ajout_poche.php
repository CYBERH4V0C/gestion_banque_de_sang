<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: connexion.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $groupe_sanguin = mysqli_real_escape_string($db, $_POST['groupe_sanguin']); 
    $quantite = mysqli_real_escape_string($db, $_POST['quantite']);
    $date_collecte = mysqli_real_escape_string($db, $_POST['date_collecte']);

    $sql = "INSERT INTO blood (groupe_sanguin, quantite, date_collecte) VALUES ('$groupe_sanguin', '$quantite', '$date_collecte')";
    
    if (mysqli_query($db, $sql)) {
        $success = "Poche de sang ajoutée avec succès";
    } else {
        $error = "Erreur lors de l'ajout: " . mysqli_error($db);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une poche de sang</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Ajouter une poche de sang</h1>
    <a href="index.php">Retour à l'accueil</a>
    
    <?php 
    if (isset($success)) echo "<p style='color: green'>$success</p>";
    if (isset($error)) echo "<p style='color: red'>$error</p>";
    ?>

    <form method="POST">
        <div>
            <label>Groupe sanguin:</label>
            <select name="groupe_sanguin" required>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
        </div>
        <div>
            <label>Quantité (ml):</label>
            <input type="number" name="quantite" required>
        </div>
        <div>
            <label>Date de collecte:</label>
            <input type="date" name="date_collecte" required>
        </div>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>