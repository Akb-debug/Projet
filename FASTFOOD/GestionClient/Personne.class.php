<?php 

class Personne{
    protected $id;
    protected $nom;
    protected $prenom;
   // protected $contact;
   

    public function __construct($id, $nom, $prenom){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
       // $this->contact = $contact;
        }

    public function getNom(){
        return $this -> nom;
    }
    
    public function setNom($nomModifier){
        $this -> nom = $nomModifier;
    }

    public function getPrenom(){
        return $this -> prenom;
    }

    public function setPrenom($prenomModifier){
        $this -> prenom = $prenomModifier;
    }

    // public function getContact(){
    //     return $this -> contact;
    // }

    // public function setContact($contactModifier){
    //     $this ->contact = $contactModifier;
    // }
    
}

?>