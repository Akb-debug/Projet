
<?php 
//try {
    $connection = new PDO('mysql:host=localhost;dbname=fastfood;charset=utf8','root','Akb311205?');
    //echo"connection établie";

    if(isset($_GET["id"]))
    $id = $_GET["id"];
  
    $req = $connection->prepare('SELECT * FROM menu WHERE id=:id');
    $req->execute(
      [
        ':id'=>$id
      ]
    );
    $donnees = $req->fetch();

//catch (Exception $e) {
// echo"Une erreur s'est produite !!";
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\Assets\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\Assets\style.css">
    <title>FASTFOOD</title>
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
    
  <h1 class = "acueilCenter">Modification des menus</h1>
  <a type="button" class="btn btn-primary" href = "menu.php">Liste des menus</a>

  <form  action= "traitementmodifier.php?id=<?php  echo $id; ?> " method = "POST" class="row g-3 needs-validation" >

    <div class="col-md-4">
      <label for="nom" class="form-label">Nom</label>
      <input type="text" class="form-control" id="nom" name = "nom" value = "<?php  echo $donnees['nom']; ?> ">
      <div class="valid-feedback"> Nom valide</div>
      <div class="invalid-feedback"> Veillez renseigner le nom</div>
    </div>

    <div class="col-md-4">
      <label for="prix" class="form-label">Prix</label>
      <input type="text" class="form-control" id="prix"  name = " prix"  value = "<?php  echo $donnees['prix']; ?> ">
      <div class="valid-feedback"> Prix valide</div>
      <div class="invalid-feedback">Veuillez renseigner le prix</div>
    </div>

    <div class="col-md-4">
      <label for="composition" class="form-label">Composition</label>
      <div class="input-group has-validation">
        <input type="text" class="form-control" id="composition" name = " composition" value = "<?php  echo $donnees['composition']; ?> ">
        <div class="valid-feedback"> Composition valide</div>
        <div class="invalid-feedback">Veuillez renseigner la composition</div>
      </div>
    </div>

    <div class="col-md-6">
      <label for="categorie" class="form-label">Catégorie</label>
      <select class="form-select" id="categorie" name = " categorie" value = "<?php  echo $donnees['categorie']; ?> ">
        <option selected disabled value="">Choose...</option>
        <option>dinner</option>
        <option>Dejeuner</option>
        <option>Petit-Dejeuner</option>
      </select>
      <div class="invalid-feedback">Veuillez sélectionner une categorie</div>
    </div>

    <div class="col-md-3">
      <label for="disponibilite" class="form-label">Disponibilité</label>
      <select class="form-select" id="disponibilite" name = " disponibilite" value = "<?php  echo $donnees['disponibilite']; ?> ">
        <option selected disabled value="">Choose...</option>
        <option>Oui</option>
        <option>Non</option>
      </select>
      <div class="invalid-feedback">Veuillez indiquer la disponibilité </div>
    </div>

    <div class="col-md-3">
      <label for="type" class="form-label">Type</label>
      <select class="form-select" id="type" name = " type" value = "<?php  echo $donnees['type1']; ?> ">
        <option selected disabled value="">Choose...</option>
        <option>Pour Adulte</option>
        <option>Pour Jeune</option>
        <option>Pour enfant</option>
      </select>
      <div class="invalid-feedback">Veuillez choisir un type</div>
    </div>

    <div class="col-md-3">
      <button class="btn btn-primary" type="submit">Enrégistrer</button>
    </div>
  </form>
</div>

