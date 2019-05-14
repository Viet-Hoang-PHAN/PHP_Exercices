<?php
namespace App\Weapons;
use App\Weapons\WeaponInterface;

class Dagger implements WeaponInterface {
    
    public function getDamageWeapon() {
        return rand(10,30);
    }

}