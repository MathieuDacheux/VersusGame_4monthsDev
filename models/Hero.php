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
    public function getHealth(): int {
        return $this->health;
    }

    public function getRage(): int {
        return $this->rage;
    }

    public function getWeapon(): string {
        return $this->weapon;
    }

    public function getWeaponDamage(): int {
        return $this->weaponDamage;
    }

    public function getShield(): string {
        return $this->shield;
    }

    public function getShieldValue(): int {
        return $this->shieldValue;
    }

    // Settings des attributs
    public function setHealth(int $health): void {
        $this->health = $health;
    }

    public function setRage(int $rage): void {
        $this->rage = $rage;
    }

    public function setWeapon(string $weapon): void {
        $this->weapon = $weapon;
    }

    public function setWeaponDamage(int $weaponDamage): void {
        $this->weaponDamage = $weaponDamage;
    }

    public function setShield(string $shield): void {
        $this->shield = $shield;
    }

    public function setShieldValue(int $shieldValue): void {
        $this->shieldValue = $shieldValue;
    }

    // Méthode calculant les dommages en fonction du dommage, de la valeur de l'armure et de l'attaque
    public function attacked($damage) {
        if ($this->getShieldValue() > $damage) {
            $this->setShieldValue($this->getShieldValue() - $damage);
        } else {
            $this->setHealth($this->getHealth() - ($damage - $this->getShieldValue()));
            $this->setShieldValue(0);
        }
    }

    // Méthode calculant l'augmentation incrémentale de la rage
    public function increaseRage() {
        $this->setRage($this->getRage() + 30);
    }
}