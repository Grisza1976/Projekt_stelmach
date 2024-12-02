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
</head>
<body>
    <div class="main">
        <?php
        echo "Witaj, ". $_SESSION['login'];
        ?>
        <div class="lewy">
        <form action="login.php" method="POST">
        <input type="submit" value="Wyloguj się" />
        </form>
        <?php
        ?>
        </div>
        <div class="prawy"></div>
        
    </div>
</body>
</html>