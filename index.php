<?php

require_once("controller/controller.php");


if (isset($_GET['page'])) {
    switch ($_GET['page']) {

        case 'logout':
            logout();
            $content = showArticlePage();
            break;
        case 'accueil':
            $content = showArticlePage();
            break;
        case 'connexion':
            $content = showConnexion();
            break;
        case 'verifuser':
            userVerif();
            $content = showArticlePage();
            break;
        case 'verifadmin':
            userVerif();
            $content = showAdmin();
            break;
        case 'inscription':
            $content = showInscription();
            break;
        case 'inscrUser':
            getInscription();
            $content = showArticlePage();
            break;
        case 'mesContenu':
            $content = showMesContenu();
            break;
        case 'uploadP1':
            $content = showUpload();
            break;
        case 'uploadP2':
            getUploadP2();
            $content = showMesContenu();
            break;
        case 'deleteContenu':
            getDeleteArticle();
            $content = showAdmin();
            break;
        case 'profil':
            $content = showUser();
            break;
        case 'modifUser':
            getModifUser();
            $content = showAdminUser();
            break;
        case 'admin':
            $content = showAdmin();
            break;
        case 'adminUser':
            $content = showAdminUser();
            break;
        case 'deleteUser':
            getDeleteUser();
            $content = showAdminUser();
            break;
        case 'article':
            $content = showArticle();
            break;
        case 'adminArticle':
            $content = showModifArticle();
            break;
        case 'modifArticle':
            getModifArticle();
            $content = showAdmin();
            break;
        case 'pret':
            $content = showPret();
            break;
        case 'reservation':
            getReservation();
            break;
        case 'adminPret':
            $content = showAdminPret();
            break;
        case 'rendu':
            getRendu();
            break;
        case 'filtre':
            getFiltre();
            break;
        case 'ficheUser':
            $content = showFicheUser();
            break;
        case 'affichage':
            getModifAffichage();
            $content = showArticlePage();
            break;
        default:
            $content = showArticlePage();
    }
} else {
    $content = showArticlePage();
}

echo $content;
