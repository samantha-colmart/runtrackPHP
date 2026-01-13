<?php
$expiration = time() + (10 * 365 * 24 * 60 * 60); //dure 10 ans

// Déconnexion
if (isset($_POST['deco'])) {
    setcookie("prenom", "", time() - 3600);
    unset($_COOKIE['prenom']);
}

// Connexion
if (isset($_POST['connexion']) && !empty($_POST['prenom'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    setcookie("prenom", $prenom, $expiration);
    $_COOKIE['prenom'] = $prenom;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de connexion</title>
</head>
<body>

<?php if (isset($_COOKIE['prenom'])): ?>
    <h1>Bonjour <?php echo $_COOKIE['prenom']; ?> !</h1>

    <!-- Formulaire -->
    <form method="post">
        <button type="submit" name="deco">Déconnexion</button>
    </form>

<?php else: ?>
    <h1>Connexion</h1>

    <form method="post">
        <input type="text" name="prenom" placeholder="Entrez votre prénom" required>
        <button type="submit" name="connexion">Connexion</button>
    </form>
<?php endif; ?>

</body>
</html>
