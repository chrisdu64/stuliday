<?php

require "includes/connect.php";

if (in_array('', $_POST)) {
    header('Location:sign-up.php?error=missingInput');
    exit();
} else {   
    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);
}

$verifEmail = "SELECT count(*) FROM user WHERE email = :email OR username= :username";
$reqVerifEmail = $connexion->prepare($verifEmail);
$reqVerifEmail ->bindValue(':email', $email, PDO::PARAM_STR);
$reqVerifUsername->execute();

$resultatVerifEmail = $reqVerifEmail->fetchColumn();

if ($resultatVerifEmail > 0) {
    header('Location:sign-up.php?error=emailExists');
    exit();
}

if ($password !== $password2) {
    header('Location:sign-up.php?error=differentPasswords');
    exit();
}

$password = password_hash($password, PASSWORD_DEFAULT);

$insertUser = "INSERT INTO user (email,username,password) VALUES (:email,:username,:password)";
$reqInsertUser = $connexion->prepare($insertUser);
$reqInsertUser->bindValue(':email', $email, PDO::PARAM_STR);
$reqInsertUser->bindValue(':password', $password, PDO::PARAM_STR);

$resultatInsertUser = $reqInsertUser->execute();

if ($resultatInsertUser) {
    header('Location:sign-up.php?success=loginSuccessful');
    exit();
}