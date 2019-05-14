<?php
namespace App;
use App\Weapons\WeaponInterface;
use App\FighterInterface;
use App\Weapons\Dagger;


class Fighter implements FighterInterface {
    private $healthPoint = 200;
    private $name;
    private $weapon;

    public function __construct ($name, $weapon) {
        $this->name = $name;
        $this->weapon = $weapon;
    }

    public function getName () {
        return $this->name;
    }

    public function getWeapon () {
        return $this->weapon;
    }

    public function getHealthPoint () {
        return $this->healthPoint;
    }

}