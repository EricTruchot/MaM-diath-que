<!-- PAGE CONTENU principal -->
<article class="acceuil">
    <h1 class="">MEDIATHEQUE</h1>
    <?php
    if ((!empty($_SESSION['type']) && ($_SESSION['type'] == 'user' || $_SESSION['type'] == 'admin'))) { //verification du type d'utilisateur
        while ($row = $stmt2->fetch()) {
            if ((isset($row->DateDiff) && $row->DateDiff == 0) && empty($row->rendu)) { //verifie si l'utilisateur a des articles a rendre (retard)
    ?>
                
                    <p class="alert">ATTENTION: Vous avez des articles a rendre</p>
                
    <?php }
        }
    } ?>
    <div class="filtre">
        <form action="./index.php?page=acceuil" method="POST" enctype="multipart/form-data">
            <!-- Menu deroulant dynamique categorie -->
            <select name="categorie">
                <option value="" selected disabled hidden>Categorie</option>
                <?php foreach ($categorie as $categorie) : ?>
                    <option value="<?= $categorie['idCategorie']; ?>"><?= $categorie['categorie'] ?></option>
                <?php endforeach; ?>
            </select>
            <!-- Menu deroulant dynamique genre -->
            <select name="genre">
                <option value="" selected disabled hidden>Genre</option>
                <?php foreach ($genre as $genre) : ?>
                    <option value="'<?= $genre['genre']; ?>'"><?= $genre['genre'] ?></option>
                <?php endforeach; ?>
            </select>
            <!-- Menu deroulant dynamique auteur -->
            <select name="auteur">
                <option value="" selected disabled hidden>Auteur</option>
                <?php foreach ($auteur as $auteur) : ?>
                    <option value="'<?= $auteur['auteur']; ?>'"><?= $auteur['auteur'] ?></option>
                <?php endforeach; ?>
            </select>
            <!-- Menu deroulant dynamique editeur -->
            <select name="editeur">
                <option value="" selected disabled hidden>Editeur</option>
                <?php foreach ($editeur as $editeur) : ?>
                    <!-- $editeur = str_replace("'", "''", "$editeur1"); -->
                    <option value="'<?= $editeur['editeur']; ?>'"><?= $editeur['editeur'] ?></option>
                <?php endforeach; ?>
            </select>
            <button class="" type="submit" name="recherche">Rechercher</button>
        </form>
    </div>

    <div class="main">
        <?php
        $row = $stmt->fetch();
        if (!empty($row)) {
            do {

                $i = $row->idArticle;
        ?>
                <div class="block">
                    <div class="top-img">
                        <img src="<?= $row->file; ?>" alt="">
                    </div>

                    <div class="bot">
                        <div class="p1">
                            <p class="titre"><?= $row->titre; ?></p>
                        </div>
                        <hr>
                        <div class="p2">
                        <p class="desc">Genre: <?= $row->genre; ?></p>
                        <p class="desc">Auteur: <?= $row->auteur; ?></p>
                        </div>
                        <div class="p3">
                        <p class="desc">Editeur: <?= $row->editeur; ?></p>
                        <p class="desc">Categorie: <?= $row->categorie; ?></p>
                        </div>
                        <form action="./index.php?page=article" method="POST" enctype="multipart/form-data">
                            <input type="text" hidden name="idArticle" value="<?= $i ?>">
                            <button class="" type="submit" name="Article">Détails</button>
                        </form>
                    </div>
                </div>


            <?php } while ($row = $stmt->fetch()); }
            else {  
         ?>
            <p>Aucun resultat disponible ¯\_(ツ)_/¯</p>

        <?php } ?>
    </div>
</article>