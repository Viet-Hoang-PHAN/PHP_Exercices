<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<?php

include "vendor/autoload.php";

use App\Fighter;
use App\Fight;
use App\Weapons\Dagger;
use App\Weapons\Axe;
use App\Weapons\Spear;
use App\Weapons\WeaponInterface;


$axe = new Axe;
$spear = new Spear;
$dagger = new Dagger;


$player1 = new Fighter("Max", $dagger);
$player2 = new Fighter("Bob", $spear);


$firstFight = new Fight($player1, $player2);
dump($firstFight);
$firstFight->fight();
?>


</body>
</html>