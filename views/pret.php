<!-- PAGE MES CONTENU -->
<?php
if ((!empty($_SESSION['type']) && ($_SESSION['type'] == 'user' || $_SESSION['type'] == 'admin'))) {
?>
    <article class="ficheUser">
        <p class="text1">Pret</p>
        <p class="yes"><?php
                                if (isset($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    unset($_SESSION['message']);
                                }
                                ?></p>
        <!-- Tableau -->
        <table>
           
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Titre</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Date du pret</th>
                    <th scope="col">A rendre avant le</th>
                    <th scope="col">Rendu le</th>
                </tr>
          
            <!-- Boucle remplissage tableau -->
            <?php while ($row = $stmt->fetch()) {
            ?>
                <tr>
                    <td> <img src="<?= $row->FILE; ?>" alt=""></td> <!-- remetre row->file apres avoir gerer un peu le css -->
                    <td><?= $row->titre; ?></td>
                    <td><?= $row->categorie; ?></td>
                    <td><?= $row->datePret; ?></td>
                    <td><?= $row->dateRetour; ?></td>
                    <td><?= $row->rendu; ?></td>
                    
                        <?php if ((isset($row->DateDiff) && $row->DateDiff == 0) && empty($row->rendu)) { ?>
                           <td class="retard">Retard</td>
                     <?php   } ?>
                   
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