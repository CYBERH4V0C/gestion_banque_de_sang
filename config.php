<?php
$host = 'localhost';
$dbname = 'banque_de_sang';
$username = 'root';
$password = '';

$db = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    echo "Erreur de connexion : " . mysqli_connect_error();
    die();
}
?>