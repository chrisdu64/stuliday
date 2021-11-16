<?php
$viewAnnounces = 'SELECT * from location';
$reqViewAnnounces = $connexion->query($viewAnnounces);
$announces = $reqViewAnnounces->fetchAll();
?>