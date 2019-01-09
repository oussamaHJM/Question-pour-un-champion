<?php
    session_start();
    //verifier si une variable enregistrer dans la session
    if ($_SESSION['authentification']!=1)
    {
        echo '<body bgcolor="#FFFFFF"></body>';
        echo "<script language=JavaScript>alert('cette page est reservee aux equipes de la competition!')</script>";
        echo '<script language=Javascript>document.location.replace("index.html");</script>';
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/material-icons.css">
    <link rel="stylesheet" href="../assets/css/user.css">
    <link rel="stylesheet" href="../assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="../assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="../assets/css/Hero-Technology.css">
</head>

<body>
    <div class="jumbotron hero-technology">
        <h1 class="hero-title">Bonjour !</h1>
        <p class="hero-subtitle">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
        <p><a class="btn btn-primary btn-lg hero-button" role="button" href="gestionFomulaire.php?operation=deconnexion">Deconnecter</a></p>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>