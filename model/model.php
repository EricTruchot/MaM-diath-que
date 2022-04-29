<?php

//=====================
//======= BDD =========
//=====================
function dbConnect() // CONNEXION A LA BDD
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "etMediaBdd";

    // FONCTION DE CONNEXION A LA DB
    try {
        // DEFINITION DE LA CONNEXION (LOGIN UTILISATEUR ET NOM DE LA DB (avec les variables precedentes))
        $dsn = "mysql:host=" . $servername . ";dbname=" . $dbname;
        $pdo = new PDO($dsn, $username, $password);

        // catch: ATTRAPE LES ERREURS DE LA FONCTION try
    } catch (PDOException $e) {
        echo "Connexion a la DB echoué: " . $e->getMessage();
    }
    // setATTRIBUTE:  Configure un attribut PDO
    // ATTR_DEFAULT_FETCH_MODE: Définit le mode de récupération par défaut.
    // FETCH_OBJ: Récupère la prochaine ligne et la retourne en tant qu'objet
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $pdo;
}

//==================================================================================================================

//=====================
//======= ARTICLE =====
//=====================

function getAllArticle()
{
    if (isset($_POST['categorie'])) {
        $categorie = $_POST['categorie'];
    }
    if (isset($_POST['genre'])) {
        $genre = $_POST['genre'];
    }
    if (isset($_POST['auteur'])) {
        $auteur = $_POST['auteur'];
    }
    if (isset($_POST['editeur'])) {
        $editeur = $_POST['editeur'];
    }
    $pdo = dbConnect();
    $req = "SELECT idArticle, titre, description, genre, auteur, editeur, etat, file, article.idCategorie, categorie
                    FROM article
                    JOIN categorie
                        ON categorie.idCategorie = article.idcategorie
                    WHERE etat = 'Disponible'";

    if (isset($categorie)) {
        $req .= " AND article.idCategorie = $categorie";
    }
    if (isset($genre)) {
        $req .= " AND genre = $genre";
    }
    if (isset($auteur)) {
        $req .= " AND auteur = $auteur";
    }
    if (isset($editeur)) {
        $req .= " AND editeur = $editeur";
    }
    $req .= " ORDER BY article.idArticle DESC";



    $sql = $pdo->query($req);
    return $sql;
}
function getAllArticleAdmin()
{
$pdo = dbConnect();
$req = $pdo->query("SELECT idArticle, titre, description, genre, auteur, editeur, etat, file, article.idCategorie, categorie
                    FROM article
                    JOIN categorie
                        ON categorie.idCategorie = article.idcategorie
                        ORDER BY article.idArticle DESC");

return $req;
}

function getFiltre()
{
    $req = getAllArticle();
    $stmt = $req->fetchAll(PDO::FETCH_ASSOC);
    return $stmt;
}

function getArticle()
{
    if (
        filter_input(INPUT_POST, "idArticle")
    ) {
        $idArticle = $_POST['idArticle'];


        $pdo = dbConnect();
        $stmt = $pdo->query("SELECT idArticle, titre, description, genre, auteur, editeur, etat, file, article.idCategorie, categorie
                     FROM article
                     JOIN categorie
                         ON categorie.idCategorie = article.idcategorie
                         WHERE idArticle = $idArticle");

        return $stmt;
    }
}

function getDeleteArticle()
{
    if (isset($_POST["delete"])) {
        $idArticle = $_POST['idArticle'];
        $file = $_POST['file'];
        $pdo = dbConnect();
        $req = "DELETE FROM pret WHERE idArticle = $idArticle";
        $pdo->query($req);
        $req2 = "DELETE FROM article WHERE idArticle = $idArticle";
        $pdo->query($req2);
        unlink($file);
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION["message"] = "Article supprimé";
        header("Location: index.php?page=admin");
        exit;
    }
}

function getModifArticle()
{
    $pdo = dbConnect();

    if (
        htmlspecialchars(filter_input(INPUT_POST, "modifTitre"))
        && htmlspecialchars(filter_input(INPUT_POST, "modifGenre"))
        && htmlspecialchars(filter_input(INPUT_POST, "modifAuteur"))
        && htmlspecialchars(filter_input(INPUT_POST, "modifEditeur"))
        && htmlspecialchars(filter_input(INPUT_POST, "menuEtat"))
    ) {


        if (!empty($_FILES["fileToUpload"]["name"])) {
            // delete old image

            $file = $_POST['file'];
            unlink($file);


            // UPLOAD IMAGE
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            //$fileName = $_FILES["fileToUpload"]["name"];
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                // Allow certain file formats
                if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {

                    $uploadOk = 1;
                } else {
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    $_SESSION['error'] = 'Type de fichier non supporter';
                    $uploadOk = 0;
                    header("Location: index.php?page=uploadP1");
                    exit;
                }
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['error'] = "Le fichier n'a pas pu etre envoyer ";
                header("Location: index.php?page=uploadP1");
                exit;
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                    // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                } else {
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    $_SESSION['error'] = "Erreur d'envoie";
                    $uploadOk = 0;
                    header("Location: index.php?page=uploadP1");
                    exit;
                }
            }
        } else {
            $target_file = $_POST['file'];
        }


        // COMMANDE SQL
        $idArticle = $_POST['idArticle'];
        $titre = $_POST['modifTitre'];
        $description = $_POST['modifDescription'];
        $genre = $_POST['modifGenre'];
        $auteur = $_POST['modifAuteur'];
        $editeur = $_POST['modifEditeur'];
        $etat = $_POST['menuEtat'];
        if (isset($_POST['idCategorie'])) {
            $categorie = $_POST['idCategorie'];
        } else {
            $categorie = $_POST['oldCategorie'];
        }

        $reqModifArticle = $pdo->prepare("UPDATE article SET titre = :titre, description = :description, genre = :genre, auteur = :auteur, editeur = :editeur, etat = :etat, idCategorie = :categorie, file = :file WHERE idArticle = :idArticle");
        $reqModifArticle->execute(["titre" => $titre, "description" => $description, "genre" => $genre, "auteur" => $auteur, "editeur" => $editeur, "etat" => $etat, "categorie" => $categorie, "idArticle" => $idArticle, "file" => $target_file]);
        $test = $reqModifArticle->errorInfo(); // variable pour track les erreurs
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION["message"] = "Article modifié";
        header("Location: index.php?page=admin");
        exit;
    } else {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['error'] = 'Saisie invalide';
        header("Location: index.php?page=admin");
        exit;
    }
}

