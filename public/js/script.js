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
const fighterOneIDLE = '../public/assets/img/firstKnight/idle.gif';
const fighterOneFight = '../public/assets/img/firstKnight/fight.gif';
const fighterOneDie = '../public/assets/img/firstKnight/die.gif';
const fighterOneWin = '../public/assets/img/firstKnight/win.gif';

// Récupération du fighterTwo ainsi que les liens vers toutes ses animations
let fighterTwo = document.querySelector('.fighterTwoImg');
const fighterTwoIDLE = '../public/assets/img/secondKnight/idle.gif';
const fighterTwoFight = '../public/assets/img/secondKnight/fight.gif';
const fighterTwoDie = '../public/assets/img/secondKnight/die.gif';
const fighterTwoWin = '../public/assets/img/secondKnight/win.gif';

/******************** ********************/
/**************** FONCTIONS **************/
/******************** ********************/

// Changement d'image lors de l'ouverture de la page
const changeFightersImage = (fighterOne, fighterTwo, imageOne, imageTwo) => {
    fighterOne.src = imageOne;
    fighterTwo.src = imageTwo;
}

// Changement des images des combattants à l'issu du combat
const whichDie = (messagesForFight, fighterOne, fighterTwo, index) => {
    if (messagesForFight[index].textContent == 'Le chevalier est mort !') {
        fighterOne.src = fighterOneDie;
        fighterTwo.src = fighterTwoWin;
    } else if (messagesForFight[index].textContent == 'Le chevalier a gagne !') {
        fighterTwo.src = fighterTwoDie;
        fighterOne.src = fighterOneWin;
    }
}

// Affichage des messages de combat
const showMessages = (messages) => {
    for (let i = 0; i < messages.length; i++) {
        setTimeout(() => {
            if (i >= 1) {
                messages[i - 1].classList.add('hidden');
            }
            messages[i].classList.remove('hidden');
            whichDie(messages, fighterOne, fighterTwo, i);
        }, 1000 * i);
    };
}

// Affichage du bouclier
const showShield = (containerContent) => {
    containerContent.classList.remove('hidden');
}

const deleteLastMessage = (messagesForFight) => {
    messagesForFight[messagesForFight.length - 1].classList.add('hidden');
}

const deleteShield = (containerContent) => {
    containerContent.classList.add('hidden');
}

/******************** ********************/
/**************** LISTENER ***************/
/******************** ********************/

setTimeout(() => {
    changeFightersImage(fighterOne, fighterTwo, fighterOneIDLE, fighterTwoIDLE);
}, 5500);

triggerButton.addEventListener('click', () => {
    showShield(containerContent);
    changeFightersImage(fighterOne, fighterTwo, fighterOneFight, fighterTwoFight);
    showMessages(messagesForFight);
    setTimeout(() => {
        deleteLastMessage(messagesForFight);
        deleteShield(containerContent);
    }, 8000);
});