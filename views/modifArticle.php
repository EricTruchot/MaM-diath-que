<!-- PAGE CONTENU principal -->
<?php
if ((!empty($_SESSION['type']) && $_SESSION['type'] == 'admin')) {
?>
    <article class="modifArticle">
        <p class="text1">MODIFICATION</p>
        <?php $row = $stmt->fetch();
        $i = $row->idArticle;
        ?>
        <div class="block">

            <form action="./index.php?page=modifArticle" method="POST" enctype="multipart/form-data">
                <input type="text" hidden name="idArticle" value="<?= $i ?>">
                <div class="bot">
                    <p class="titre">Titre</p>
                    <input type="text" name="modifTitre" value="<?= $row->titre; ?>">
                    <p class="desc">Description:</p>
                    <textarea type="text" name="modifDescription" rows="12"><?= $row->description; ?></textarea>
                    <p class="desc">Genre:</p>
                    <input type="text" name="modifGenre" value="<?= $row->genre; ?>">
                    <p class="desc">Auteur:</p>
                    <input type="text" name="modifAuteur" value="<?= $row->auteur; ?>">
                    <p class="desc">Editeur:</p>
                    <input type="text" name="modifEditeur" value="<?= $row->editeur; ?>">

                    <p class="desc">Etat actuel: <?= $row->etat; ?></p>
                    <select name="menuEtat" id="menuEtat">
                        <option value="Disponible">Disponible</option>
                        <option value="Indisponible">Indisponible</option>
                    </select>
                    <p class="desc">Categorie actuelle: <?= $row->categorie; ?></p>
                    <select name="idCategorie">
                        <!-- select qui est rempli en fonction de la db pour avoir la liste des categorie -->
                        <option value="" selected disabled hidden>Categorie</option>
                        <?php foreach ($stmt2 as $categorie) : ?>
                            <option value="<?= $categorie['idCategorie']; ?>"><?= $categorie['categorie']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Image</label>
                    <input type="text" hidden name="file" value="<?= $row->file; ?>">
                    <input type="text" hidden name="oldCategorie" value="<?= $row->idCategorie; ?>">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input class="btn" type="submit" value="Modifier" name="submit" onclick="return window.confirm('Êtes vous sûr de vouloir modifier cet article ?')">
                </div>
                <div class="img">
                    <img src="<?= $row->file; ?>" alt="">
                </div>
            </form>
        </div>



    </article>

<?php } else {
?>
    <p>Vous n'etes pas connecté</p>
<?php
}
