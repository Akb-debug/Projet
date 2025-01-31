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
    <nav class="navbar navbar-expand-lg" style = "background-color: orange;">
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
      
      
      if(isset($_POST["id_client"])){
          $id_client = $_POST["id_client"];
      }
      if(isset($_POST["id_menu"])){
          $id_menu = $_POST["id_menu"];
      }
      if(isset($_POST["date"])){
          $date = $_POST["date"];
      }

      if(isset($_POST["prix"])){
        $prix = $_POST["prix"];
    }
      
      $req = $connection->prepare("INSERT INTO commande (date_commande,prix,menu_id,client_id)
      VALUES (:date_commande, :prix, :id_menu, :id_client)");
      $req->execute(array(
        'date_commande'=>$date,
        'prix'=>$prix,
        'id_menu'=>$id_menu,
        'id_client'=>$id_client
      ));
      
   // }
   // catch (Exception $e) {
      //  echo"Une erreur s'est produite !!";
     // }
  ?>
</div>
<div style = "padding-top : 20px; display: flex; justify-content: center;">
  <a type="button" class="btn btn-primary" href = "commande.php">Liste des commandes</a>
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
        <th>ID Client:</th>
        <th><?php echo $id_client ?></th>
      </tr>
      <tr>
        <th>ID Menu:</th>
        <th><?php echo $id_menu?></th>
      </tr>
      <tr>
        <th>Date:</th>
        <th><?php echo $date ?></th>
      </tr>
      <tr>
        <th>Prix:</th>
        <th><?php echo $prix ?></th>
      </tr>
    </tbody>
    </table> 

  </div> <br>
  <h2 style = " text-align: center" >
    Client ajouter avec succès!!
  </h2>
</div>