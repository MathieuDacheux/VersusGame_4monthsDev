    <!-- Header Section -->
    <header>
        <nav class="flexCenterCenter">
            <h1>Shovel Knight VS Knight Master</h1>
        </nav>
    </header>
    
    <!-- Main Section -->
    <main>
        <section class="containerResults flexCenterCenter">
            <div class="contentResults flexCenterColumn">
                <div class="containerContent flexCenterCenterColumn hidden">
                    <?php while ($hero->health > 0 && $orc->health > 0) {
                        $result = Character::fightBetweenHeroAndOrc($hero, $orc);
                        echo $result;
                    } ?>
                </div>
            </div>
        </section>
        <section class="containerFight flexCenterBetween    ">
            <div class="containerFighter fighterOne flexCenterCenter">
                <img class="fighterOneImg" src="../public/assets/img/firstKnight/walk.gif" alt="">
            </div>
            <div class="containerFighter fighterTwo flexCenterCenter">
                <img class="fighterTwoImg" src="../public/assets/img/secondKnight/walk.gif" alt="">
            </div>
        </section>
        <section class="inputFunction flexCenterCenter">
            <div class="triggerFight">
                <p class="button">Combattre</p>
            </div>
        </section>
    </main>