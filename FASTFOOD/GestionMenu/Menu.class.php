<?php 

include_once '../GestionConnection/Connection.class.php';

class Menu{
    private $id;
    private $nom;
    public $composition;
    private $categorie;
    private $typeMenu;
    private $prix;
    private $disponibilite;

    public function __construct($id, $nom, $composition, $categorie, $typeMenu, $prix, $disponibilite){
        $this->id = $id;
        $this->nom = $nom;
        $this->composition = $composition;
        $this->categorie = $categorie;
        $this->typeMenu = $typeMenu;
        $this->prix = $prix;
        $this->disponibilite = $disponibilite;
        }

    public function getNom(){
        return $this -> nom;
    }
    
    public function setNom($nomModifier){
        $this -> nom = $nomModifier;
    }

    public function getComposition(){
        return $this -> composition;
    }

    public function getprix(){
        return $this -> prix;
    }
    
    public function ajouterMenu(){
        try{
            $Connect = Connection::connectionDB();
            $prepare = $Connect->prepare("INSERT INTO menu(id, nom, composition, categorie, type1, prix, disponibilite) VALUES(:id, :nom, :compostion, :categorie,:typeMenu, :prix, :disponiblite)");
            $prepare->execute(
                [   
                    'id' => $this->id,
                    'nom' => $this->nom,
                    'compostion' => $this->composition,
                    'categorie' => $this->composition,
                    'typeMenu' => $this->typeMenu,
                    'prix' => $this->prix,
                    'disponiblite' => $this->disponibilite
                ]
                );
              
        }
        catch (PDOException $e) 
            {
                echo "<h5 style = 'color: red;'>Erreur : c'est produit!!! ici </h5>".$e->getMessage();
            }
    }

    public function supprimerMenu(){
        try{
            $Connect = Connection::connectionDB();
            
            $preparer = $Connect ->prepare('DELETE FROM menu WHERE id = :id');
            
            $execut = $preparer->execute([':id'=>$this-> id]);
        }
        catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
            }
    }

    public function modifierMenu(){
        try{
            $Connect = Connection::connectionDB();
            $prepare= $Connect -> prepare('UPDATE menu SET nom = :nom, composition = :composition, categorie=:categorie, type1=:typeMenu, prix = :prix, disponibilite = :dispo WHERE id = :id');
            $modification = $prepare->execute(
                [
                    ':nom' => $this->nom,
                    ':composition' => $this->composition,
                    ':categorie' => $this->categorie,
                    ':typeMenu' => $this->typeMenu,
                    ':prix' => $this->prix,
                    ':dispo' => $this->disponibilite,
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