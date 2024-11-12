<?php

// variables
$isOld = true;
$isFront = false;
$age = 45;
$name = 'Francisco'; 

// Ternarias
$isOldFalse = $isOld ? "Sos un viejita" : "No sos un viejita";

// Constantes globales
define('LOGO_FRAN', 'https://png.pngtree.com/png-clipart/20190611/original/pngtree-wolf-logo-png-image_2306634.jpg');

// match solo en version 8 o posterior
// $outPut = match ($age) {
//     0, 1, 2, 3 => "Eres un bebé, $name",
//     4, 5, 6, 7, 8 => "Eres un niño, $name",
//     14, 25, 36, 47, 48 => "Eres un adulto, $name",
//     default => "Edad no categorizada, $name" 
// };
// Alternativa al match usando switch
switch ($age) {
    
    case 0: case 1: case 2: case 3:
        $outPut = "Eres un bebé, $name";
        break;
    case 4: case 5: case 6: case 7: case 8:
        $outPut = "Eres un niño, $name";
        break;
    case 14: case 25: case 36: case 45: case 48:
        $outPut = "Eres un adulto, $name";
        break;
    default:
        $outPut = "Edad no categorizada, $name";
        break;
}

$bestLanguages = ['PHP', 'JAVA', 'GO', 'JavaScript'];
$bestLanguages[] = 'Python';

?>

<h1><?= $isOldFalse ?></h1>
<h1><?= $outPut ?></h1>
<ul>
    <?php foreach ($bestLanguages as $lenguaje) : ?>
        <li><?= $lenguaje ?></li>
    <?php endforeach; ?>
</ul>
<h3>El mejor lenguaje es: <?= $bestLanguages[3] ?></h3>

<style>
.h222 {
    color: red;
}
.body {
    background-color: black;
    text-align: center;
}
</style>

<img src="<?= LOGO_FRAN ?>" alt="logo x" width="200px">

<!-- Estructura del if anidado -->
<div class="body">
    <?php if ($isOld) : ?>
        <h2>Estas re viejo locooooo</h2>
        <?php if ($isFront) : ?>
            <h2>Estas re viejo front</h2>
        <?php else : ?>
            <h2 class='h222'>No sos desarrollador frooooont</h2>
        <?php endif; ?>
    <?php endif; ?>
</div>

<!-- Estructura de lógica y renderizado PHP -->