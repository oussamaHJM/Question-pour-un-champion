<form class="form-horizontal custom-form" action="../../View/gestionFomulaire.php?operation=ajouterUser" method="post">
    <h1>Création des utilisateures</h1>
    <div class="form-group">
        <div class="col-sm-4 label-column">
            <label class="control-label" for="name-input-field">Nom d'utilisateur : </label>
        </div>
        <div class="col-sm-4 input-column">
            <input id="name-input-field" class="form-control form-control-line" type="text" name="NomUtilisateur"  autofocus="" autocomplete="on" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 label-column">
            <label class="control-label" for="email-input-field">Email : </label>
        </div>
        <div class="col-sm-4 input-column">
            <input id="email-input-field" class="form-control form-control-line" type="email" name="Email" autocomplete="on" inputmode="email" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 label-column">
            <label class="control-label" for="login-input-field">Login : </label>
        </div>
        <div class="col-sm-4 input-column">
            <input id="login-input-field" class="form-control" type="text" name="Login" autocomplete="on" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 label-column">
            <label class="control-label" for="password-input-field">Password : </label>
        </div>
        <div class="col-sm-4 input-column">
            <input id="password-input-field" class="form-control" type="password" name="Password" autocomplete="off" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 label-column">
            <label class="control-label" for="usertype-select-field">Type d'utilisateur : </label>
        </div>
        <div class="col-md-4 col-md-offset-0 col-sm-4 input-column">
            <select class="form-control" name="UserType" required>
                <option value="Utilisateur" name="UserType" selected>Utilisateur</option>
                <option value="Admin" name="UserType" >Admin</option>
                <option value="Animateur" name="UserType" >Animateur</option>
            </select>
        </div>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox">J'ai déja lu les termes de conditions</label>
    </div>
    <button class="btn btn-default submit-button" type="submit">Créer</button>
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