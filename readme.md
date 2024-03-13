# POO : Programmation Orientée Objet

![capture d'ecran](/img_readme/poo.jpg)

**Les 5 principes de la POO :** 
- Abstraction (& l'interface)= permet le contrôle du code tel classe va avoir tel fonctionnalité
- Encapsulation = securise le code
- Héritage = evite la répétition / réutilisation du code
- Objet / classe = organise le code
- Polymorphisme = deux fonctions qui ont le même nom sur deux objets qui sont "similaires" mais qui n'auront pas les même répercutions

**Les 3 principes de la classe**:
 - la fonction constructeur
 - la portée
 - le typage

Lorsque on instancie  une classe, on crée une nouvelle version de l' objet.

**Les Classes :**
(Organisation du code)
Pour éviter des erreurs on va créer une classe qui est la représentation de quelque chose , dans notre cas l'employé 
La **class Employe** est une idée, l'instance de la classe  est un élément réel.
Nous allons définir des propriétes à notre classe et instancier notre classe = **$employe1 = new Employe();** et créer un objet, "$employe1 contient une nouvelle instance de la classe Employe**
La fonction **présentation** est la méthode de l'objet

**$this** = c'est l'objet dans notre cas **Employé1**  à l'interieur d'une fonction qui se trouve dans un objet pour faire réfèrence au nom de l'objet on utilise la variable $this  ("je veux le prénom de ceci l'age de ceci etc....)

````php
class Employe{
    public $nom;
    public $prenom;
    public $age;

    function presentation(){
        var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age ans");
    }

}

$employe1 = new Employe();
$employe1->prenom = "Lior";
$employe1->nom = "Chamla";
$employe1->age = "32";

$employe2 = new Employe();
$employe2->prenom = "Pernin";
$employe2->nom = "Magali";
$employe2->age = "32";

$employe1->presentation();

````
![capture d'ecran](/img_readme/classe.PNG)

**Constructeur:**
Permet de passer des informations à l'objet dès sa création.
Va definir le comportement que doit avoir un employé au moment ou l'on construit une variable de type employé.
Comme l'instance **new Employe** est appelée deux fois le var_dump("je suis construit") affichera deux fois le var_dump.

````php
public function __construct(){
    var_dump("je suis construit")
}
````
![capture d'ecran](/img_readme/construct1.PNG)
La fonction **__construct** sera appelée à chaque fois que l'on appel "new Employe"
Le code sera plus clair en passant les propriétes en parametre.
Il faut passer 3 arguments à notre instance.

````php
class Employe{
    public $nom;
    public $prenom;
    public $age;

    public function __construct($prenom,$nom,$age){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->age = $age;
    }
    
    function presentation(){
        var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age ans");
    }

}

$employe1 = new Employe("Lior","Chamla",32);

$employe2 = new Employe("Pernin","Magali",32);

$employe1->presentation();

````
![capture d'ecran](/img_readme/construct.PNG)

**L'Encapsulation :**
(Sécurité du code)
**private** indique q'une propriété ne peut être modifié que dans la class elle même, dans notre cas la **class Employe.**
Elle ne peut être disponible que dans les fonctions déclarer dans la **classe Employe**

````php
<?php
class Employe{
    public $nom;
    public $prenom;
    private $age;

    public function __construct($prenom,$nom,$age){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->age = $age;
    }
    
    function presentation(){
        var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age ans");
    }
}

$employe1 = new Employe("Lior","Chamla",32);

$employe2 = new Employe("Pernin","Magali",32);

$employe1->age = "Bonjour";

$employe1->presentation();

````
![capture d'ecran](/img_readme/private.PNG)
 

Les fonctions publics vont nous permettre de travailler sur des propriétés private = " getteur et setteur."
setAge modifie l'age.(Accesseur)
getAge return l'age. (Mutateur)
50 va venir dans la variable $age de notre fonction setAge et $this->age = 50;
Notre fonction presentation indiquera bien 50.

````php
class Employe{
    public $nom;
    public $prenom;
    private $age;

    public function __construct($prenom,$nom,$age){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->age = $age;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function getAge($age){
        $this->age = $age;
    }
    
    function presentation(){
        var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age ans");
    }
}

$employe1 = new Employe("Lior","Chamla",32);

$employe2 = new Employe("Pernin","Magali",32);

$employe1->setAge(50);

$employe1->presentation();
````
![capture d'ecran](/img_readme/setget.PNG)

La  création de la  condition va nous permettre de sécuriser les donner modifier : 
- Si l'age est un entier et que l'age et >= à 1 et <= à 120 
- Sinon on affiche une erreur (lancer une nouvelle exception):
 **throw new Exception** nous permet d'indiquer le motif de l'erreur, évite aux collegues une perte de temps pour trouver l'erreur.


````php
    public function setAge($age){
        if(is_int($age) && $age >= 1 && $age <= 120 ){
        $this->age = $age;
        }else {
        throw new Exception ("L'age d'un employé 
        doit être un entier entre 1 et 120");
        }
    }
````
Avec le **else** et "Bonjour" en valeur : 
````php
$employe1->setAge("Bonjour");
````
![capture d'ecran](/img_readme/exception.PNG)

Par le constructeur l'age est intouchable au cas ou la valeur de age est modifiée directement dans l'instance, on appel directement notre fonction **setAge** qui est une condition et lance une exception:
````php
   public function __construct($prenom,$nom,$age){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->setAge($age);
    }

    $employe1 = new Employe("Lior","Chamla","Bonjour");
````
**L'héritage**:
 Nous allons utiliser l'héritage de la **class Employe**
 avec le mot clé **extends** pour créer une nouvelle class fille qui hérite des propriétés et méthode (fonctions) et méthode du parent.
 La propriétés **public $voiture**; et la méthode **public function rouler** seront à ajouter puisqu'elles ne sont pas présentes dans la class parent : 
````php
class Patron extends Employe{
    public $voiture;
    public function __construct($prenom,$nom,$age,$voiture){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->setAge($age);
        $this->voiture = $voiture;
    }
    public function rouler(){
    var_dump ("Bonjour, je roule avec ma $this->voiture !");
    }
}

$patron = new Patron("Joseph","Durand",55,"Mercedes");
$patron->presentation();
$patron ->rouler();
// $employe1->setAge(50);
````
![capture d'ecran](/img_readme/heritage.PNG)

Pour éviter d'appeler de nouveau les propriété de la classe parent  et ne pas les répeter chez la fille **class Patron extends Employe**   on appelle le constructeur de la classe parent, dans notre cas la **class Employe** cela évite la répétition :
````php
public function __construct($prenom,$nom,$age,$voiture){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->setAge($age);
        $this->voiture = $voiture;
    }
````
````php
    public function __construct($prenom,$nom,$age,$voiture){
       parent::__construct( $prenom ,$nom,$age );
        $this->voiture = $voiture;
    }
````

Si l'on souhaite modifier la présentation de notre **class Patron** (Bonjour et non Salut) c'est possible on va redefinir la **fonction présentation** pour qu'elle agisse autrement dans notre **classe Patron** directement c'est **LE POLYMORPHISME** deux fonctions qui ont le même nom sur deux objets qui sont "similaires" mais qui n'auront pas les même répercutions, dans notre cas le patron va dire "Bonjour" et non Salut: 

````php
class Patron extends Employe{
    public $voiture;
    public function __construct($prenom, $nom, $age, $voiture){
       parent::__construct($prenom, $nom, $age);
        $this->voiture = $voiture;
    }

    public function presentation(){
        var_dump ("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age ans et j'ai une voiture");
    }
    public function rouler(){
    var_dump ("Bonjour, je roule avec ma $this->voiture !");
    }
}

$employe1 = new Employe("Lior","Chamla",32);
$employe2 = new Employe("Pernin","Magali",32);
$employe1->presentation();
// $employe1->setAge(50);

$patron = new Patron("Joseph","Durand",55,"Mercedes");
$patron->presentation();
$patron->rouler();
````

![capture d'ecran](/img_readme/protected.PNG)

- Tout fonctionne sauf l'age en effet **private $age** est une propriété privé de la **class Employe**, pour que l'enfant puisse le modifier et le lire il faut utiliser le mot clé **protected** pour que le(s) classe fille(s) puisse modifier et lire **age** sans rendre la propriété public.

````php
class Employe{
    public $nom;
    public $prenom;
    protected $age;
}
````
Cela fonctionne l'age s'affiche.
![capture d'ecran](/img_readme/heritage2.PNG)


**Class Abstraites et Interfaces**:
La notion abstraction comporte les interfaces et les classes abstraites

**INTERFACE**: c'est un contrat qu'une classe "signe" et qu'elle doit respecter, elle sert à définir des fonctionnalitées. Elle indique qu'une classe possède certaines méthodes.(contraintes).
Permet aux développeurs de créer des programmes en spécifiant les méthodes publiques qu’une classe doit implémenter, sans entrer dans les détails de l’implémentation de ces méthodes.Et définie comme une classe, mais avec le mot-clé **interface**
Les interfaces sont des outils puissants pour définir des contrats entre les classes et favorisent la réutilisation du code.

- Création de la fonction **"fairetravailler"** elle va nous permettre de recevoir les objets et quelle fasse un **var_dump** pour afficher le resultat d'une méthode qui existe sur l'objet dans notre cas = **public function travailler** quelque soit l'objet on veut être sur que l'objet ait une fonction **travailler**
````php
function faireTravailler($objet){
    var_dump("Travail en cours : {$objet->travailler()}");
}
````
- En utilisant l'INTERFACE (contrôle du code) on met en place un "contrat" qui définit le(s) méthode(s) que l'on veut obligatoire sur tous les objets définis, dans notre cas ma méthode **public function travailler()**
````php
interface Travailleur{
    public function travailler();
}
````

Si l'on veut qu'une classe "signe ce contrat" on va utiliser le mot clé **implements** (signe ce contrat) et ajouter  **public function travailler()**.
Dans notre cas on veut que la **class Employe** signe ce contrat :

````php
class Employe implements Travailleur{
    public $nom;
    public $prenom;
    protected $age;

    public function travailler(){
        return "Je suis un employé et je travaille";
        }
    }
````
On peut utiliser la fonction **fairetravailler** et  **$employe1** qui est notre objet de la **class Employe**, quelque soit l'objet il doit avoir la fonction **travailler**

````php
    faireTravailler($employe1);
    function faireTravailler($objet){
    var_dump("Travail en cours : {$objet->travailler()}");
    }
````
![capture d'ecran](/img_readme/interface.PNG)

Il faut obligatoirement passer un objet de la class, dans notre cas la **class Employe** **$employe1 ou $employe2** ou la class fille **class Patron** **$patron**

On peut créer une autre class qui représente autre chose, pas d'heritage aucune lien, tant qu'elle possède l'interface **Travailleur** et la fonction **function travailler()** il implementera l'interface **Travailleur**
La fonction faire travailler peut prendre n'importe quel objet du moment qu'il possède l'interface **TRAVAILLEUR** et la **fonction travailler()**.

![capture d'ecran](/img_readme/etudiant.PNG)

Le code en intégralité : 
````php
<?php
interface Travailleur{
    public function travailler();
}
class Employe implements Travailleur{
    public $nom;
    public $prenom;
    protected $age;
    public function travailler(){
        return "Je suis un employé et je travail";
    }
    public function __construct($prenom,$nom,$age){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->setAge($age);
    }

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

$employe1 = new Employe("Lior","Chamla",32);
$employe2 = new Employe("Pernin","Magali",32);
$employe1->presentation();
// $employe1->setAge(50);

$patron = new Patron("Joseph","Durand",55,"Mercedes");
$patron->presentation();
$patron->rouler();

$etudiant= new Etudiant();

class Etudiant implements Travailleur{
public function travailler(){
    return "je suis un étudiant";
    }
}

faireTravailler($employe1);
faireTravailler($patron);
faireTravailler($etudiant);

function faireTravailler($objet){
    var_dump("Travail en cours : {$objet->travailler()}");
}

````

**CLASS ABSTRACT**:
Une classe abstraite est un concept de la programmation orientée objet (POO).
Elle est aussi abstraite qu’on peut l’imaginer : c’est comme un « espace vide » inachevé pour un groupe de classes futures.
Imagine-le comme un plan que nous utiliserons plus tard pour créer des classes concrètes.

Une class abstract indique que les classes qui héritent vont devoir implementer tel ou tel fonction et auront des propriétés non abstract utilisable plus tard.
Les méthodes sont déclarées abstract parce que chaque travailleur auront une implémentation différente.

 **ABSTRACTION**  permet de passer n'importe quel objet du moment qu'il a la **fonction travailler**.
 C'est aussi le **POLYMORPHISME** dans notre cas on appel la même **fonction fairetravailler**  qui prend différente forme en fonction de l'objet qui est passé,dans notre cas **faireTravailler($employe1);** et **faireTravailler($etudiant);**


- Nous créeons une nouvelle class Humain  pour abstraire les fonctionnalités communes à tous les travailleurs.
La classe doit obligatoirement  être déclaré **abstract** si elle possède une méthode **abstract**.
Une fonction qui n'a pas d'implementation (de contrat) est une fonction abstract.
Comme pour l'interface la ou les méthode(s) (fonction) doit être implémenté dans toutes les classes filles.La fonction sera abstract dans le parent et dans la class fille sera réel...

**Une class abstract ne peut pas être instancié!**

````php
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
````
![capture d'ecran](/img_readme/abstract.PNG)

[Lior CHAMLA](https://youtube.com/playlist?list=PLpUhHhXoxrjcOTNSHdIo_hSwtXFku16mL&feature=shared).