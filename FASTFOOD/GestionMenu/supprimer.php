<?php 
// try {
  $connection = new PDO('mysql:host = localhost; dbname=fastfood;charset=utf8','root','Akb311205?');
  echo"connection établie";

 if(isset($_GET["id"]))
 $id = $_GET["id"];

$reqdellet = $connection->prepare('DELETE FROM menu WHERE id = :id');
$reqdellet->execute(
    array(':id' => $id)
);

echo "<script>
alert('Menu supprimé avec succès !');
</script>";
header('location: menu.php');

?>
