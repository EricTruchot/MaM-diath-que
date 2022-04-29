<!-- PAGE MES CONTENU -->
<?php
if ((!empty($_SESSION['type']) && $_SESSION['type'] == 'admin')) {
?>
  <article class="adminUser">
    <p class="text1">UTILISATEURS</p>
    <p class="yes"><?php
                            if (isset($_SESSION['message'])) { //message "systeme"
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                            ?></p>
    <!-- Tableau -->
    <table>

      <tr>
        <th scope="col">ID</th>
        <th scope="col">email</th>
        <th scope="col">type</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>

      <!-- Boucle remplissage tableau -->
      <?php while ($row = $stmt->fetch()) {
        $i = $row->idUser ?>
        <tr>
          <form action="index.php?page=modifUser" method="post">
            <td><?php echo $row->idUser; ?></td>
            <td> <input type="text" name="modifEmail" value="<?= $row->email; ?>"></td>
            <td> <input type="text" name="modifType" value="<?= $row->type; ?>"></td>
            <input type="text" hidden name="idUser" value="<?php echo $i ?>">
            <td><button type="submit" name="edit" onclick="return window.confirm('Êtes vous sûr de vouloir modifier cet utilisateur ?')">Modifier</button>
            </td>
          </form>
          <form action="index.php?page=deleteUser" method="post">
            <input type="text" hidden name="idUser" value="<?php echo $i ?>">
            <td><button type="submit" name="deleteUser" onclick="return window.confirm('Êtes vous sûr de vouloir supprimer cet utilisateur ?')">Supprimer</button>
            </td>
          </form>
          <form action="index.php?page=ficheUser" method="post">
            <input type="text" hidden name="idUser" value="<?php echo $i ?>">
            <td><button type="submit" name="ficheUser">Fiche</button>
            </td>
          </form>
        </tr>
      <?php } ?>
    </table>

  </article>
<?php } else {
?>
  <p class="restrict">Vous devez etre admin pour voir cette page.</p>
<?php
}

?>