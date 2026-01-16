<?php
include 'config.php';
include 'includes/header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

if (!empty($_POST)) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Champs obligatoires";
    } elseif (strlen($username) < 3) {
        echo "Nom trop court";
    } elseif (strlen($password) < 6 || !preg_match('/\d/', $password)) {
        echo "Mot de passe invalide";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET username = :username, password = :password WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => $hash,
            ':id' => $_SESSION['user_id']
        ]);

        $_SESSION['username'] = $username;
        header("Location: profile.php");
        exit;
    }
}
?>

<h2>Modifier le profil</h2>
<form method="post">
    <input type="text" name="username" value="<?= htmlspecialchars($_SESSION['username']) ?>"><br>
    <input type="password" name="password" placeholder="Nouveau mot de passe"><br>
    <button>Modifier</button>
</form>