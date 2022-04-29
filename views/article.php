<!-- PAGE ARTICLE -->

<article class="article">
    <?php $row = $stmt->fetch();
    $visi = $affichage->fetch();
    $i = $row->idArticle;
    ?>
    <?php if ($visi->visibilite == 1) { ?>
        <p class="titre"><?= $row->titre; ?></p>
        <hr>
    <?php } ?>
    <div class="block">
        <div class="top">
            <div class="img">
                <img src="<?= $row->file; ?>" alt="">
            </div>
            <div>
                <p class="type">Genre:</p>
                <p class="data"><?= $row->genre; ?></p>
                <p class="type">Auteur:</p>
                <p class="data"><?= $row->auteur; ?></p>
                <p class="type">Editeur:</p>
                <p class="data"><?= $row->editeur; ?></p>
                <p class="type">Etat:</p>
                <p class="data"><?= $row->etat; ?></p>
                <p class="type">Categorie:</p>
                <p class="data"><?= $row->categorie; ?></p>
            </div>
        </div>
        <p class="type">Description:</p>
        <p class="data"><?= $row->description; ?></p>
        <?php
        if ((!empty($_SESSION['type']) && ($_SESSION['type'] == 'user' || $_SESSION['type'] == 'admin'))) {  ?>
            <form action="./index.php?page=reservation" method="POST" enctype="multipart/form-data">
                <input type="text" hidden name="idArticle" value="<?= $i ?>">
                <button type="submit" name="reserver">Réserver</button>
            </form>
        <?php } else { ?>
            <a href="./index.php?page=connexion">Connectez vous pour emprunter cet article.</a>

        <?php } ?>

    </div>


    <?php
    if ((!empty($_SESSION['type']) && $_SESSION['type'] == 'admin')) {
    ?>
        <div class="tableAdmin">
            <!-- Tableau -->

            <table>

                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Utilisateur</th>
                    <th scope="col">Date du pret</th>
                    <th scope="col">A rendre avant le</th>
                    <th scope="col">Rendu le</th>
                </tr>

                <!-- Boucle remplissage tableau -->
                <?php while ($row = $stmt2->fetch()) {
                ?>
                    <tr>
                        <td><?= $row->idPret; ?></td>
                        <td><?= $row->email; ?></td>
                        <td><?= $row->datePret; ?></td>
                        <td><?= $row->dateRetour; ?></td>
                        <td><?= $row->rendu; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    <?php } ?>
<!-- VISIBILITE TITRE BETA -->
    <?php
    if ((!empty($_SESSION['type']) && $_SESSION['type'] == 'admin')) {
    ?>
    <div class="admin">
    <p>option administrateur: visibilité du titre</p>
        <form action="./index.php?page=affichage" method="POST" enctype="multipart/form-data">
            <select name="visi">
                <option value="1" >visible</option>
                <option value="0" >non visible</option>
            </select>
            <button type="submit" name="recherche">modifier</button>
        </form>
        </div>
    <?php } ?>
</article>