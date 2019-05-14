<?php
namespace App\Weapons;
use App\Weapons\WeaponInterface;

class Axe implements WeaponInterface {

    public function getDamageWeapon() {
        return rand(15,25);
    }

}