<?php

$auth = true;
require 'includes/config.php';
require 'includes/connect.php';
include_once '_navbar.php';
include_once '_view-annonces.php';

?>


<?php
foreach($annonces as $annonce){
?>
<div class="card m-4" style="width:30%">
    <img src="<?php echo $annonce['image']; ?>" alt="<?php echo $annonce['type']; ?>" class="img-fluid">
    <div class="card-body">
        <h3 class="card-title"><?php echo $annonce['type'];?> pour <?php echo $annonce['capacity']; ?> personnes à <?php echo $annonce['country']?>.</h3>                
        <p class="text-bold">Description :</p>
        <p><?php echo $annonce['description']; ?></p>
        <p>Son adressse complète est : <?php echo $annonce['location_adress'];?>.</p>
        <hr>
        <p>Votre séjour commencera le <?php echo date('d-m-Y',strtotime($annonce['availablity']));?>.</p>
        <p>Prix du séjour : <?php echo $annonce['price']; ?>€.</p>
        <hr>
        <a href="#" class="btn btn-success ">Choisir ce séjour</a>     
        <a href="detail.php?id=<?php echo $annonce['location_id']; ?>" class="btn btn-info ">Détail</a>     
  </div>
</div>
        
    
<?php
}
?>
</div>