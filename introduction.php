<?php

abstract class Humain{
    public $nom;
    public $prenom;
    protected $age;
    public function __construct($prenom,$nom,$age){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->setAge($age);
    }
    abstract public function travailler();
    public function setAge($age){
        if(is_int($age) && $age >= 1 && $age <= 120){
        $this->age = $age;
    }else {
        throw new Exception ("L'age d'un employé 
        doit être un entier entre 1 et 120");
    }
    }
    public function getAge($age){
        $this->age = $age;
    }

}
class Employe extends Humain{
    public function travailler(){
        return "Je suis un employé et je travail";
    }
    public function presentation(){
        var_dump("Salut, je suis $this->prenom $this->nom et j'ai $this->age ans");
    }
}


class Patron extends Employe{
    public $voiture;
    public function __construct($prenom, $nom, $age, $voiture){
       parent::__construct($prenom, $nom, $age);
        $this->voiture = $voiture;
    }
    public function presentation(){
        var_dump ("Bonjour, je suis $this->prenom $this->nom et
         j'ai $this->age ans et j'ai une voiture");
    }
    public function rouler(){
    var_dump ("Bonjour, je roule avec ma $this->voiture !");
}
}
class Etudiant extends Humain{
    public function travailler(){
        return "je suis un étudiant";
        }
    }
    

$employe1 = new Employe("Lior","Chamla",32);
$employe2 = new Employe("Pernin","Magali",32);
$employe1->presentation();
// $employe1->setAge(50);

$patron = new Patron("Joseph","Durand",55,"Mercedes");
$patron->presentation();
$patron->rouler();

$etudiant = new Etudiant("Alexis","Fournier",19);

function faireTravailler(Humain $objet){
    var_dump("Travail en cours : {$objet->travailler()}");
}

faireTravailler($employe1);
faireTravailler($patron);
faireTravailler($etudiant);

