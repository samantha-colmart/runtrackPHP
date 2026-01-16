<?php
include 'config.php';
include 'includes/header.php';

if (!empty($_POST)) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':username' => $username]);

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        setcookie('username', $user['username'], time() + 7*24*60*60, "/");
        
        header("Location: profile.php");
        exit;
    } else {
        echo "Identifiants incorrects";
    }
}
?>

<h2>Connexion</h2>
<form method="post" style="display: flex; gap: 10px; align-items: center;">
    <input type="text" name="username" placeholder="Nom" 
           value="<?= htmlspecialchars($_POST['username'] ?? $_COOKIE['username'] ?? '') ?>">
    <input type="password" name="password" placeholder="Mot de passe">
    <button name="login">Connexion</button>
</form>


<a href="register.php">Créer un compte</a>

<?php include 'includes/footer.php'; ?>