<?php

    // Appel des configurations
    require_once(__DIR__.'/../models/Character.php');
    require_once(__DIR__.'/../models/Orc.php');
    require_once(__DIR__.'/../models/Hero.php');
    require_once(__DIR__.'/../helpers/functions.php');

    // Variables
    $hero = new Hero(2500, 0, 'Marteau Bouftou', 'Panoplie du Bouftou', 600);
    $orc = new Orc(2500, 0);

    // Appel des vues
    include(__DIR__.'/../views/templates/header.php');
    include(__DIR__.'/../views/home.php');
    include(__DIR__.'/../views/templates/footer.php');