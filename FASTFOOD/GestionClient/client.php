<?php 
try {
  $connection = new PDO('mysql:host = localhost; dbname=fastfood;charset=utf8','root','Akb311205?');
  echo"connection établie";
 

 if(isset($_POST["nom"])){ 
 $nom = $_POST["nom"];
 $req = $connection->prepare('SELECT * FROM client WHERE nom = ?');
 $req->execute(array($nom));
}else{
  $req = $connection ->query("SELECT * FROM client");
}
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
        padding-top:20px ;
      }

</style>
</head>
<body>
    <header style ="padding-bottom:100px">
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

    <h1 class = "acueilCenter">Liste des clients</h1>
    <a type="button" class="btn btn-primary" href = "ajouterClient.php">Ajouter un client</a>

    <form action="client.php" method = "POST" class="dispose">
      <label for="filtrer" style = "font-family : Arial Black; font-size : 12px; font-weight : bold">Filtrer :</label>
      <input type="text" name="nom" placeholder="filtrez par rapport aux nom">
      <button class="btn btn-primary">Rechercher</button>
    </form>
    <table class="table table-striped table-hover" style = "max-width:90%; margin-left:60px;border-radius:8px">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom </th>
      <th scope="col">prenom</th>
      <th scope="col">contact</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php

while ( $client = $req->fetch()) { ?>
  <tr>
    <td><?php echo($client["id"])?></td>
    <td><?php echo($client["nom"])?></td>
    <td><?php echo($client["prenom"])?></td>
    <td><?php echo($client["contact"])?></td>
    <td>

   <a href = "modifierClient.php?id=<?php echo $client['id']; ?>  " type="button" class="btn btn-warning">Modifier</a>
   <a type="button" class="btn btn-danger" role = "Button" href = "suprimerclient.php?id=<?php echo $client['id'];?>" >Supprimer</a>
    </td>
    </tr>
  <?php
}

  ?>


</tbody>
</table>

    <script src="..\assets\bootstrap\js\bootstrap.min.js"></script>