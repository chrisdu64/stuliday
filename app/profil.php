<?php

$auth = true.
require 'includes/config.php';
require 'includes/connect.php';
include_once '_navbar.php';


$alert = false;
if (isset($_GET['error'])) {
  $alert = true;
  if ($_GET['error'] == "unknownError") {
    $type = "danger";
    $message = "Une erreur s'est produite, nous nous excusons de la gêne occasionnée. Veuillez contacter l'administrateur du site, merci.";
}
  if ($_GET['error'] == "malformedInput") {
    $type = "warning";
    $message = "Une erreur s'est produite.";
}
}
if (isset($_GET['success'])) {
  $alert = true;  
  if ('addedProduct' == $_GET['success']) {
      $type = 'success';
      $message = 'Votre annonce a bien été ajoutée';
  }
  if ('modifAnnonce' == $_GET['success']) {
      $type = 'success';
      $message = 'Votre annonce a bien été modifiée';
  }
  if ($_GET['success'] == "delete") {
    $type = 'success';
    $message = 'Votre location a bien été supprimée';
}
}
?>

<body>

<main>
<?php echo $alert ? "<div class='container mt-4 text-center p-2 alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>
<section class="d-flex justify-content-around mx-auto" style="width:60%">
<div class="mx-auto" style="width:40%">
<form action="profil_post.php" method="POST">
  <div class="my-3">
    <label for="lastname" class="form-label">Nom</label>
    <input type="text" class="form-control" id="lastname" name="lastname">    
  </div>
  <div class="mb-3">
    <label for="firstname" class="form-label">Prénom</label>
    <input type="text" class="form-control" id="firstname" name="firstname">    
  </div>
  <div class="mb-3">
    <label for="adress" class="form-label">Adresse</label>
    <input type="text" class="form-control" id="adress" name="adress">    
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">    
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">Pseudo</label>
    <input type="text" class="form-control" id="username" name="username">    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  
  <button type="submit" class="btn btn-dark col-6">Mettre à jour</button>
</form>
<a class="btn btn-danger mt-2 col-6" href="annonces.php" role="button">Retour aux annonces</a>
</div>
<div class="d-flex flex-column justify-content-around align-items-start mx-auto "style="width:40%">
<a class="btn btn-success col-8" href="add-annonces.php" >Publier une nouvelle annonce</a>
<a class="btn btn-secondary col-8" href="annonces.php" >Voir mes annonces()</a>
<a class="btn btn-primary col-8" href="#" >Voir mes réservations()</a>
</div>

</div >
</section>

</main>
<?php
include_once "_footer.php";
?>
</body>