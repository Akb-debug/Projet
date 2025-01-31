<?php 

include_once '../GestionConnection/Connection.class.php';
include_once 'Personne.class.php';

class Client extends Personne{
    private $contact;

    public function __construct($id, $nom, $prenom,$contact){
        parent::__construct($id, $nom, $prenom);
       $this->contact = $contact;
        }
   
    public function ajouterClient(){
        try{
            $Connect = Connection::connectionDB();
            $prepare = $Connect->prepare("INSERT INTO client (id, nom, prenom, contact) VALUES(:id, :nom, :prenom, :contact)");
            $prepare->execute(
                [   
                    'id' => $this->id,
                    'nom' => $this->nom,
                    'prenom' => $this->prenom,
                    'contact' => $this->contact,
                ]
                );
              
        }
        catch (PDOException $e) 
            {
                echo "<h5 style = 'color: red;'>Erreur : c'est produit!!! ici </h5>".$e->getMessage();
            }
    }

    public function supprimerClient(){
        try{
            $Connect = Connection::connectionDB();
            
            $preparer = $Connect ->prepare('DELETE FROM client WHERE id = :id');
            
            $execut = $preparer->execute([':id'=>$this-> id]);
        }
        catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
            }
    }

    public function modifierClient(){
        try{
            $Connect = Connection::connectionDB();
            $prepare= $Connect -> prepare('UPDATE client SET nom = :nom, prenom = :prenom, contaprenom WHERE id = :id');
            $modification = $prepare->execute(
                [
                    ':nom' => $this->nom,
                    ':prenom' => $this->prenom,
                    ':contact' => $this->contact,
                    ':id' => $this->id
                ]
            );
    }
            
    catch (PDOException $e) {
        echo "Erreur : c'est produit!!! ici ". $e->getMessage();
        }
}
}


?>
