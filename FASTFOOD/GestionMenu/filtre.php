<?php 
try {
  $connection = new PDO('mysql:host = localhost; dbname=fastfood;charset=utf8','root','Akb311205?');
    $prix = 0;
    if(isset($_POST["prix"]))
    $prix = $_POST["prix"];
    $req = $connection->prepare('SELECT * FROM menu WHERE prix > ?');
    $req->execute(array($prix));
    } 
catch (Exception $e) {
  echo"Une erreur s'est produite !!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\Assets\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\Assets\style.css">
    <title>FASTFOOD</title>
    <style>

      .dispose{
        display: flex;
        gap : 20px;
      }
    </style>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg fixed-top" style = "background-color: orange;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div>
        <img src="..\Assets\image\OIP.png" alt="logo restaurant" class = "w-25">
      </div>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="margin-left: -150px">
      <a class="navbar-brand" href="#"> <span class = "Fast">Fast</span><span class = "Food">Food</span></a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="..\index.php">Acueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="..\GestionMenu\menu.php">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href = "..\GestionClient\client.php">Client</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="..\GestionComande\commande.php">Commande</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="..\GestionApropos\aprops.php">A propos</a>
        </li>
      </ul>
      <button class = "appel">+22899667572</button>
    </div>
  </div>
</nav>
    </header>

    <h1 class = "acueilCenter">Liste des Menus</h1>
    <div class="dispose">
    <a type="button" class="btn btn-primary" href = "ajoutMenu.php">Ajouter un menu</a>
    <a type="button" class="btn btn-primary" href = "menu.php">Listes des menus</a>

    </div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom </th>
      <th scope="col">Composition</th>
      <th scope="col">Categorie</th>
      <th scope="col">Type</th>
      <th scope="col">Prix</th>
      <th scope="col">Disponibilité</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    


    <?php

  while ($menu = $req->fetch()) { ?>
    <tr>
      <td><?php echo($menu["id"])?></td>
      <td><?php echo($menu["nom"])?></td>
      <td><?php echo($menu["composition"])?></td>
      <td><?php echo($menu["categorie"])?></td>
      <td><?php echo($menu["type1"])?></td>
      <td><?php echo($menu["prix"])?></td>
      <td><?php echo($menu["disponibilite"])?></td>
      <td>
      <a href = "modifierMenu.php?id=<?=$menu["id"]; ?> " type="button" class="btn btn-warning">Modifier</a>
      <a type="button" class="btn btn-danger" role = "Button" href = "?id=<?php echo $menu['id'];   ?>" >Supprimer</a>
      </td>
      </tr>
    <?php
  }

    ?>
