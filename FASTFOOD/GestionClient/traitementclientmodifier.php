<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\Assets\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\Assets\style.css">
    <title>FASTFOOD</title>
    <style>

      .table-container{
        display: flex;
        justify-content: center;
        align-items:center;
        min-height: 50vh;
      }
      .table{
        width:70%;
        overflow:hidden; /*gerer les debordement*/
        border-radius : 8px;
        max-width: 800px;
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

<div>
<?php
// try {
  $connection = new PDO('mysql:host = localhost; dbname=fastfood;charset=utf8','root','Akb311205?');
 // echo"connection établie";
 $nnom = "";
$nprenom = "";
$ncontact = "";


if(isset($_POST["nom"]))
$nnom = $_POST["nom"];

if(isset($_POST["prenom"]))
$nprenom = $_POST["prenom"];

if(isset($_POST["contact"]))
$ncontact = $_POST["contact"];

if(isset($_GET["id"]))
$nid = $_GET["id"];


$req = $connection->prepare('UPDATE client SET nom= :nnom, prenom=:nprenom, contact=:ncontact WHERE id = :nid');
$modifier = $req->execute(array(
  'nnom'=>$nnom,
  'nprenom'=>$nprenom,
  'ncontact'=>$ncontact,
  'nid'=>$nid
));
// }
// catch (Exception $e) {
//  echo"Une erreur s'est produite !!";
// }
?>


<div style = "padding-top : 20px">
  <a type="button" class="btn btn-success" href = "menu.php">Liste des clients</a>
</div >


<div class="table-container">
    <table class="table table-borderless ">
        <thead>
        <tr>
            <th>Champ</th>
            <th>Valeur</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>Nom:</th>
            <th><?php echo $nnom ?></th>
        </tr>
        <tr>
            <th>Prenom:</th>
            <th><?php echo $nprenom ?></th>
        </tr>
        <tr>
            <th>Contact:</th>
            <th><?php echo $ncontact ?></th>
        </tr>
        </tbody>
    </table> 

  </div> <br>
  <h2 style = " text-align: center" >
    Client Modifié avec succès!!
  </h2>
</div>