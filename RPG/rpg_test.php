<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>  Formation Php OBJET (Adrar 2019): <TITRE TD>
</title>
<style>
    .pdv { 
        color : blue;
        font-weight : bolder;
    }

    #dgt {
        color : red;
        font-weight : bolder;
    }

    #crit {
        color : orange;
        font-weight : bolder;
    }

    .mcrit {
        color : orange;
        font-weight : bolder;
        font-size: 30px;
    }

    .comment {
        color : green;
        font-weight : bolder;
    }

    #nul {
        color : #555555;
    }

    #myPhp {
    color: black;
    padding: 50px;
    background-color: #EEEEEE;
    height : 100%;
    }

    #consigne {
        padding-left: 50px;
    }

</style>
</head>

<body>
<div id=consigne>
<h1>FIIIIIIGHT ! </h1>
 
<p>THEME:notion de classe, objet, nomenclature, déclarations simples... </p>
<p>TODO: Mettre en place un jeu qui consiste à battre un adversaire ! <br>
    Pour cela on peut frapper un adversaire avec une certaine force (0 à 100) <br>
    et du coup infliger des dégâts de même ampleur à celui-ci. <br>
    Au final, il faut pouvoir voir ce qu'il en est de ces deux entités.<p>
</div>
<hr>

<div id=myPhp>
		<!-- php code ici -->
<?php

class Character {
    // Mise en place des attributs pour le personnage
    public $_name;
    public $_strength;
    public $_healthPoint;

    //Fonction constructeur permettant d'initialiser les stats
    public function __construct($playerName) {
        $this->setName($playerName);
        $this->setHealthPoint();
    }

    public function setName($name) {
        $this->_name = $name;
    }

    public function setStrength($stat) {
        $this->_strength = $stat;
    }

    public function setHealthPoint() {
        $this->_healthPoint = rand(500,1000);
    }

    public function displayHealthPoint ($endznemy) {
        echo "<span class=comment> $this->_name a une vitalité de <span class=pdv> $this->_healthPoint </span> . </span><br>";
        echo "<span class=comment> $ennedzmy->_name a une vitalité de <span class=pdv> $this->_fighter2->_healthPoint </span> . </span><br><br>";
    }
}

class Battle {
  private $_fighter1;
  private $_fighter2;

  private $_criticalAttack;
  private $_critical;
  private $_megaCritical;
  private $_megaCriticalAttack;

  public function __construct(Character $f1, Character $f2) {
    $this->_fighter1=$f1;
    $this->_fighter2=$f2;
  }
  // Probabilité de porter un coup critique et calcul des dégâts critiques
  public function displayCriticalAttack() {
    $this->_critical = rand(0,4);
    $this->_criticalAttack = $this->_strength*2;
    $this->_megaCritical = rand (0,10);
    $this->_megaCriticalAttack = $this->_strength*10;
  }

  public function attack() {
      $this->displayCriticalAttack();
      if (($this->_critical == 4) && ($this->_strength>$this->_fighter2->_strength)) {
          $this->_fighter2->_healthPoint -= $this->_criticalAttack;
      }
      if (($this->_megaCritical == 10) && ($this->_strength>$this->_fighter2->_strength)) {
          $this->_fighter2->_healthPoint -= $this->_megaCriticalAttack;
      }
      elseif (($this->_strength>$this->_fighter2->_strength) && ($this->_megaCritical !== 10) && ($this->_critical !== 4)){
          $this->_fighter2->_healthPoint -= $this->_strength;
      }
  }

// Affichage du combat
  public function displayFight() {
      if (($this->_fighter1->_strength>$this->_fighter2->_strength) && ($this->_critical!==4) && ($this->_megaCritical!==10)) {
          echo "$this->_name a infligé <span id=dgt> $this->_strength </span> points de dégâts à $this->_fighter2->_name<br/>";
      }
      if (($this->_critical == 4) && ($this->_strength>$this->_fighter2->_strength)) {
          echo "COUP CRITIQUE ! $this->_name inflige <span id=crit> $this->_criticalAttack </span> point de dégâts à $this->_fighter2->_name ! <br> ";
      }
      if (($this->_megaCritical == 10) && ($this->_strength>$this->_fighter2->_strength)) {
          echo "<br><span class=mcrit>LE CTHULHU & SES GUILIS! </span> inflige <span class=mcrit> $this->_megaCriticalAttack </span> point de dégâts à $this->_fighter2->_name ! <br> ";
      }
      if (($this->_fighter2->_healthPoint>0) && ($this->_strength>$this->_fighter2->_strength)){
          echo "$this->_fighter2->_name lui reste <span class=pdv> $this->_fighter2->_healthPoint </span> points de vies.<br/><br>";
      }
      if ($this->_fighter2->_healthPoint<0) {
          echo "<br><span class=comment>$this->_fighter2->_name a été vaincu</span>";
      }
      if ($this->_fighter2->_healthPoint< -50) {
          echo "<br><br><span class=comment>$this->_fighter2->_name a <span class=pdv> $this->_fighter2->_healthPoint </span> point de vie. <br>
          Ce combattant a été désintégré, exterminé, balayé, disparu de la société.<br/>";  
      }
      elseif ($this->_strength<$this->_fighter2->_strength) {
          $fail = rand(0,3);
          if ($fail == 0) {
              echo "<span id=nul> $this->_name n'a pas assez de patate... </span><br/><br/>";
          }
          elseif ($fail == 1) {
              echo "<span id=nul> $this->_name a trébuché </span><br/><br/>";
          }
          elseif ($fail == 2) {
              echo "<span id=nul> $this->_fighter2->_name a esquivé l'attaque de $this->_name </span><br/><br/>";
          }
          elseif ($fail == 3) {
              echo "<span id=nul> $this->_fighter2->_name n'a rien senti </span><br/><br/>";
          }
      }
  }

  public function fight($this->_fighter2) {
      $this->displayHealthPoint ($this->_fighter2);
      while (($this->_healthPoint>0) && ($this->_fighter2->_healthPoint>0)) {
          $turn = rand(0,1);
          if ($turn == 1) {
              $this->setStrength(rand(0,100));
              $this->attack($this->_fighter2);
              $this->displayFight($this->_fighter2);
          }
          else {
              $this->_fighter2->setStrength(rand(0,100));
              $this->_fighter2->attack($this);
              $this->_fighter2->displayFight($this);
          }
      }
    }
}

    $player1 = new Character('Le Code');
    $player2 = new Character('Flore');

    $player1->fight($player2);


?>
		<!-- fin php code-->
</div>

<script>
 console.log ("GROS DELIRE : Adrar POO PHP 2019");
    </script>
</body>
</html>