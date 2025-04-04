<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = mysqli_real_escape_string($db, $_POST['login']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT * FROM utilisateur WHERE login = '$login' AND password = '$password'";
    $result = mysqli_query($db, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header('Location: index.php');
        exit();
    } else {
        $error = "Login ou mot de passe incorrect";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Connexion</h1>
    <?php if (isset($error)) echo "<p style='color: red'>$error</p>"; ?>
    <form method="POST">
        <div>
            <label>Login:</label>
            <input type="text" name="login" required>
        </div>
        <div>
            <label>Mot de passe:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>