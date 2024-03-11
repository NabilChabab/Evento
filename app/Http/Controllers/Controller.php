<?php

// namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Validation\ValidatesRequests;
// use Illuminate\Routing\Controller as BaseController;

// class Controller extends BaseController
// {
//     use AuthorizesRequests, ValidatesRequests;
// }


abstract class YouCode {


    public $nom ;
    public $prenom ;
    public $age ;



    public __construct($nom , $prenom , $age){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
    }


    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }


    abstract function salaire($age);
}



