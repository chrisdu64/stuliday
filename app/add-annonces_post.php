<?php

$auth = true;
require 'includes/config.php';
require 'includes/connect.php';

if (empty($_POST['name']) || empty($_POST['capacity']) || empty($_POST['country']) || empty($_POST['price']) || empty($_POST['availability'])) {
    header('Location:add-annonces.php?error=missingInput');
    exit();
} else {
    $name = htmlspecialchars(trim($_POST['name']));
    $capacity = htmlspecialchars(floatval($_POST['capacity']));
    $country = htmlspecialchars(trim($_POST['country']));
    $price = htmlspecialchars(floatval($_POST['price']));
    $availability = htmlspecialchars(floatval($_POST['availability']));

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
        $imagePath = 'public/uploads/noimg.png';
        $image = null;
    }
}

if (null !== $availability && $availability <= date('Y-m-d')) {
    header('Location:add-products.php?error=pastAvailability');
    exit();
}

if ($image) {
    
    $valid_ext = ['jpg', 'jpeg', 'png'];
    $check_ext = strtolower(substr(strrchr($image['name'], '.'), 1));

    if (!in_array($check_ext, $valid_ext)) {
        header('Location:add-products.php?error=wrongFormat');
        exit();
    }

    $imagePath = 'uploads/'.uniqid().'/'.$image['name'];

    mkdir(dirname($imagePath));

    if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
        if (!in_array($check_ext, $valid_ext)) {
            header('Location:add-products.php?error=unknownError');
            exit();
        }
    }
}

$insertAnnonce = 'INSERT INTO location (name,capacity,location_adress,country,description,price,image,availability) VALUES(:name,:capacity,:location_adress,:country,:description,:price,:image,:availability)';
$reqInsertAnnonce = $connexion->prepare($insertAnnonce);
$reqInsertAnnonce->bindValue(':name', $name, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':capacity', $capacity);
$reqInsertAnnonce->bindValue(':location_adress', $location_adress, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':country', $country, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':description', $description, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':price', $price);
$reqInsertAnnonce->bindValue(':image', $imagePath, PDO::PARAM_STR);
$reqInsertAnnonce->bindValue(':availability', $availability, PDO::PARAM_STR);

if ($reqInsertAnnonce->execute()) {
    header('Location:profil.php?success=addedProduct');
    exit();
} else {
    header('Location:add-products.php?error=unknownError');
    exit();
}
?>