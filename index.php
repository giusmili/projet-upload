<?php
    include_once __DIR__ ."/controller/config.inc.php";
   

?>
    <header>
        <h1>
        <span class="material-symbols-outlined">
            directions_run
        </span>
            Ajoutez votre profil
        </h1>
    </header>

    <main>
        <section>
            <ul>
                <?php
                    # ici le traitement
                    include_once __DIR__ . "/controller/controllerBase.class.php";
                        
                ?>
            </ul>
        </section>

       
    <fieldset>
        <legend>
            Vos informations
        </legend>
 
        <!-- Formulaire HTML -->
        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required placeholder="Votre nom">

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required placeholder="Votre prénom">

            <label for="age">Âge :</label>
            <input type="number" id="age" name="age" required placeholder="Votre age">

            <label for="ville">Ville :</label>
            <input type="text" id="ville" name="ville" required placeholder="Votre ville">

            <label for="photo">
                <span class="material-symbols-outlined">
                download</span>
                Téléchargez votre photo :
            <input type="file" id="photo" name="photo" accept="image/*" required placeholder="">
            </label>
            <input type="submit" class="button-outline" value="Soumettre">
        </form>
    </section>
</main>
<footer>
    <p>
        &copy; - MIT - <?=  $_nowdate->format("Y") ?>
    </p>
</footer>
</body>
</html>
