<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddQuestion</title>
    <link rel="stylesheet" href=".../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/Bootstrap-Payment-Form.css">
    <link rel="stylesheet" href="../assets/css/Pretty-Registration-Form.css">
</head>

<body>
    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal custom-form" method="post" action="gestionFomulaire.php?operation=AjouterQuestion">
                <h1>Ajout des questions</h1>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="question-input-field">Question : </label>
                    </div>
                    <div class="col-md-8 col-sm-6 input-column">
                        <textarea id="question-input-field" class="form-control input-lg" spellcheck="true" name="Question" required autofocus></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="rE1-input-field">Réponse erroné 1 :</label>
                    </div>
                    <div class="col-md-8 col-sm-6 input-column">
                        <textarea id="rE1-input-field" class="form-control input-lg" name="ReponseErn1" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="rE2-input-field">Réponse erroné 2 : </label>
                    </div>
                    <div class="col-md-8 col-sm-6 input-column">
                        <textarea id="rE2-input-field" class="form-control input-lg" name="ReponseErn2" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="rE3-input-field">Réponse erroné 3:&nbsp; </label>
                    </div>
                    <div class="col-md-8 col-sm-6 input-column">
                        <textarea id="rE3-input-field" class="form-control input-lg" name="ReponseErn3" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="rVR-input-field">Réponse correct :&nbsp; </label>
                    </div>
                    <div class="col-md-8 col-sm-6 input-column">
                        <textarea id="rVR-input-field" class="form-control input-lg" name="ReponseVr" required></textarea>
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox">I've read and accept the terms and conditions</label>
                </div>
                <button class="btn btn-primary btn-lg submit-button" type="submit">Ajouter la question</button>
                <?php
                if (isset($_GET["resultat"]))
                { ?>
                    <?php
                    if ($_GET["resultat"] == 1){
                        $resultat = "Operation terminée ave succés!";
                    }
                    if ($_GET["resultat"] == 0){
                        $resultat = "Une erreur est survenue lors de la derniere operation";
                    }
                    echo "<div><font color='red'>".$resultat."</font></div>"; ?>
                <?php }
                ?>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>