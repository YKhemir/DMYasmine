<?php 
interface SePresenter {
    public function AffichePersonne();
}
class Personne {
    private $age ;
    private $nom;

    public function __construct($a ,$p){
        $this -> _prenom = $p;
        $this -> _age = $a;
    }

    public function AffichePersonne(){
        echo " de ".$this->_age." ans et je m'appelle ".$this-> _prenom ;
        echo "<br/>";
    }

}

class Homme extends Personne {
    public function __construct($a ,$p){
        parent::__construct($a,$p);

    }

    public function AffichePersonne(){
        echo "Je suis un Homme "; 
        parent::AffichePersonne();
        
    }
    
}

class Femme extends Personne {
    public function __construct($a,$p){
        parent::__construct($a,$p);
    }

    public function AffichePersonne(){
        echo "Je suis une Femme ";
        parent::AffichePersonne();
    }
}

$Personne = new Homme(40,'Tom');
echo $Personne->AffichePersonne();

$Personne1 = new Femme(40,"Marie");
echo $Personne1->AffichePersonne();


?>