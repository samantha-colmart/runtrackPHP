<?php
include 'config.php';
include 'includes/header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<h1>Bienvenue <?= $_SESSION['username'] ?> !!</h1>

<a href="edit.php">Modifier le profil</a><br>
<a href="delete.php" onclick="return confirm('Confirmer la suppression ?')">Supprimer le profil</a><br>
<a href="logout.php">Déconnexion</a>