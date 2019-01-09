<?php
session_start();
//verifier si une variable enregistrer dans la session
if ($_SESSION['authentification']!=1) {
    echo '<body bgcolor="#FFFFFF"></body>';
    echo "<script language=JavaScript>alert('cette page est reservée aux Participant de la competition (-_-!)')</script>";
    echo '<script language=Javascript>document.location.replace("../../index.html");</script>';
}
else {
    if ($_SESSION['type'] == "Animateur") {
        header('location: ../../View/AnimateurPage.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bonjour les condidats</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="../css/coming-soon.css" rel="stylesheet">

  </head>

  <body>

    <div class="overlay"></div>

    <div class="masthead">
      <div class="masthead-bg"></div>
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-12 my-auto">
            <div class="masthead-content text-white py-5 py-md-0">
                <h1 class="mb-3">Bonjour</h1>
              <h1><?php echo $_SESSION['Name']; ?>!</h1>
              <p class="mb-5">La competition est pas encore démarer attendez vos
                <strong>riveaux!</strong>  l'animateur démarera l'aventure dans quelque instants.</p>
                <a href="Reponse.php"><div class="input-group-append">
                  <button class="btn btn-secondary" type="button" disabled>Commencer  (O_O!)</button>
                </div></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="social-icons">
      <ul class="list-unstyled text-center mb-0">
        <li class="list-unstyled-item">
          <a href="#">
            <i class="fa fa-facebook"></i>
          </a>
        </li>
        <li class="list-unstyled-item">
          <a href="#">
            <i class="fa fa-instagram"></i>
          </a>
        </li>
      </ul>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript 
    <script src="vendor/vide/jquery.vide.min.js"></script> -->

    <!-- Custom scripts for this template -->
    <script src="js/coming-soon.min.js"></script>
    <script>
        var socket = io.connect("http://localhost:3001");
        socket.on("new_order",function (data){
            if (data.StartCompetition==1)
                location.replace("Reponse.php");
        })
    </script>

  </body>

</html>
