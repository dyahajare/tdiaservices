<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../images/t3.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="../bootstrap-5.3.3-dist/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid"> 
        <div class="row">
            <div class="row justify-content-center ha">
                <div class="col-md-6">
                    <div class="all">
                        <img src="../images/t3.png" class="logo" alt="Logo">
                        <h4 class="text1">Ecole Nationale des Sciences Appliquées d'Al Hoceima</h4>
                    </div>
                </div>
                <div class="col-md-6 justify-content-center">
                    <div class="element">
                        <h3 class="textt">Plateforme eServices</h3>
                        <form class="form-group" name="f1" action="../controllers/login_controller.php" onsubmit="return validation()" method="POST">
                            <input class="input1" type="email" aria-describedby="emailHelp" placeholder="Entrer votre nom d'utilisateur" id="user" name="user">
                            <input class="input2" type="password" aria-describedby="password" placeholder="Entrer votre mot de passe" id="pass" name="pass">
                            <div class="form-check">  
                                <input class="form-check-input" type="checkbox" id="exampleCheck1" name="remember">
                                <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
                            </div>
                            <input class="input3" type="submit" placeholder="Se connecter" value="Se Connecter" id="btn">
                        </form>
                        <hr>
                        <div class="text-center"><a href="forgot_password.html">Mot de passe oublié?</a></div>
                        <div class="text-center"><a href="questions.html">Questions?</a></div>
                        <div class="text-center"><p class="text-center2">Copyright © 2020 - Tous droits réservés</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validation() {
            var id = document.getElementById('user').value;
            var ps = document.getElementById('pass').value;

            if (id.trim() === "" && ps.trim() === "") {
                alert("User Name and Password fields are empty");
                return false;
            } else {
                if (id.trim() === "") {
                    alert("User Name is empty");
                    return false;
                }
                if (ps.trim() === "") {
                    alert("Password field is empty");
                    return false;
                }
            }
            return true; // 
        }
    </script>
</body>
</html>