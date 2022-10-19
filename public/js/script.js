/******************** ********************/
/**************** VARIABLES **************/
/******************** ********************/

// Récupération des messages générés par le combat
const containerContent = document.querySelector('.containerContent');
const messagesForFight = document.querySelectorAll('.containerContent p')

// Récupération du button
const triggerButton = document.querySelector('.triggerFight');

// Récupération du fighterOne ainsi que les liens vers toutes ses animations
let fighterOne = document.querySelector('.fighterOneImg');
const fighterOneWalk = '../public/assets/img/firstKnight/walk.gif';
const fighterOneIDLE = '../public/assets/img/firstKnight/idle.gif';
const fighterOneFight = '../public/assets/img/firstKnight/fight.gif';
const fighterOneDie = '../public/assets/img/firstKnight/die.gif';

// Récupération du fighterTwo ainsi que les liens vers toutes ses animations
let fighterTwo = document.querySelector('.fighterTwoImg');
const fighterTwoWalk = '../public/assets/img/secondtKnight/walk.gif';
const fighterTwoIDLE = '../public/assets/img/secondKnight/idle.gif';
const fighterTwoFight = '../public/assets/img/secondKnight/fight.gif';
const fighterTwoDie = '../public/assets/img/secondKnight/die.gif';

/******************** ********************/
/**************** FONCTIONS **************/
/******************** ********************/

// Changement d'image lors de l'ouverture de la page
const changeFightersImage = (fighterOne, fighterTwo, imageOne, imageTwo) => {
    fighterOne.src = imageOne;
    fighterTwo.src = imageTwo;
}

// Affichage des messages de combat
const showMessages = (messages) => {
    for (let i = 0; i < messages.length; i++) {
        setTimeout(() => {
            messages[i].classList.remove('hidden');
        }, 1000 * i);
    };
}

// Changement des images des combattants à l'issu du combat
const whichDie = (messagesForFight, fighterOne, fighterTwo) => {
    if (messagesForFight[messagesForFight.length - 1].textContent == 'Le chevalier est mort !') {
        fighterOne.src = fighterOneDie;
        fighterTwo.src = fighterTwoIDLE;
    } else if (messagesForFight[messagesForFight.length - 1].textContent == 'Le chevalier a gagné !') {
        fighterTwo.src = fighterTwoDie;
        fighterOne.src = fighterOneIDLE;
    }
}

/******************** ********************/
/**************** LISTENER ***************/
/******************** ********************/

setTimeout(() => {
    changeFightersImage(fighterOne, fighterTwo, fighterOneIDLE, fighterTwoIDLE);
}, 2000);

triggerButton.addEventListener('click', () => {
    changeFightersImage(fighterOne, fighterTwo, fighterOneFight, fighterTwoFight);
    showMessages(messagesForFight);
    setTimeout(() => {
        whichDie(messagesForFight, fighterOne, fighterTwo);
    }, 5000);
});

