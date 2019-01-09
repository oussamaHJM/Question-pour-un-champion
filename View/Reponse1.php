<?php

require_once ("../Module/ConnexionPDO.php");
require_once ("../Module/Utilisateur.php");
$user = new Utilisateur();
$stmt = $user->ReturnQuestion();
$stmt->execute();
$ligne = $stmt->fetch();

session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reponse</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/Style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/Hero-Technology.css">
</head>

<body>
<section>
    <div class="container">
        <h6>Processing, please wait.</h6>
        <div class="progress-bar">
            <div class="shadow"></div>
        </div>
    </div>
</section>

    <div class="jumbotron hero-technology">
        <h1 class="hero-title">QUESTION </h1>
        <p class="hero-subtitle"><?php echo $ligne["QUESTION"]; ?></p>
    </div>
    <div class="container">
        <form action="gestionFomulaire.php?operation=Repondre" method="post">
            <div class="col-md-12">
                <input type="text" value="<?php echo $ligne["ID_QUESTION"]; ?>" name="Question" hidden>
            </div>

            <div class="col-md-4">
                <div class="radio">
                    <label>
                        <input type="radio" name="Reponse" value="<?php echo $ligne["REPONSE_ERRONE2"];?>"><?php echo $ligne["REPONSE_ERRONE2"]; ?></label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="radio">
                    <label>
                        <input type="radio" name="Reponse" value="<?php echo $ligne["REPONSE_ERRONE1"];?>"><?php echo $ligne["REPONSE_ERRONE1"]; ?></label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="radio">
                    <label>
                        <input type="radio" name="Reponse" value="<?php echo $ligne["REPONSE_ERRONE3"];?>"><?php echo $ligne["REPONSE_ERRONE3"]; ?></label>
                </div>
            </div>
            <div class="container1">
                <div class="progress-bar">
                    <div class="shadow"></div>
                </div>
            </div>
            <p><center><button id="submit_btn" class="btn btn-cost btn-lg" type="submit"  >Valider</button></center></p>
            <?php
            if (isset($_GET["resultat"]))
            { ?>
                <?php
                if ($_GET["resultat"]){
                    $resultat = "Réponse vrai";
                    echo "
                         <script type=\"text/javascript\">
                         document.getElementById(\"submit_btn\").disabled = true;
                         </script>
                    ";
                }
                if ($_GET["resultat"] == false){
                    $resultat = "Réponse fausse";
                    echo "
                                 <script type=\"text/javascript\">
                                  document.getElementById(\"submit_btn\").disabled = true;
                                 </script>
                     ";
                }
                echo "<div><font color='red'>".$resultat."</font></div>"; ?>
            <?php }
            ?>
        </form>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.min.js"></script>



    <div id="divCounter"></div>
    <script>
        var socket = io.connect("http://localhost:3001");
        socket.on("new_order",function (data){
            if (data.RefreshValue==1)
                location.replace("Update_Question.php");
        })

    </script>




    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>