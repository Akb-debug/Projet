<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\Assets\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\Assets\style.css">
    <style>
      .form{
        border-radius : 8px;
        display: flex;
        justify-content: center;
        align-items:center;
        min-height: 50vh;

      }
    </style>
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
  </header>

  <h1 class = "acueilCenter">Ajout des clients</h1>
  <div style ="display: flex; justify-content: center;">
    <a type="button" class="btn btn-primary" href = "client.php" >Liste des clients</a>
  </div>
  <div class = " form" >
    <form  action= " traitementClient.php" method = "post" class="row g-3 needs-validation" novalidate>

      <div class="form-floating mb-3">
        <input type="texte" class="form-control" id="nom" name ="nom" placeholder="entrez votre nom">
        <label for="nom">Nom</label>
      </div>

      <div class="form-floating">
        <input type="texte" class="form-control" id="prenom" name ="prenom" placeholder="Entrez le prenom">
        <label for="prenom">Prenom</label>
      </div>

      
      <div class="form-floating">
        <input type="text" class="form-control" id="contact" name ="contact" placeholder="Entrez le contact">
        <label for="contact">Contact</label>
      </div>

      <button class="btn btn-primary" type="submit">Enrégistrer</button>
    
    </form>
  </div>  
</body>