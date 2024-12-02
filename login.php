<?php
require_once("connect.php");
session_start();
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
        <form action="login.php" method="POST" class="logowanie">
            <label>Login</label>
            <input type="text" name="login" required><br><br>
            <label>Hasło</label>
            <input type="password" name="password" required><br><br>
            <label>Nie masz konta?</label>
            <a href="zaloz.php"><input type="button" value="Załóż konto"></a><br><br>
            <input type="submit" value="Zaloguj sie" name="zaloguj">
            <input type="reset" value="Reset">
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if(isset($_POST['zaloguj'])){
        $login = $_POST['login'];
        $zap = "SELECT klienci.haslo, klienci.id_klienta FROM klienci WHERE klienci.login = '$login'";
        $sql = mysqli_query($conn,$zap);
        if(mysqli_num_rows($sql)==0){
            echo "Nie ma takiego użytkownika";
            exit;
        }
        $haslo = $_POST['password'];
        $rzad = mysqli_fetch_row($sql);
        $haszowane_haslo = $rzad[0];
        $id_klienta = $rzad[1];
        if(password_verify($haslo,$haszowane_haslo)){
            session_regenerate_id(true);
            $_SESSION['login']= $login;
            $_SESSION['id_klienta']= $id_klienta;
            header("Location:index.php");
        }
        else{
            echo "Nieprawidłowe hasło";
        }}}
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>