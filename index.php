<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="main-section">
        <h3 style="text-align: center;">Enter your identifiers and login quickly</h3><br>
        <form action="verify.php" method="post">
            <div style="display: flex; flex-direction:column; align-items:center;">
                <div class="input" style="display: flex; flex-direction:column; align-items:center;">
                    <span>Username</span>
                    <input class="input" type="text" name="login_username" placeholder="Your username here">
                </div><br>
                <div class="input" style="display: flex; flex-direction:column; align-items:center;">
                    <span>Mot de passe</span>
                    <input  type="password" name="login_password" style="text-align: center;" placeholder="Your password here">
                </div><br>
                <div>
                    <button style="width:100px; height:30px; font-size:15px; border-radius:5px; border:none; background-color:#0088ff" type="submit" name="login">Login</button>
                </div><br>
                <div>
                    <span>You don't have an account? </span><strong><a href="./inscription.php">Create en account here</a> </strong>
                </div>
            </div>
        </form>
    </div>
    <script src="" async defer></script>
</body>

</html>