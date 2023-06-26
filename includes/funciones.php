<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

//revisa que el ususrio este aurtenticado
function isAuth() : void {
    if(!isset($_SESSION['loguin'])){
        header('Location: /');
    }
}

function esUltimo($actual, $proximo) : bool {
    if($actual !== $proximo) {
        return true;
    }
    return false;
}

function isAdmin() {
   if(!isset($_SESSION['admin'])){
    header('Location: /');
   }
}