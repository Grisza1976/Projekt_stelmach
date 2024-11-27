<?php
require_once("connect.php");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logowanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>WITAJ W BIBLIOTECE</h1>
        <form action="zaloz.php" method="POST">
            <label>Login</label>
            <input type="text" name="login" required><br><br>
            <label>Hasło</label>
            <input type="password" name="password" required><br><br>
            <label>Powtórz Hasło</label>
            <input type="password" name="secondpassword" required><br><br>
            <label>E-mail</label>
            <input type="text" name="email" required><br><br>
            <label>Masz już konto?</label>
            <a href="login.php"><input type="button" value="Zaloguj sie"></a><br><br>
            <input type="submit" value="Załóż konto">
        </form>
        <?php
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $login = $_POST['login'];
            $haslo = $_POST['password'];
            $drugie_haslo = $_POST['secondpassword'];
            $email = $_POST["email"];
            $zap_login = "SELECT klienci.login FROM klienci WHERE klienci.login = '$login'";
            $sql = mysqli_query($conn,$zap_login);
            if(!$sql){
                echo "taki użytkownik już istnieje";
            }
            echo "git";
            if($haslo !== $drugie_haslo){
                echo "Hasła są różne";
            }
            $haszowane_haslo=password_hash($haslo,PASSWORD_BCRYPT);


        }
        


        ?>
    </div>
</body>
</html>