// FILTRE ======================

function getCategorie()
{
    $pdo = dbConnect();
    $req = $pdo->query('SELECT idCategorie, categorie FROM categorie');
    $categorie = $req->fetchAll(PDO::FETCH_ASSOC);
    return $categorie;
}
function getGenre()
{
    $pdo = dbConnect();
    $req = $pdo->query('SELECT DISTINCT genre FROM article');
    $genre = $req->fetchAll(PDO::FETCH_ASSOC);
    return $genre;
}
function getAuteur()
{
    $pdo = dbConnect();
    $req = $pdo->query('SELECT DISTINCT auteur FROM article');
    $auteur = $req->fetchAll(PDO::FETCH_ASSOC);
    return $auteur;
}
function getEditeur()
{
    $pdo = dbConnect();
    $req = $pdo->query('SELECT DISTINCT editeur FROM article');
    $editeur = $req->fetchAll(PDO::FETCH_ASSOC);
    return $editeur;
}

function getAffichage()
{
$pdo = dbConnect();
$affichage = $pdo->query("SELECT * FROM affichage");

return $affichage;
}
function getModifAffichage()
{
    $visi = $_POST['visi'];
$pdo = dbConnect();
$modifAffichage = $pdo->query("UPDATE affichage SET visibilite = $visi WHERE affichage = 'titre'");

return $modifAffichage;
}

//=====================
//======= USER ========
//=====================



function logout()
{
    session_start();
    session_unset();
    session_destroy();
}

