<?php

$pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8", "root", "");

$sql = "DELETE FROM etudiants WHERE prenom = :prenom";

$query = $pdo -> prepare($sql);
$query -> execute([':prenom' => "Samantha"]);



?>