<?php

$auth = true;
require 'includes/config.php';
require 'includes/connect.php';
include_once '_head.php';
include_once '_navbar.php';
include_once '_zoom-annonces.php';

?>

<div class="card container m-4 p-4">
        <h3><?php echo $annonce['type']; ?>pour <?php echo $annonce['capacity']; ?>personnes, à <?php echo $annonce['country'];?>.</h3>
        <div class="col-md-4 center">
            <img src="<?php echo $annonce['image']; ?>" alt="<?php echo $annonce['type']; ?>" class="img-fluid">
        </div>
        <p class="text-bold">Description :</p>
        <p><?php echo $annonce['description']; ?></p>
        <p>Son adressse complète est : <?php echo $annonce['location_adress'];?>.</p>
        <hr>
        <p>Votre séjour commencera le <?php echo $annonce['availablity'];?>.</p>
        <p>Prix du séjour : <?php echo $annonce['price']; ?>€.</p>
        <hr>
        <p class="btn btn-success col-2">Choisir ce séjour</p>
        
    </div>