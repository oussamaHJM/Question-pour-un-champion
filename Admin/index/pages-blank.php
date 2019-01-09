<?php
session_start();
//verifier si une variable enregistrer dans la session
if ($_SESSION['authentification']!=1) {
    echo '<body bgcolor="#FFFFFF"></body>';
    echo "<script language=JavaScript>alert('cette page est reservée aux administrateurs Seulement (-_-!)')</script>";
    echo '<script language=Javascript>document.location.replace("../../index.html");</script>';
}
else {
    if ($_SESSION['type'] == "Animateur") {
        header('location: ../../View/AnimateurPage.php');
    }
    elseif ($_SESSION['type'] == "Animateur") {
        header('location: ../../View/AnimateurPage.php');
    }
    elseif ($_SESSION['type'] == "Utilisateur") {
        header('location: ../../View/welcome.html');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Monster Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <?php require_once ("upMenu.php"); ?>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <?php require_once ("SideMenu.html"); ?>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="text-themecolor m-b-0 m-t-0">Google map</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Ajouer Question</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-block">
                            <div style="margin-left: 10%;margin-right: 10%; width: 80%">
                                <div class="container-fluid">
                                    <form class="form-horizontal custom-form" method="post" action="../../View/gestionFomulaire.php?operation=QuestionPhoto" enctype="multipart/form-data">
                                        <h1 style="width: 60%;margin-right: 20%;margin-left: 20%;">Ajout des questions</h1>
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
                                        <div class="form-group">
                                            <div class="col-sm-4 label-column">
                                                <label class="control-label" for="rVR-input-field">Image : </label>
                                            </div>
                                            <div class="col-md-8 col-sm-6 input-column">
                                                <input class="btn btn-primary" type="file" name="image">
                                            </div>
                                        </div>

                                        <button class="btn btn-primary btn-lg submit-button" style="margin-left: 30%; margin-right: 30%;" type="submit">Ajouter la question</button>
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
                </div>
            </div>
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <?php require_once ("footer.html"); ?>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<!--Custom JavaScript -->
<script src="js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
