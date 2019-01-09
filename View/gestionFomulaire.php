<?php
/**
 * Created by PhpStorm.
 * User: oussama
 * Date: 18/03/2018
 * Time: 21:58
 */


include ("../vendor/autoload.php");
use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

require_once ("../Module/ConnexionPDO.php");
require_once ("../Module/Utilisateur.php");
error_reporting(1);
extract($_POST,EXTR_OVERWRITE);
extract($_GET,EXTR_OVERWRITE);
//session_start();
$utilisateur = new Utilisateur();


if($operation == 'connexion')
{
    session_start();
    $_SESSION['login'] = mysql_real_escape_string($Login);
    $_SESSION['password'] = md5(mysql_real_escape_string($Password));
    $_SESSION['authentification'] = $utilisateur->authentification($_SESSION['login'],$_SESSION['password']);

    if ($_SESSION['authentification'] == 1)
    {

        $ligne = $utilisateur->infoUtilisateur($_SESSION['login']);
        $_SESSION['ID'] = $ligne['USER_ID'];
        $_SESSION['Name'] = $ligne['USER_NAME'];
        $_SESSION['login'] = $ligne['USER_LOGIN'];
        $_SESSION['password'] = $ligne['USER_PASSWORD'];
        $_SESSION['email'] = $ligne['USER_EMAIL'];
        $_SESSION['type'] = $ligne['USER_TYPE'];
        $_SESSION['score'] = $ligne['USER_SCORE'];
        if ($_SESSION['type'] == "Admin")
        {
            header('location: ../Admin/index/index.php');
        }
        elseif ($_SESSION['type'] == "Animateur") {
            header('location: AnimateurPage.php');
        }
        elseif ($_SESSION['type'] == "Animateur") {
            header('location: AnimateurPage.php');
        }
        elseif ($_SESSION['type'] == "Utilisateur") {
            header('location: welcome.php');
        }

    }
    else
    {
        header('location: ../index.html');
    }
}
if ($operation == 'deconnexion')
{
    session_start();
    session_destroy();
    echo "<script language=Javascript>alert('Mauvais Login/Password !');</script>";
    echo '<script language=Javascript>document.location.replace("../index.html");</script>';
}
if ($operation == 'ajouterUser')
{
    $resultat = $utilisateur->AjouterUser($NomUtilisateur,$Login,$Password,$Email,$UserType);
    header("location:../Admin/index/map-google.php?resultat=".$resultat);
}

if ($operation == 'AjouterQuestion')
{
    $resultat = $utilisateur->AjouterQuestion($Question,$ReponseErn1,$ReponseErn2,$ReponseErn3,$ReponseVr);
    header("location:../Admin/index/pages-blank.php?resultat=".$resultat);
}



if ($operation == 'QuestionPhoto')
{
    $folder ="uploads/";
    $image = $_FILES['image']['name'];
    $path = $folder . $image ;
    $target_file=$folder.basename($_FILES["image"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $allowed=array('jpeg','png' ,'jpg');
    $filename=$_FILES['image']['name'];
    $ext=pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($ext,$allowed) ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
        $resultat = $utilisateur->QuestionPhoto($Question,$ReponseErn1,$ReponseErn2,$ReponseErn3,$ReponseVr,$image,$path);
    }
    else{
        $resultat = $utilisateur->QuestionPhoto($Question,$ReponseErn1,$ReponseErn2,$ReponseErn3,$ReponseVr,$image,$path);
    }
    //header("location:../Admin/index/pages-blank.php?resultat=".$resultat);
}



if ($operation == 'Repondre')
{
    session_start();
    $resultat = $utilisateur->Repondre($_SESSION['ID'],$Question,$Reponse);

    $stmt = $utilisateur->ReturnQuestion($Question);
    $stmt->execute();
    $ligne = $stmt->fetch();

    /***************************************************/

    $form_data = array("User_id"=>$_SESSION['Name'],"Question"=>$ligne["QUESTION"],"Reponse"=>$Reponse,"RefreshValue"=>0);

    $version = new Version2X("http://localhost:3001");
    $client = new Client($version);

    $client->initialize();
    $client->emit("new_order", $form_data);
    $client->close();

    /***************************************************/
    header("location:Reponse.php?resultat=".$resultat);
}

if ($operation == 'NextQuestion')
{
    $utilisateur->UpdateQuestion();
   // header('Reponse.php');
}
unset($utilisateur);