function getConnexion()
{
    $pdo = dbConnect();

    if (
        filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)
        && htmlspecialchars(filter_input(INPUT_POST, "mdp"))
    ) {

        $userEmail = $_POST['email'];
        $userMdp = $_POST['mdp'];

        if (isset($userEmail) && isset($userMdp)) {


            $requete = $pdo->prepare("SELECT email, mdp, idUser, type
                                      FROM user 
                                      WHERE email = :email");

            $requete->execute(["email" => $userEmail]);

            $row = $requete->fetchAll();

            $verifPwd = password_verify($userMdp, $row[0]->mdp);

            if ($verifPwd == true && ($userEmail == $row[0]->email)) {
                session_start();
                $_SESSION['email'] = $userEmail;
                $_SESSION['idUser'] = $row[0]->idUser;
                $_SESSION['type'] = $row[0]->type;
            } else {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['error'] = 'Erreur de mot de passe';
                header("Location: index.php?page=connexion");
                exit;
            }
        }
    } else {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['error'] = 'Entrer des identifiants valide';
        header("Location: index.php?page=connexion");
        exit;
    }
}


function getInscription()
{
    $pdo = dbConnect();

    if (
        filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)
        && htmlspecialchars(filter_input(INPUT_POST, "mdp"))
        && htmlspecialchars(filter_input(INPUT_POST, "mdp2"))
    ) {

        $userEmail = $_POST['email'];
        $userMdp = $_POST['mdp'];
        $userMdp2 = $_POST['mdp2'];


        $option = ['cost' => 12,];
        $hash = password_hash($userMdp, PASSWORD_BCRYPT, $option);
        // prepare la requete (le ? sert a securié la requete avec le array() de la ligne suivante)
        $requete = $pdo->prepare("SELECT email FROM user WHERE email = :email");
        // execution de la requete  
        $requete->execute(["email" => $userEmail]);
        /// transformer le retour en tableau 
        $row = $requete->fetchAll();
        // if ($row["email"] == $userEmail || $row["pseudo"] == $userPseudo) {
        if (!empty($row)) {
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['error'] = 'Email deja existant';
            header("Location: index.php?page=inscription");
            exit;
        } else {
            if ($userMdp == $userMdp2) {
                $reqInscription = $pdo->prepare("INSERT INTO user (idUser, email, mdp, type) VALUES
            (DEFAULT, :email, :mdp, DEFAULT)");
                $reqInscription->execute(["email" => $userEmail, "mdp" => $hash]);
            } else {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['error'] = 'Mot de passe different';
                header("Location: index.php?page=inscription");
                exit;
            }
        }
    } else {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['error'] = 'Saisie invalide';
        header("Location: index.php?page=inscription");
        exit;
    }
}

