<?php

class Orc extends Character {
    // Dommage infligée par l'orc
    private int $damage;

    // Constructeur
    public function __construct(int $health,int $rage) {
        parent::__construct($health, $rage);
        $this->damage = rand(600, 800);
        return 'L\'orc a '.$this->health.', inflige '.$this->damage.' points de dégats et a '.$this->rage.' points de rage.';
    }

    // Récupération des attributs
    public function __get($attr) {
        return $this->$attr;
    }

    // Mise à jour des attributs
    public function __set($attr, $value) {
        $this->$attr = $value;
    }

    // Méthode calculant les points de santé en fonction des dommages du héro
    public function attacked($damageHero) {
        $this->health -= $damageHero;
    }

}