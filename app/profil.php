<?php

$auth = true.
require 'includes/config.php';
require 'includes/connect.php';
include_once '_navbar.php';


$alert = false;
if (isset($_GET['error'])) {
  $alert = true;
  if ($_GET['error'] == "unknownError") {
    $type = "warning";
    $message = "Une erreur s'est produite, nous nous excusons de la gêne occasionnée. Veuillez contacter l'administrateur du site, merci.";
}}
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
}
?>

<body>

<section>
<?php echo $alert ? "<div class='container mt-4 text-center p-2 alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>
<div>
<form action="profil_post.php" method="POST">
  <div class="mb-3">
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
    <label for="username" class="form-label">pseudo</label>
    <input type="text" class="form-control" id="username" name="username">    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
</div>
<a class="btn btn-primary" href="add-annonces.php" >Publier une nouvelle annonce</a>
<a class="btn btn-primary" href="annonces.php" >Voir mes annonces()</a>
<a class="btn btn-primary" href="#" >Voir mes réservations()</a>

<div>

</div>
<a class="btn btn-primary" href="#" role="button">Retour aux annonces</a>
</section>

</body>