function getPret()
{
    $pdo = dbConnect();
    if (!isset($_SESSION)) {
        session_start();
    }
    $idUser = $_SESSION['idUser'];
    $stmt = $pdo->query("SELECT  idPret, DATE_FORMAT(datePret, '%d/%m/%Y') as datePret, DATE_FORMAT(dateRetour, '%d/%m/%Y') as dateRetour, pret.idArticle, titre, file, categorie, DATE_FORMAT(rendu, '%d/%m/%Y') as rendu, DATEDIFF(datePret, dateRetour) AS DateDiff
                        FROM pret  
                          JOIN article
                            ON article.idArticle = pret.idArticle
                          JOIN categorie
                            ON categorie.idCategorie = article.idCategorie
                        WHERE idUser = $idUser
                        ORDER BY pret.idPret DESC");

    return $stmt;
}


function getUploadP1()
{
    $pdo = dbConnect();
    $req = $pdo->query('SELECT idCategorie, categorie FROM categorie');
    $uploadP1 = $req->fetchAll(PDO::FETCH_ASSOC);
    return $uploadP1;
}
function getUploadP2()
{
    session_start();
    $pdo = dbConnect();
    if (
        htmlspecialchars(filter_input(INPUT_POST, "titre"))
        && htmlspecialchars(filter_input(INPUT_POST, "description"))
        && htmlspecialchars(filter_input(INPUT_POST, "auteur"))
        && htmlspecialchars(filter_input(INPUT_POST, "genre"))
        && htmlspecialchars(filter_input(INPUT_POST, "editeur"))
    ) {
        // PARTIE UPLOAD ============================================================================
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        //$fileName = $_FILES["fileToUpload"]["name"];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            // Allow certain file formats
            if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif") {

                $uploadOk = 1;
            } else {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['error'] = 'Type de fichier non supporter';
                $uploadOk = 0;
                header("Location: index.php?page=uploadP1");
                exit;
            }
        }
        // Check if file already exists
        // if (file_exists($target_file)) {
        //     if (!isset($_SESSION)) {
        //         session_start();
        //     }
        //     $_SESSION['error'] = 'Le fichier existe deja';
        //     $uploadOk = 0;
        //     header("Location: index.php?page=uploadP1");
        //     exit;
        // }
        // Check file size
        // if ($_FILES["fileToUpload"]["size"] > 5000000) {
        //     if (!isset($_SESSION)) {
        //         session_start();
        //     }
        //     $_SESSION['error'] = 'Fichier trop volumineux';
        //     $uploadOk = 0;
        //     header("Location: index.php?page=uploadP1");
        //     exit;
        // }


        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['error'] = "Le fichier n'a pas pu etre envoyer ";
            header("Location: index.php?page=uploadP1");
            exit;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            } else {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['error'] = "Erreur d'envoie";
                $uploadOk = 0;
                header("Location: index.php?page=uploadP1");
                exit;
            }
        }


        // PARTIE SQL    ============================================================================
        $addTitre = $_POST['titre'];
        $addDescription = $_POST['description'];
        $addAuteur = $_POST['auteur'];
        // $addContenu = $_FILES["fileToUpload"]["name"];
        $addGenre = $_POST['genre'];
        $addEditeur = $_POST['editeur'];
        $addIdCategorie = $_POST['idCategorie'];

        // Commande SQL
        if ($uploadOk == 0) {
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['error'] = 'Erreur remplisage base de données';
            header("Location: index.php?page=uploadP1");
            exit;
            // if everything is ok, try to upload file
        } else {
            $reqUpload = $pdo->prepare("INSERT INTO article (idArticle, titre, description, genre, auteur, editeur, etat, file, idCategorie) VALUES
            (DEFAULT, :titre, :description, :genre, :auteur, :editeur, DEFAULT, :file, :idCategorie)");
            $reqUpload->execute(["titre" => $addTitre, "description" => $addDescription, "genre" => $addGenre, "auteur" => $addAuteur, "editeur" => $addEditeur, "file" => $target_file, "idCategorie" => $addIdCategorie]);
            $test = $reqUpload->errorInfo(); // variable pour track les erreurs
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION["message"] = "Votre article a bien été ajouté";
            header("Location: index.php?page=admin");
            exit;
        }
    } else {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['error'] = 'Saisie invalide';
        header("Location: index.php?page=uploadP1");
        exit;
    }
}
function getUser()
{
    $pdo = dbConnect();
    if (!isset($_SESSION)) {
        session_start();
    }
    $req = $pdo->prepare('SELECT idUser, email, mdp, pseudo, type
                     FROM User 
                     WHERE idUser = :user');
    $req->execute(["user" => $_SESSION['idUser']]);
    $user = $req->fetch();

    return $user;
}


function getReservation()
{
    $pdo = dbConnect();
    if (!isset($_SESSION)) {
        session_start();
    }

    $idArticle = $_POST['idArticle'];
    $idUser = $_SESSION['idUser'];

    $reqReserv1 = $pdo->prepare("INSERT INTO pret (idPret, datePret, dateRetour, idUser, idArticle) VALUES
    (DEFAULT, DEFAULT, ADDDATE(datePret, 7), :idUser, :idArticle)");
    $reqReserv1->execute(["idUser" => $idUser, "idArticle" => $idArticle]);
    $test = $reqReserv1->errorInfo(); // variable pour track les erreurs

    $reqReserv2 = $pdo->prepare("UPDATE article SET etat = 'Indisponible' WHERE idArticle = :idArticle");
    $reqReserv2->execute(["idArticle" => $idArticle]);
    $test2 = $reqReserv2->errorInfo(); // variable pour track les erreurs

    $_SESSION["message"] = "Votre article a bien été réservé";
    header("Location: index.php?page=pret");
    exit;
}
//=====================
//======= ADMIN =======
//=====================

function getAllUser()
{
    $pdo = dbConnect();
    $stmt = $pdo->query("SELECT idUser, email, type FROM user");

    return $stmt;
}


function getDeleteUser()
{
    if (isset($_POST["deleteUser"])) {
        $idUser = $_POST['idUser'];
        $pdo = dbConnect();
        $req = "DELETE FROM user WHERE idUser = $idUser";
        $pdo->query($req);
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION["message"] = "Utilisateur supprimé";
        header("Location: index.php?page=adminUser");
        exit;
    }
}



function getModifUser()
{
    $pdo = dbConnect();

    if (
        filter_input(INPUT_POST, "modifEmail", FILTER_VALIDATE_EMAIL)
        && htmlspecialchars(filter_input(INPUT_POST, "modifType"))
    ) {

        $userEmail = $_POST['modifEmail'];
        $userType = $_POST['modifType'];
        $idUser = $_POST['idUser'];

        $reqInscription = $pdo->prepare("UPDATE user SET email = :email, type = :type  WHERE idUser = :idUser");
        $reqInscription->execute(["email" => $userEmail, "type" => $userType, "idUser" => $idUser]);
        $test = $reqInscription->errorInfo(); // variable pour track les erreurs
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION["message"] = "Utilisateur modifié";
        header("Location: index.php?page=adminUser");
        exit;
    } else {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['error'] = 'Saisie invalide';
        header("Location: index.php?page=adminUser");
        exit;
    }
}
function getAllPret()
{
    $pdo = dbConnect();
    if (!isset($_SESSION)) {
        session_start();
    }
    $stmt = $pdo->query("SELECT idPret, DATE_FORMAT(datePret, '%d/%m/%Y') as datePret, DATE_FORMAT(dateRetour, '%d/%m/%Y') as dateRetour, pret.idArticle, titre, file, categorie, DATE_FORMAT(rendu, '%d/%m/%Y') as rendu, email, article.idArticle, DATEDIFF(datePret, dateRetour) AS DateDiff
                        FROM pret  
                          JOIN article
                            ON article.idArticle = pret.idArticle
                          JOIN categorie
                            ON categorie.idCategorie = article.idCategorie
                          JOIN user
                            ON user.idUser = pret.idUser
                            ORDER BY idPret DESC");

    return $stmt;
}
function getPretArticle()
{
    $idArticle = $_POST['idArticle'];
    $pdo = dbConnect();
    if (!isset($_SESSION)) {
        session_start();
    }
    $stmt = $pdo->query("SELECT idPret, DATE_FORMAT(datePret, '%d/%m/%Y') as datePret, DATE_FORMAT(dateRetour, '%d/%m/%Y') as dateRetour, DATE_FORMAT(rendu, '%d/%m/%Y') as rendu, email
                        FROM pret  
                          JOIN user
                            ON user.idUser = pret.idUser
                            WHERE idArticle = $idArticle
                            ORDER BY idPret DESC");

    return $stmt;
}

function getRendu()
{
    if (isset($_POST["rendu"])) {
        $idPret = $_POST['idPret'];
        $idArticle = $_POST['idArticle'];
        $pdo = dbConnect();
        $req = ("UPDATE pret SET rendu = CURRENT_TIMESTAMP WHERE idPret = $idPret");
        $pdo->query($req);
        $req2 = ("UPDATE article SET etat = 'Disponible' WHERE idArticle = $idArticle");
        $pdo->query($req2);
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION["message"] = "Modification effectué";
        header("Location: index.php?page=adminPret");
        exit;
    }
}
function getUserPret()
{
    $idUser = $_POST['idUser'];
    $pdo = dbConnect();
    $req = $pdo->prepare("SELECT pret.idPret, DATE_FORMAT(datePret, '%d/%m/%Y') as datePret, DATE_FORMAT(dateRetour, '%d/%m/%Y') as dateRetour , pret.idUser, pret.idArticle, DATE_FORMAT(rendu, '%d/%m/%Y') as rendu, user.email, article.titre, categorie.categorie, DATEDIFF(datePret, dateRetour) AS DateDiff
                            FROM pret
                            JOIN user
                                ON user.idUser = pret.idUser
                            JOIN article
                                  ON article.idArticle = pret.idArticle
                            JOIN categorie
                                    ON categorie.idCategorie = article.idCategorie
                            WHERE pret.idUser = :user");
    $req->execute(["user" => $idUser]);
    $test = $req->errorInfo();


    return $req;
}

