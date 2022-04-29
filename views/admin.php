<!-- PAGE ADMIN -->
<?php
if ((!empty($_SESSION['type']) && $_SESSION['type'] == 'admin')) { //verification du type d'user pour voir la page
?>
    <article class="admin">
        <section class="up">
            <p class="text1">ADMINISTRATION</p>
            <p class="yes"><?php
                            if (isset($_SESSION['message'])) { //message "systeme"
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                            ?></p>
            <div class="bandeau">

                <a class="text2" href="http://<?= $link ?>/index.php?page=adminUser">Utilisateurs</a>
                <a class="text2" href="http://<?= $link ?>/index.php?page=uploadP1">Ajouter un article</a>
                <a class="text2" href="http://<?= $link ?>/index.php?page=adminPret">Liste des prets</a>

            </div>

        </section>
        <section class="down">
            <?php while ($row = $stmt->fetch()) { //bouche d'affichage du contenu
            ?>

                <div class="block">

                    <div class="img">
                        <img src="<?= $row->file; ?>" alt="">
                    </div>


                    <div class="mid">
                        <div class="type">
                            <p class="titre">Titre:<br><?= $row->titre; ?></p>
                            <p class="desc">Auteur:<br><?= $row->auteur; ?></p>
                            <p class="desc">Genre:<br><?= $row->genre; ?></p>
                            <p class="desc">Editeur:<br><?= $row->editeur; ?></p>
                            <p class="desc">Categorie:<br><?= $row->categorie; ?></p>
                            <?php if ($row->etat == 'Disponible') { ?>
                                <p class="dispo"><br><?= $row->etat; ?></p>
                            <?php } elseif ($row->etat == 'Indisponible') { ?>
                                <p class="indispo"><br><?= $row->etat; ?></p>
                            <?php    } ?>
                        </div>
                        <p class="desc">Description: <?= $row->description; ?></p>
                    </div>
                    <div class="menu">
                        <form action="index.php?page=adminArticle" method="post">
                            <input type="text" hidden name="idArticle" value="<?= $row->idArticle; ?>">
                            <button type="submit" name="modif">Modifier</button>
                        </form>
                        <form action="index.php?page=deleteContenu" method="post">
                            <input type="text" hidden name="idArticle" value="<?= $row->idArticle; ?>">
                            <input type="text" hidden name="file" value="<?= $row->file; ?>">
                            <button type="submit" name="delete" onclick="return window.confirm('Voulez vous vraiment supprimer cet article?')">Supprimer</button>
                        </form>
                        <form action="index.php?page=article" method="post">
                            <input type="text" hidden name="idArticle" value="<?= $row->idArticle; ?>">
                            <button type="submit" name="article">Details</button>
                        </form>
                    </div>


                </div>


            <?php } ?>
        </section>
    </article>
<?php } else {
?>
    <p class="restrict">Vous devez etre admin pour voir cette page.</p>
<?php
}

?>