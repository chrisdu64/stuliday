<?php

include_once "_navbar.php";

$alert = false;

if (isset($_GET['success'])) {
    $alert = true;
    
        $type = 'success';
        $message = 'Vous êtes connectés';
    }

?>



<div id="carouselExampleSlidesOnly" class="carousel slide"  data-bs-ride="carousel">
  <div class="carousel-inner" style="height:50vh">
    <div class="carousel-item active">
      <img src="assets/accueil.jpg" style="object-fit:cover; object-position:center" class="d-block w-100 img-fluid" alt="...">
    </div>
    <div class="carousel-item ">
      <img src="assets/beach.jpg" class="d-block w-100 img-fluid" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/italie.jpg" class="d-block w-100 img-fluid" alt="...">
    </div>
  </div>
</div>

<?php echo $alert ? "<div class='container mt-4 text-center p-2 alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>
<div class="container mt-4 text-center bg-secondary p-2" style="--bs-bg-opacity: .25">
    <h1 >Bienvenue sur STULIDAY !</h1>
    <div class="d-flex justify-content-center">
        <a href="sign-up.php" > Connectez-vous</a>
        <p class="mx-2">ou</p>
        <a href="sign-up.php"> Inscrivez-vous</a>
    </div>
</div>
