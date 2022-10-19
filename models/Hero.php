<?php

class Hero extends Character {
    // Nom de l'arme équipée
    private string $weapon;
    // Dégats de l'argent équipée
    private int $weaponDamage;
    // Nom de l'armure équipée
    private string $shield;
    // Dégats que peut encaisser l'armure équipée
    private int $shieldValue;

    // Constructeur
    public function __construct(int $health, int $rage, string $weapon, string $shield, int $shieldValue) {
        parent::__construct($health, $rage);
        $this->weapon = $weapon;
        $this->weaponDamage = rand(300, 400);
        $this->shield = $shield;
        $this->shieldValue = $shieldValue;
        return 'Votre personnage a '.$this->health.', tient l\'arme '.$this->weapon.', qui inflige '.$this->weaponDamage.' points de dégats, et porte l\'armure '.$this->shield.', qui peut encaisser '.$this->shieldValue.' points de dégats.';
    }

    // Récupération des attributs
    public function __get($attr) {
        return $this->$attr;
    }

    public function __set($attr, $value) {
        $this->$attr = $value;
    }

    // Méthode calculant les dommages en fonction du dommage, de la valeur de l'armure et de l'attaque
    public function attacked($damage) {
        if ($this->shieldValue > $damage) {
            $this->shieldValue -= $damage;
        } else {
            $this->health -= $damage - $this->shieldValue;
            $this->shieldValue = 0;
        }
    }

    // Méthode calculant l'augmentation incrémentale de la rage
    public function increaseRage() {
        $this->rage += 30;
    }
}