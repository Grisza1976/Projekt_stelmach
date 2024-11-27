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
        <form action="login.php" method="POST">
            <label>Login</label>
            <input type="text" name="login" required><br><br>
            <label>Hasło</label>
            <input type="password" name="password" required><br><br>
            <label>Nie masz konta?</label>
            <a href="zaloz.php"><input type="button" value="Załóż konto"></a><br><br>
            <input type="submit" value="Zaloguj sie">
        </form>
    </div>
</body>
</html>