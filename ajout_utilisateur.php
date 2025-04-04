<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: connexion.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = mysqli_real_escape_string($db, $_POST['login']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $role = mysqli_real_escape_string($db, $_POST['role']);

    $cheklogin = mysqli_query($db, "SELECT * FROM utilisateur WHERE login='$login'");
    if (mysqli_num_rows($cheklogin) > 0) {
        $error = "Le login existe déjà";
    }else {
        $sql = "INSERT INTO utilisateur (login, password, role) VALUES ('$login', '$password', '$role')";
        if (mysqli_query($db, $sql)) {
        $success = "Utilisateur ajouté avec succès";
    }   else {
        $error = "Erreur lors de l'ajout: " . mysqli_error($db);
    }
}
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un utilisateur</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Ajouter un utilisateur</h1>
    <a href="index.php">Retour à l'accueil</a>

    <?php 
    if (isset($success)) echo "<p style='color: green'>$success</p>";
    if (isset($error)) echo "<p style='color: red'>$error</p>";
    ?>

    <form method="POST">
        <div>
            <label>Login:</label>
            <input type="text" name="login" required>
        </div>
        <div>
            <label>Mot de passe:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label>Rôle:</label>
            <select name="role" required>
                <option value="administrateur">Administrateur</option>
                <option value="gestionnaire">Gestionnaire</option>
            </select>
        </div>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>