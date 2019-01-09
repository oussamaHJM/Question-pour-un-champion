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
    <section>
        <div>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header"><a class="navbar-brand navbar-link" href="#">Brand</a>
                        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                    </div>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="active" role="presentation"><a href="#">First Item</a></li>
                            <li role="presentation"><a href="#">Second Item</a></li>
                            <li role="presentation"><a href="#">Third Item</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="row register-form">
                <div class="col-md-8 col-md-offset-2">
                    <form class="form-horizontal custom-form" action="gestionFomulaire.php?operation=ajouterUser" method="post">
                        <h1>Inscription </h1>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="name-input-field">Nom </label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input id="name-input-field" class="form-control" type="text" required="" autocomplete="on" name="NomUtilisateur">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="email-input-field">Email </label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input id="email-input-field" class="form-control" type="email" autocomplete="on" inputmode="email" name="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="login-input-field">Login</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input id="login-input-field" class="form-control" type="text" name="Login1">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="password-input-field">Mot de passe</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input id="password-input-field" class="form-control" type="password" required name="Password1">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label">Type d'utilisateur</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input name="UserType" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">I've read and accept the terms and conditions</label>
                        </div>
                        <button class="btn btn-default submit-button" type="submit">INSCRIPTION</button>
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
        </div>
    </div>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>