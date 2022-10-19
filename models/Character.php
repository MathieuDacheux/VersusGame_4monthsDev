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
    public function getHealth(): int {
        return $this->health;
    }

    public function getRage(): int {
        return $this->rage;
    }

    // Mise à jour des attributs
    public function setHealth (int $health): void {
        $this->health = $health;
    }

    public function setRage (int $rage): void {
        $this->rage = $rage;
    }

    public static function fightBetweenHeroAndOrc ($hero, $orc) {
        if ($hero->getRage() >= 100) {
            // Modification des points de vie et augmentation de la rage
            $orc->attacked($hero->getWeaponDamage() * 2);
            $hero->setRage(0);
        } else {
            // Modification des points de vie et augmentation de la rage
            $hero->attacked($orc->getDamage());
            $orc->attacked($hero->getWeaponDamage());
            $hero->increaseRage();
        }

        // Affichage des points de vie et de la rage des personnages à chaque tour
        if ($hero->getHealth() <= 0) {
            $message = '<p class="hidden messageFight lose">Le chevalier est mort !</p>';
        } else if ($orc->getHealth() <= 0) {
            $message = '<p class="hidden messageFight win">Le chevalier a gagne !</p>';
        } else {
            $message = '<p class="hidden messageFight">Le chevalier a '.$hero->getHealth().' points de vie et '.$hero->getRage().' points de rage, l\'ennemi a '.$orc->getHealth().' points de vie.</p>';
        }
        return $message;

    }
}