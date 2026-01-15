<?php
$pdo = new PDO("mysql:host=localhost;dbname=jour08;charset=utf8","root","");

$sql = "INSERT INTO etudiants (prenom, nom, naissance, sexe, email) VALUES (:prenom, :nom, :naissance, :sexe, :email)";

$req = $pdo->prepare($sql);
$req->execute(array (':prenom' => "Samantha", ':nom' => "Colmart",':naissance' => "2002-08-06",':sexe' => "Femme",':email' => "samantha.colmart@laplateforme.io",));