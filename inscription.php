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
        <h3 style="text-align: center;">Create your account very quickly and easily</h3><br>
        <form action="cible.php" method="post">
            <div style="display: flex; flex-direction:column; align-items:center;">
                <div class="input" style="display: flex; flex-direction:column; align-items:center;">
                    <span>Username</span>
                    <input type="text" name="username" placeholder="Choose an username">
                </div><br>
                <div class="input" style="display: flex; flex-direction:column; align-items:center;">
                    <span>Mot de passe</span>
                    <input type="password"  name="password" placeholder="Choose a password">
                </div><br>
                <div class="input" style="display: flex; flex-direction:column; align-items:center;" >
                    <span>Mot de passe</span>
                    <input type="password" name="password_verify" placeholder="Put the same password">
                </div><br>
                <div class="input">
                    <button style="width:100px; height:30px; font-size:15px; border-radius:5px; border:none; background-color:#0088ff" type="submit" name="create">Create</button>
                </div><br>
                <div>
                    <span>Have you already an account? </span><strong><a href="./index.php">log in here</a> </strong>
                </div>
            </div>
        </form>
    </div>
</body>

</html>