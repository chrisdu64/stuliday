<?php

$auth = true;
require 'includes/config.php';
require 'includes/connect.php';


$getId = explode('=', $_SERVER['HTTP_REFERER'])[1];



if (!($getId == $_POST['id'])) {
    header("Location:modifier-annonces.php?id=$getId&error=malformedInput");
    exit();
}

if (empty($_POST['type']) || empty($_POST['capacity']) || empty($_POST['country']) || empty($_POST['price']) || empty($_POST['availablity'])) {
    header("Location:modifier-annonces.php?id=$getId&error=missingInput");
    exit();
} else {
    $type = htmlspecialchars(trim($_POST['type']));
    $capacity = htmlspecialchars(floatval($_POST['capacity']));
    $country = htmlspecialchars(trim($_POST['country']));
    $price = htmlspecialchars(floatval($_POST['price']));
    $availablity = htmlspecialchars(trim($_POST['availablity']));
    $location_id = $_POST['id'];

    if (!empty($_POST['location_adress'])) {
        $location_adress = htmlspecialchars(trim($_POST['location_adress']));
    } else {
        $location_adress = null;
    }
    if (!empty($_POST['description'])) {
        $description = htmlspecialchars(trim($_POST['description']));
    } else {
        $description = null;
    }

    if (empty($_FILES['image']['name'])) {
        $imagePath = 'uploads/wait.jpg';
        $image = null;
        
    }else {
        $image = $_FILES['image'];
    }
}

$modifAnnonces = 'UPDATE location SET type=:type,capacity=:capacity,location_adress=:location_adress,country=:country,description=:description, price=:price,image=:image,availablity=:availablity WHERE location_id=:id';
$reqModifAnnonces = $connexion->prepare($modifAnnonces);
$reqModifAnnonces->bindValue(':type', $type, PDO::PARAM_STR);
$reqModifAnnonces->bindValue(':capacity', $capacity,);
$reqModifAnnonces->bindValue(':location_adress', $location_adress, PDO::PARAM_STR);
$reqModifAnnonces->bindValue(':country', $country, PDO::PARAM_STR);
$reqModifAnnonces->bindValue(':description', $description, PDO::PARAM_STR);
$reqModifAnnonces->bindValue(':price', $price);
$reqModifAnnonces->bindValue(':image', $imagePath, PDO::PARAM_STR);
$reqModifAnnonces->bindValue(':availablity', $availablity, PDO::PARAM_STR);
$reqModifAnnonces->bindValue(':id', $location_id);

if ($reqModifAnnonces->execute()) {    
    header("Location:profil.php?success=modifAnnonce");
    exit();
} else {
    header("Location:profil.php?id=$getId&error=unknownError");
    exit();
}