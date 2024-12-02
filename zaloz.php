<?php
require_once("connect.php");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTEKA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header><img src="baner.jpg" alt="baner" class="baner"></header>
        <form action="zaloz.php" method="POST" class="logowanie">
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
            <input type="reset" value="Reset">
        </form>
        <?php
        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $login = $_POST['login'];
            $zap_login = "SELECT klienci.login FROM klienci WHERE klienci.login = '$login'";
            $sql = mysqli_query($conn,$zap_login);
            if(mysqli_num_rows($sql)>0){
                echo "taki użytkownik już istnieje";
                exit;
            }
            $haslo = $_POST['password'];
            $drugie_haslo = $_POST['secondpassword'];
            if($haslo !== $drugie_haslo){
                echo "Hasła są różne";
                exit;
            }
            $email = $_POST["email"];
            $zap_email = "SELECT klienci.email FROM klienci WHERE klienci.email = '$email'";
            $sql1 = mysqli_query($conn,$zap_email);
            if(mysqli_num_rows($sql1)>0){
                echo "taki email już istnieje";
                exit;
            }
            $haszowane_haslo=password_hash($haslo,PASSWORD_BCRYPT);
            $wstaw = "INSERT INTO klienci (login, haslo, email) VALUES ('$login', '$haszowane_haslo', '$email')";
            if(mysqli_query($conn,$wstaw)){
                header("Location:login.php");
            }else{
                echo "Błąd podczas zakładania konta: ". mysqli_error($conn);
            }
        }
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>