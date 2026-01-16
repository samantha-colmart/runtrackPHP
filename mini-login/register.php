<?php
include 'config.php';
include 'includes/header.php';

if (!empty($_POST)) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Champs obligatoires";
    } elseif (strlen($username) < 3) {
        echo "Nom trop court";
    } elseif (strlen($password) < 6 || !preg_match('/[0-9]/', $password)) {
        echo "Mot de passe invalide";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([
                ':username' => $username,
                ':password' => $hash
            ]);
            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            echo "Nom déjà utilisé";
        }
    }
}
?>

<h2>Inscription</h2>
<form method="post">
    <input type="text" name="username" placeholder="Nom"><br>
    <input type="password" name="password" placeholder="Mot de passe"><br>
    <button>Inscription</button>
</form>

<?php include 'includes/footer.php'; ?>