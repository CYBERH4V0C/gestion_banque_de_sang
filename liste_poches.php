<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: connexion.php');
    exit();
}

$sql = "SELECT * FROM blood ORDER BY date_collecte DESC";
$result = mysqli_query($db, $sql);

if (!$result) {
    die("Erreur de requête : " . mysqli_error($db));
}

$poches = mysqli_fetch_all($result, MYSQLI_ASSOC);

if ($poches === false) {
    die("Erreur lors de la récupération des données : " . mysqli_error($db));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des poches de sang</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Liste des poches de sang</h1>
    <a href="index.php">Retour à l'accueil</a>

    <?php if (empty($poches)): ?>
        <p>Aucune poche de sang n'est enregistrée.</p>
    <?php else: ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Groupe sanguin</th>
                    <th>Quantité (ml)</th>
                    <th>Date de collecte</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($poches as $poche): ?>
                <tr>
                    <td><?php echo $poche['id']; ?></td>
                    <td><?php echo $poche['groupe_sanguin']; ?></td>
                    <td><?php echo $poche['quantite']; ?></td>
                    <td><?php echo $poche['date_collecte']; ?></td>
                    <td>
                        <a href="supp_poche.php?id=<?php echo htmlspecialchars($poche['id']); ?>" 
                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette poche ?')">
                            Supprimer
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>