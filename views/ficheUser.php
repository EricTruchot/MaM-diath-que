<!-- PAGE CONTENU principal -->
<?php
if ((!empty($_SESSION['type']) && $_SESSION['type'] == 'admin')) {
?>

<article class="ficheUser">
    <p class="text1">Fiche Utilisateur</p>
    <?php $row = $stmt->fetch();
    ?>
    <div class="block">


        <div class="bot">
            <p class="titre"><?= $row->email; ?></p>
            <hr>
        </div>

    </div>



     <!-- Tableau -->

     <table>
                <tr>
                    <th scope="col">Article</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Date du pret</th>
                    <th scope="col">A rendre avant le</th>
                    <th scope="col">Rendu le</th>
                    <th scope="col"></th>
                </tr>
            <!-- Boucle remplissage tableau -->
            <?php do {
            ?>
                <tr>
                    <td><?= $row->titre; ?></td>
                    <td><?= $row->categorie; ?></td>
                    <td><?= $row->datePret; ?></td>
                    <td><?= $row->dateRetour; ?></td>
                    <td><?= $row->rendu; ?></td>
                    <?php if ((isset($row->DateDiff) && $row->DateDiff == 0) && empty($row->rendu)) { ?>
                        <td class="retard">Retard</td>
          <?php          } ?>
                    </td>
                </tr>
                <?php } 
                while ($row = $stmt->fetch()) ?>
        </table>
        <button id="print">Print</button>

    

</article>
<script>
    document.getElementById("print").addEventListener("click", (e) => {
  window.print();
});
</script>
<?php } ?>