<!-- PAGE MES CONTENU -->
<?php
if ((!empty($_SESSION['type']) && $_SESSION['type'] == 'admin')) {
?>
    <article class="ficheUser">
        <p class="text1">Prets adherents</p>
        <p class="yes"><?php
                        if (isset($_SESSION['message'])) {
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                        ?></p>
        <!-- Tableau -->

        <table>
            
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Utilisateur</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Date du pret</th>
                    <th scope="col">A rendre avant le</th>
                    <th scope="col">Rendu le</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
           
            <!-- Boucle remplissage tableau -->
            <?php while ($row = $stmt->fetch()) {
            ?>
                <tr>
                    <td><?= $row->idPret; ?></td>
                    <td><?= $row->email; ?></td>
                    <td><?= $row->titre; ?></td>
                    <td><?= $row->categorie; ?></td>
                    <td><?= $row->datePret; ?></td>
                    <td><?= $row->dateRetour; ?></td>
                    <td><?= $row->rendu; ?></td>
                    <td>
                        <?php if ((isset($row->DateDiff) && $row->DateDiff == 0) && empty($row->rendu)) { ?>
                            <td class="retard">Retard</td>
                   <?php     } ?>
                    </td>
                    <?php
                    if (!isset($row->rendu)) { ?>
                        <form action="index.php?page=rendu" method="post">
                            <input type="text" hidden name="idPret" value="<?= $row->idPret; ?>">
                            <input type="text" hidden name="idArticle" value="<?= $row->idArticle; ?>">
                            <td><button class="btn-delete" type="submit" name="rendu">Rendu</button></td>
                        </form>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>

    </article>
<?php } else {
?>
    <p class="restrict">Vous devez etre connecté pour voir cette page.</p>
<?php
}

?>