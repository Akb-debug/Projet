<?php 
class 
Connection{

    public static function connectionDB(){
        $bd = new PDO('mysql:host=localhost; dbname=fastfood; charset=utf8','root','Akb311205?');
        return $bd; 
    }

}

?>