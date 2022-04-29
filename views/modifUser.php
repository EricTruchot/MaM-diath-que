<!-- PAGE PROFIL -->
<?php
if (empty($_SESSION['type']) || $_SESSION['type'] != 'admin') {
        ?>
        <p class="restrict">Vous n'etes pas connecté</p>
        <?php
} elseif ((!empty($_SESSION['type']) && $_SESSION['type'] == 'admin')) {

        $modifType = $user->type;
        $modifEmail = $user->email;
?>

        <article class="profil">
                <div>                
                <p class="text1">modif PROFIL</p>
                </div>
                <p class="yes"><?php
                            if (isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                            ?></p>
                <div class="modif">
                       
                        <form action="index.php?page=modifUser" method="POST">
                        <p class="text-modif">Modifier mes informations:</p>
                                <p class="text-profil">Email:</p>
                                <input type="text" name="modifEmail" value="<?= $modifEmail; ?>">
                                <p class="text-profil">Type:</p>
                                <input type="text" name="modifType" value="<?= $modifType; ?>">
                                <input type="text" hidden name="idUser" value="<?php echo $i ?>">
                                <button class="btn-modif" type="submit" name="submitModifuser">MODIFIER</button>
                        </form>
                </div>


        </article>

<?php } ?>