<?php

class Character {
    // Le nombre de point de vie
    protected int $health;

    // Le nombre de point de rage
    protected int $rage;

    // Constructeur
    public function __construct(int $health, int $rage) {
        $this->health = $health;
        $this->rage = $rage;
    }

    // Récupération des attributs
    public function __get($attr) {
        return $this->$attr;
    }

    // Mise à jour des attributs
    public function __set($attr, $value) {
        $this->$attr = $value;
    }

    public static function fightBetweenHeroAndOrc ($hero, $orc) {
        if ($hero->rage >= 100) {
            // Modification des points de vie et augmentation de la rage
            $orc->attacked($hero->weaponDamage * 2);
            $hero->increaseRage($hero->rage);
        } else {
            // Modification des points de vie et augmentation de la rage
            $hero->attacked($orc->damage);
            $orc->attacked($hero->weaponDamage);
            $hero->increaseRage($hero->rage);
        }

        // Affichage des points de vie et de la rage des personnages à chaque tour
        if ($hero->health <= 0) {
            $message = '<p class="hidden messageFight lose">Le chevalier est mort !</p>';
            return $message;
        } else if ($orc->health <= 0) {
            $message = '<p class="hidden messageFight win">Le chevalier a gagne !</p>';
            return $message;
        } else {
            $message = '<p class="hidden messageFight">Le chevalier a '.$hero->health.' points de vie et '.$hero->rage.' points de rage, l\'ennemi a '.$orc->health.' points de vie.</p>';
            return $message;
        }
    }
}