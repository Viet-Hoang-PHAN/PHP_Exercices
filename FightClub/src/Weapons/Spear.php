<?php
namespace App\Weapons;
use App\Weapons\WeaponInterface;

class Spear implements WeaponInterface {

    public function getDamageWeapon() {
        return rand(20,25);
    }


}