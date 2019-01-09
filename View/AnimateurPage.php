<?php
session_start();
//verifier si une variable enregistrer dans la session
if ($_SESSION['authentification']!=1) {
    echo '<body bgcolor="#FFFFFF"></body>';
    echo "<script language=JavaScript>alert('cette page est reservée aux Participant de la competition (-_-!)')</script>";
    echo '<script language=Javascript>document.location.replace("../../index.html");</script>';
}
else {
    if ($_SESSION['type'] == "Utilisateur") {
        header('location: ../../View/Reponse.php');
    }
}
?>
<?php
include ("../vendor/autoload.php");
use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

if (isset($_POST["submit"]))
{
    $form_data = array("RefreshValue"=>$_POST["RefreshValue"],"StartCompetition"=>$_POST["StartCompetition"]);
    $version = new Version2X("http://localhost:3001");
    $client = new Client($version);

    $client->initialize();
    $client->emit("new_order", $form_data);
    $client->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="../CSS/stylerep.css">

    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
   <!--========= <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/Style.css">
    <link rel="stylesheet" href="../assets/fonts/material-icons.css">
    <link rel="stylesheet" href="../assets/css/user.css">
    <link rel="stylesheet" href="../assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="../assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="../assets/css/Hero-Technology.css"> ==-->

</head>

<body>
<section>
    <div class="row">
        <form action="" method="post">
                <div class="form-group">
                    <!--Start or stop -->
                    <input hidden id="Start_competition" type="number" name="StartCompetition" class="form-StartCompetition" value="1">
                    <!--Update value -->
                    <input hidden id="update_value" type="number" name="RefreshValue" class="form-RefreshValue" value="0">
                </div>
            <div class="col-md-8 col-md-offset-2">
                <input type="submit" name="submit" class="btn btn-secondary" value="Démarer la compétition !">
            </div>
        </form>
    </div>
    <div class="row">
        <form action="" method="post">
            <div class="form-group">
                <!--Start or stop -->
                <input hidden id="Start_competition" type="number" name="StartCompetition" class="form-StartCompetition" value="0">
                <!--Update value -->
                <input hidden id="update_value" type="number" name="RefreshValue" class="form-RefreshValue" value="1">
            </div>
            <div class="col-md-8 col-md-offset-2">
                <input style="float: left;" type="submit" name="submit" class="btn btn-secondary" value="Question suivante >>">
            </div>
        </form>
    </div>
</section>

<section>
    <div class="rowprog col-md-8 col-md-offset-2">
        <div class="progress">
            <div class="progress-bar">
                <div class="progress-shadow"></div>
            </div>
        </div>
    </div>
</section>

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>