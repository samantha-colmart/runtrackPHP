<?php
session_start();

if (!isset($_SESSION['prenoms'])) {
    $_SESSION['prenoms'] = [];
}

if (isset($_POST['ajouter']) && !empty($_POST['prenom'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    $_SESSION['prenoms'][] = $prenom;
}

if (isset($_POST['reset'])) {
    $_SESSION['prenoms'] = [];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste de prénoms</title>
</head>
<body>

<h1>Liste de prénoms</h1>

 <!-- formulaire -->
<form method="post">
    <input type="text" name="prenom" placeholder="Entrez un prénom">
    <button type="submit" name="ajouter">Ajouter</button>
    <button type="submit" name="reset">Reset</button>
</form>


<!-- Affichage -->
<?php if (!empty($_SESSION['prenoms'])): ?>
    <h2>Prénoms enregistrés :</h2>
    <ul>
        <?php foreach ($_SESSION['prenoms'] as $p): ?>
            <li><?php echo $p; ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun prénom enregistré.</p>
<?php endif; ?>

</body>
</html>
