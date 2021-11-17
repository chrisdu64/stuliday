<?php

$auth = true;
require 'includes/config.php';
require 'includes/connect.php';

// echo '<pre>';
// var_dump($_FILES);
// echo '</pre>';

if (empty($_POST['type']) || empty($_POST['capacity']) || empty($_POST['country']) || empty($_POST['price']) || empty($_POST['availablity'])) {
    header('Location:add-annonces.php?error=missingInput');
    exit();
} else {
    $type = htmlspecialchars(trim($_POST['type']));
    $capacity = htmlspecialchars(floatval($_POST['capacity']));
    $country = htmlspecialchars(trim($_POST['country']));
    $price = htmlspecialchars(floatval($_POST['price']));
    $availablity = htmlspecialchars(trim($_POST['availablity']));

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

if (null !== $availablity && $availablity <= date('Y-m-d')) {
    header('Location:add-annonces.php?error=pastAvailablity');
    exit();
}

if ($image) {
    
    $valid_ext = ['jpg', 'jpeg', 'png'];
    $check_ext = strtolower(substr(strrchr($image['name'], '.'), 1));

    if (!in_array($check_ext, $valid_ext)) {
        header('Location:add-annonces.php?error=wrongFormat');
        exit();
    }

    $imagePath = 'uploads/'.uniqid().'/'.$image['name'];

    mkdir(dirname($imagePath));

    if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
        if (!in_array($check_ext, $valid_ext)) {
            header('Location:add-annonces.php?error=unknownError');
            exit();
        }
    }
}

$insertAnnonce = 'INSERT INTO location (type,capacity,location_adress,country,description,price,image,availablity) VALUES(:type,:capacity,:location_adress,:country,:description,:price,:image,:availablity)';
$reqInsertAnnonce = $connexion->prepare($insertAnnonce);
$reqInsertAnnonce->bindValue(':type', $type, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':capacity', $capacity);
$reqInsertAnnonce->bindValue(':location_adress', $location_adress, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':country', $country, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':description', $description, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':price', $price);
$reqInsertAnnonce->bindValue(':image', $imagePath, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':availablity', $availablity, PDO::PARAM_STR);

if ($reqInsertAnnonce->execute()) {
    header('Location:profil.php?success=addedProduct');
    exit();
} else {
    header('Location:add-annonces.php?error=unknownError');
    exit();
}
?>