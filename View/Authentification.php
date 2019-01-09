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
    <div class="backgrong"></div>
        <div class="container">
            <div class="login-card"><img src="../assets/img/avatar_2x.png" class="profile-img-card">
                <p class="profile-name-card">Bienvenue !</p>
                <form class="form-signin" action="gestionFomulaire.php?operation=connexion" method="post"><span class="reauth-email"> </span>
                    <div class="styled-input" ><input class="pp" type="text" required="" placeholder="Login" autofocus="" name="Login" id="inputEmail"></div>
                    <div class="styled-input" ><input class="pp" type="password" required="" placeholder="Mot de passe" name="Password" id="inputPassword"></div>
                    <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Sign in</button>
                </form>
            </div>
        </div>

    
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>