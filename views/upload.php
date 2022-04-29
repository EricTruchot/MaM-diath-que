<!-- UPLOAD CONTENU -->
<?php
if ((!empty($_SESSION['type']) && $_SESSION['type'] == 'admin')) {
?>
    <!-- HTML -->
    <section class="connexion">
        <p>AJOUTER UN ARTICLE:</p>
        <p class="restrict"><?php
                            if (isset($_SESSION['error'])) {
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                            ?></p>
        <p class="yes"><?php
                        if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                        ?></p>

        <?php
        if (!empty($_SESSION['erreur'])) { ?>
            <p class="erreur"><?php echo $_SESSION['erreur']; ?></p>
        <?php
            unset($_SESSION['erreur']);
        }
        ?>
        <form action="./index.php?page=uploadP2" method="POST" enctype="multipart/form-data">
            <label><b>Titre</b></label>
            <input type="text" name="titre" required>
            <label><b>Description</b></label>
            <textarea type="text" name="description" rows="6"></textarea>
            <label><b>Auteur</b></label>
            <input type="text" name="auteur" required>
            <label><b>Genre</b></label>
            <input type="text" name="genre" required>
            <label><b>Editeur</b></label>
            <input type="text" name="editeur" required>
            <label><b>Categorie</b></label>
            <select name="idCategorie"> <!-- select qui est rempli en fonction de la db pour avoir la liste des categorie -->
                <?php foreach ($uploadP1 as $categorie) : ?>
                    <option value="<?= $categorie['idCategorie']; ?>"><?= $categorie['categorie']; ?></option>
                <?php endforeach; ?>
            </select>
            <label><b>Image</b></label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input class="btn" type="submit" value="Enovyer" name="submit">


        </form>


    </section>

<?php } else {
?>
    <p>Vous n'etes pas connecté</p>
<?php
}

?>