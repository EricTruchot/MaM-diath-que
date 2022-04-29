<?php
require_once("model/model.php");

function showArticlePage()
{
    $categorie = getCategorie();
    $genre = getGenre();
    $auteur = getAuteur();
    $editeur = getEditeur();
    $stmt = getAllArticle();

    if (!isset($_SESSION)) {
        session_start();
    }
    if ((!empty($_SESSION['type']) && ($_SESSION['type'] == 'user' || $_SESSION['type'] == 'admin'))) {
        $stmt2 = getPret();
    }
    ob_start();
    include_once("header.php");
    require_once("views/contenu.php");
    include_once("footer.php");
    $content = ob_get_clean();
    return $content;
}



//=====================
//======= USER ========
//=====================

function showConnexion()
{

    ob_start();
    include_once("header.php");
    require_once("views/connexion.php");
    include_once("footer.php");
    $content = ob_get_clean();
    return $content;
}

function userVerif()
{
    getConnexion();
}

function showMesContenu()
{
    // $stmt2 = getMesContenu();
    ob_start();
    include_once("header.php");
    require_once("views/mesContenu.php");
    include_once("footer.php");
    $content = ob_get_clean();
    return $content;
}
function showInscription()
{
    ob_start();
    include_once("header.php");
    require_once("views/inscription.php");
    include_once("footer.php");
    $content = ob_get_clean();
    return $content;
}

function showUpload()
{
    $uploadP1 = getUploadP1();
    ob_start();
    include_once("header.php");
    require_once("views/upload.php");
    include_once("footer.php");
    $content = ob_get_clean();
    return $content;
}

function showUser()
{
    $user = getUser();
    ob_start();
    include_once("header.php");
    require_once("views/profil.php");
    include_once("footer.php");
    $content = ob_get_clean();
    return $content;
}

function showPret()
{

    $stmt = getPret();
    ob_start();
    include_once("header.php");
    require_once("views/pret.php");
    include_once("footer.php");
    $content = ob_get_clean();
    return $content;
}

//=====================
//======= ADMIN ========
//=====================


function showAdmin()
{
    $stmt = getAllArticleAdmin();
    ob_start();
    include_once("header.php");
    require_once("views/admin.php");
    include_once("footer.php");
    $content = ob_get_clean();
    return $content;
}

function showAdminUser()
{
    $stmt = getAllUser();
    ob_start();
    include_once("header.php");
    require_once("views/adminUser.php");
    include_once("footer.php");
    $content = ob_get_clean();
    return $content;
}

function showModifUser()
{
    $stmt = getAllUser();
    ob_start();
    include_once("header.php");
    require_once("views/adminUser.php");
    include_once("footer.php");
    $content = ob_get_clean();
    return $content;
}
function showModifArticle()
{

    $stmt = getArticle();
    $stmt2 = getUploadP1();
    ob_start();
    include_once("header.php");
    require_once("views/modifArticle.php");
    include_once("footer.php");
    $content = ob_get_clean();
    return $content;
}
function showArticle()
{
    $affichage = getAffichage();
    $stmt = getArticle();
    $stmt2 = getPretArticle();
    ob_start();
    include_once("header.php");
    require_once("views/article.php");
    include_once("footer.php");
    $content = ob_get_clean();
    return $content;
}

function showAdminPret()
{

    $stmt = getAllPret();
    ob_start();
    include_once("header.php");
    require_once("views/adminPret.php");
    include_once("footer.php");
    $content = ob_get_clean();
    return $content;
}

function showFicheUser()
{

    $stmt = getUserPret();
    ob_start();
    include_once("header.php");
    require_once("views/ficheUser.php");
    include_once("footer.php");
    $content = ob_get_clean();
    return $content;
}
