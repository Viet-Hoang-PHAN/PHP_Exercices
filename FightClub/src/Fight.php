<?php

namespace App;
use App\Weapons\Dagger;
use App\Weapons\Axe;
use App\Weapons\Spear;


class Fight {
    private $damage;
    private $f1;
    private $f2;
    private $currentHealthPointF1;
    private $currentHealthPointF2;
    private $turn = 0;

    public function __construct (Fighter $fighter1, Fighter $fighter2) {
        $this->f1 = $fighter1;
        $this->f2 = $fighter2;
        $this->currentHealthPointF1 = $this->f1->getHealthPoint();
        $this->currentHealthPointF2 = $this->f2->getHealthPoint();
    }

    public function attack() {
        if ($this->turn == 0) {
            $this->damage = $this->f1->getWeapon();
            $this->damage = $this->damage->getDamageWeapon();
            $this->currentHealthPointF2 -= $this->damage;
        }
        if ($this->turn == 1) {
            $this->damage = $this->f2->getWeapon();
            $this->damage = $this->damage->getDamageWeapon();
            $this->currentHealthPointF1 -= $this->damage;
        }
    }

    public function displayFight() {
        if ($this->turn == 0) {
            echo $this->f1->getName(). " a infligé $this->damage points de dégâts à ".$this->f2->getName() ."<br/>";
        }
        if ($this->turn == 1) {
            echo $this->f2->getName(). " a infligé $this->damage points de dégâts à " .$this->f1->getName() ."<br/>";
        }
    }

    public function displayHealthPoint() {
        if ($this->turn == 1) {
            echo $this->f1->getName(). " lui reste  $this->currentHealthPointF1 point de vie <br/>";
        }
        if ($this->turn == 0) {
            echo $this->f2->getName(). " lui reste  $this->currentHealthPointF2 point de vie  <br/>";
        }
        echo "<br/>";
    }

    public function displayWinner () {
        if ($this->currentHealthPointF1 <= 0) {
            echo $this->f1->getName(). " a été vaincu <br/> Le vainqueur est ". $this->f2->getName(). " !!!";
        }
        if ($this->currentHealthPointF2 <= 0) {
            echo $this->f2->getName(). " a été vaincu <br/> Le vainqueur est ". $this->f1->getName(). " !!!";
        }
    }

    public function fight() {
        while ($this->currentHealthPointF1 >= 0 && $this->currentHealthPointF2 >= 0) {
            if ($this->turn == 0) {
                $this->attack();
                $this->displayFight();
                $this->displayHealthPoint();
                $this->turn = 1;
            }
            else {
                $this->attack();
                $this->displayFight();
                $this->displayHealthPoint();
                $this->turn = 0;
            }
        }
        $this->displayWinner();
    }
}