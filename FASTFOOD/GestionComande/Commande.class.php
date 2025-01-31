<?php 

include_once '../GestionConnection/Connection.class.php';

class Commande{
    private $id;
    private $nomClient;
    public $nomMenu;
    private $prix;
    private $dateCommande;


    public function __construct( $nomClient, $nomMenu,$dateCommande, $prix ){
    
        $this->nomClient = $nomClient;
        $this->nomMenu = $nomMenu;
        $this->dateCommande = $dateCommande;
        $this->prix = $prix;
        
        }

    // public function getNom(){
    //     return $this -> nom;
    // }
    
    // public function setNom($nomModifier){
    //     $this -> nom = $nomModifier;
    // }

    // public function getComposition(){
    //     return $this -> composition;
    // }

    // public function getprix(){
    //     return $this -> prix;
    // }
    
    public function ajouterCommande(){
        try{
            $Connect = Connection::connectionDB();
            $prepare = $Connect->prepare("INSERT INTO commande(client_id, menu_id, date_commande, prix) VALUES(:clientId, :menuId, :dateCommande, :prix)");
            $prepare->execute(
                [   
                   
                    'clientId' => $this->nomClient,
                    'menuId' => $this->nomMenu,
                    'dateCommande' => $this->dateCommande,
                    'prix' => $this->prix
                ]
                );
              
        }
        catch (PDOException $e) 
            {
                echo "<h5 style = 'color: red;'>Erreur : c'est produit!!! ici </h5>".$e->getMessage();
            }
    }

    public function supprimerCommande(){
        try{
            $Connect = Connection::connectionDB();
            
            $preparer = $Connect ->prepare('DELETE FROM commande WHERE id = :id');
            
            $execut = $preparer->execute([':id'=>$this-> id]);
        }
        catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
            }
    }

    public function modifierCommande(){
        
        try{
            $Connect = Connection::connectionDB();
            $prepare= $Connect -> prepare('UPDATE commande SET client_id = :nomClient, menu_id = :nomMenu, date_commande=:dateCommande, prix = :prix WHERE id = :id');
            $modification = $prepare->execute(
                [
                    ':nomClient' => $this->nomClient,
                    ':nomMenu' => $this->nomMenu,
                    ':dateCommande' => $this->dateCommande,
                    ':prix' => $this->prix,
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