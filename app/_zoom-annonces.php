<?php

$id = $_GET['id'];

$viewAnnonce = "SELECT * from location WHERE location_id = :location_id";
$reqViewAnnonce = $connexion->prepare($viewAnnonce);
$reqViewAnnonce->bindValue(':location_id',$id);
$reqViewAnnonce->execute();
$annonce = $reqViewAnnonce->fetch();
if(empty($annonce)){
    echo "Erreur";
    echo '<meta http-equiv="refresh" content="0;URL=index.php?error=noId">';
    exit();
    }

?>