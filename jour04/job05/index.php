<?php
$message = "";

if (!empty($_POST)) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "John" && $password === "Rambo") {
        $message = "C’est pas ma guerre !";
    } else {
        $message = "Votre pire cauchemar.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de connexion</title>
</head>
<body>

<h2>Connexion</h2>

<form method="POST" action="">
    <label>
        Username :
        <input type="text" name="username" placeholder="Nom d'utilisateur">
    </label><br><br>

    <label>
        Password :
        <input type="password" name="password" placeholder="Mot de passe">
    </label><br><br>

    <input type="submit" value="Se connecter">
</form>

<?php
if (!empty($message)) {
    echo "<p>$message</p>";
}
?>

</body>
</html>
