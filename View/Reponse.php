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
<?php

require_once ("../Module/ConnexionPDO.php");
require_once ("../Module/Utilisateur.php");
$user = new Utilisateur();
$stmt = $user->ReturnQuestion();
$stmt->execute();
$ligne = $stmt->fetch();
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Repose</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="../CSS/stylerep.css">


</head>

<body>


<section>
        <div class="container">
            <h1>QUESTION</h1>
            <h4><?php echo $ligne["QUESTION"]; ?></h4>
            <form action="gestionFomulaire.php?operation=Repondre" method="post">
                    <div class="col-md-12">
                        <input type="text" value="<?php echo $ligne["ID_QUESTION"]; ?>" name="Question" hidden>
                    </div>
                    <ul>
                        <li>
                            <input checked type="radio" name="Reponse" value="<?php echo $ligne["REPONSE_ERRONE1"];?>">
                            <label> <?php echo $ligne["REPONSE_ERRONE1"]; ?></label>
                            <div class="bullet">
                                <div class="line zero"></div>
                                <div class="line one"></div>
                                <div class="line two"></div>
                                <div class="line three"></div>
                                <div class="line four"></div>
                                <div class="line five"></div>
                                <div class="line six"></div>
                                <div class="line seven"></div>
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="Reponse" value="<?php echo $ligne["REPONSE_ERRONE2"];?>">
                            <label> <?php echo $ligne["REPONSE_ERRONE2"]; ?></label>
                            <div class="bullet">
                                <div class="line zero"></div>
                                <div class="line one"></div>
                                <div class="line two"></div>
                                <div class="line three"></div>
                                <div class="line four"></div>
                                <div class="line five"></div>
                                <div class="line six"></div>
                                <div class="line seven"></div>
                            </div>
                        </li>
                        <li>
                            <input type="radio" name="Reponse" value="<?php echo $ligne["REPONSE_ERRONE3"];?>">
                            <label> <?php echo $ligne["REPONSE_ERRONE3"]; ?></label>
                            <div class="bullet">
                                <div class="line zero"></div>
                                <div class="line one"></div>
                                <div class="line two"></div>
                                <div class="line three"></div>
                                <div class="line four"></div>
                                <div class="line five"></div>
                                <div class="line six"></div>
                                <div class="line seven"></div>
                            </div>
                        </li>
                    </ul>
                    <div class="input-group-append">
                        <button id="submit_btn" class="btn btn-secondary" type="submit" >Valider</button>
                    </div>
            </form>
        </div>

</section>

<section>
    <div id="prog" class="rowprog">
        <div class="progress">
            <div class="progress-bar">
                <div class="progress-shadow"></div>
            </div>
        </div>
    </div>
</section>
<section style="width: 70%;margin: 0 auto;">
    <div class="container" style="width: 70%; margin-right: 15%;margin-left: 15%;">
        <?php
        if (isset($_GET["resultat"]))
        { ?>
            <?php
            if ($_GET["resultat"]){
                $resultat = "Réponse vrai";
                $_SESSION['score'] = $_SESSION['score']+1;
                echo "
                         <script type=\"text/javascript\">
                         document.getElementById(\"submit_btn\").disabled = true;
                         </script>
                    ";
                echo "<div style='text-align: center;font-size: 50px;'><font color='#006411'>".$resultat."</font></div>";
            }
            if ($_GET["resultat"] == false){
                $resultat = "Réponse fausse";
                echo "
                                 <script type=\"text/javascript\">
                                  document.getElementById(\"submit_btn\").disabled = true;
                                 </script>
                     ";
                echo "<div style='text-align: center;font-size: 50px;'><font color='red'>".$resultat."</font></div>";
            }
            echo "
                                 <script type=\"text/javascript\">
                                  document.getElementById(\"prog\").style.visibility  = 'hidden';
                                 </script>
                     ";
        }
        ?>
    </div>
</section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.min.js"></script>


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
