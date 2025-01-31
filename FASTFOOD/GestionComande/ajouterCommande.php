<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\Assets\bootstrap\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\Assets\style.css">
    <title>FASTFOOD</title>
    <style>
      .form{
        border-radius : 8px;
        display: flex;
        justify-content: center;
        align-items:center;
        min-height: 50vh;
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

  <div>

    <h1 class = "acueilCenter">Ajout des commandes</h1>

    <div style ="display: flex; justify-content: center;">
      <a type="button" class="btn btn-primary" href = "commande.php" >Liste des commandes</a>
    </div>

    <div class = " form" >
      <form  action= " traitementCommande.php" method = "POST" class="row g-3 needs-validation" novalidate>

        <div class="form-floating mb-3">
          <!-- <input type="number" class="form-control" id="id_client" name ="id_client" placeholder="entrez votre l'id du client"> -->
          <select name = "id_client" id="id_client" class = "form-control">
                        <option value="" disabled selected>Choisissez le client</option>
                        <?php 
                         $connection = new PDO('mysql:host = localhost; dbname=fastfood;charset=utf8','root','Akb311205?');
                        $query = $connection-> query("SELECT nom, id FROM client");
                        $query->execute();
                        $results = $query->fetchAll();
                        foreach($results as $result){
                            ?>
                        <option value="<?php echo $result['id']?>"> <?php echo $result['nom']; ?> </option>
                        <?php
                        }
                        ?>
                    </select>
          <label for="id_client">ID Client</label>
        </div>

        <div class="form-floating">
          <!-- <input type="number" class="form-control" id="id_menu" name ="id_menu" placeholder="Entrez l'id du menu"> -->
          <select name = "id_menu" id="id_menu" class = "form-control">
                        <option value="" disabled selected>Choisissez le menu</option>
                        <?php 
                      
                        $query = $connection-> query("SELECT nom, id FROM menu");
                        $query->execute();
                        $results = $query->fetchAll();
                        foreach($results as $result){
                            ?>
                        <option value="<?php echo $result['id']?>"> <?php echo $result['nom']; ?> </option>
                        <?php
                        }
                        ?>
                    </select>
          <label for="prenom">ID Menu</label>
        </div>

        
        <div class="form-floating">
          <input type="date" class="form-control" id="date" name ="date" placeholder="Entrez la date">
          <label for="date">Date</label>
        </div>

        <div class="form-floating">
          <input type="number" class="form-control" id="prix" name ="prix" min="0" step = "0.01" placeholder="Entrez le prix du menu">
          <label for="prix">Prix</label>
        </div>

        <button class="btn btn-primary" type="submit">Enrégistrer</button>
      
      </form>
    </div> 
  </div> 
</body>