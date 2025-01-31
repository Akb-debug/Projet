<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\Assets\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\Assets\style.css">
    <title>FASTFOOD</title>
    <style>
     
      .table-container {
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
    <nav class="navbar navbar-expand-lg  " style = "background-color: orange;">
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
/*
try {
  $connection = new PDO('mysql:host = localhost; dbname=fastfood;charset=utf8','root','Akb311205?');
 // echo"connection établie";
 $nom = "";
$composition = "";
$categorie = "";
$type ="";
$prix = 0.0;
$disponibilite = "";

if(isset($_POST["nom"]))
$nom = $_POST["nom"];

if(isset($_POST["composition"]))
$composition = $_POST["composition"];

if(isset($_POST["categorie"]))
$categorie = $_POST["categorie"];

if(isset($_POST["type"]))
$type = $_POST["type"];

if(isset($_POST["prix"]))
$prix = $_POST["prix"];

if(isset($_POST["disponibilite"]))
$disponibilite = $_POST["disponibilite"];

$req = $connection->prepare("INSERT INTO menu (nom,composition,categorie,type1,prix,disponibilite)
VALUES (:nom, :composition, :categorie, :type1, :prix, :disponibilite)");
$req->execute(array(
  'nom'=>$nom,
  'composition'=>$composition,
  'categorie'=>$categorie,
  'type1'=>$type,
  'prix'=>$prix,
  'disponibilite'=>$disponibilite
));

}
catch (Exception $e) {
 echo"Une erreur s'est produite !!";
}
*/?>
    <?php 

        include_once 'menu.class.php';
      
        $nom = "";
        $composition = "";
        $categorie = "";
        $type ="";
        $prix = 0.0;
        $disponibilite = "";
        $id = 0;


        if(isset($_POST['id']))
          $id = $_POST['id'];
      
        if(isset($_POST["nom"]))
        $nom = $_POST["nom"];
        
        if(isset($_POST["composition"]))
        $composition = $_POST["composition"];
        
        if(isset($_POST["categorie"]))
        $categorie = $_POST["categorie"];
        
        if(isset($_POST["type"]))
        $type = $_POST["type"];
        
        if(isset($_POST["prix"]))
        $prix = $_POST["prix"];
        
        if(isset($_POST["disponibilite"]))
        $disponibilite = $_POST["disponibilite"];
        
            
    $oMenu = new Menu($id, $nom, $composition, $categorie, $type, $prix, $disponibilite);

    $oMenu -> ajouterMenu();

    //header('location: afficher.php');
    ?>




<div style = "padding-top : 25px ; display: flex; justify-content: center; ">
  <a type="button" class="btn btn-primary" href = "menu.php">Liste des menus</a>
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
        <th><?php echo $nom ?></th>
      </tr>
      <tr>
        <th>Composition:</th>
        <th><?php echo $composition ?></th>
      </tr>
      <tr>
        <th>Categorie:</th>
        <th><?php echo $categorie ?></th>
      </tr>
      <tr>
        <th>Type:</th>
        <th><?php echo $type ?></th>
      </tr>
      <tr>
        <th>Prix:</th>
        <th><?php echo $prix ?></th>
      </tr>
      <tr>
        <th>Disponibilité:</th>
        <th><?php echo $disponibilite ?></th>
      </tr>
    </tbody>
    </table> 

  </div> <br>
  <h2 style = " text-align: center" >
    Menu ajouter avec succès!!
  </h2>
</div>