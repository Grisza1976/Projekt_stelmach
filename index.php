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
    <header>
        <img src="baner.jpg" alt="baner" class="baner">
        <h1><?php echo "Witaj ". $_SESSION["login"]?></h1>
    </header>
    
    <div class="main">
        <?php
       
        ?>
        <div class="lewy">
        <form action="index.php" method="POST" class="srodek">
            <h3>Wybierz ksiązke do wypozyczenia</h3>
            <label>Wybierz książkę:</label>
            <select name="ksiazki" required>
                <option value="" disabled selected>Wybierz książke</option>
                <?php
            $zap = 'SELECT ksiazki.nazwa, ksiazki.id_ksiazki FROM ksiazki';
            $sql = mysqli_query($conn,$zap);
            if($sql){
                
                while($rzad=mysqli_fetch_row($sql)){
                    echo "<option value='". $rzad[1]."'>" . $rzad[0] . "</option>";
                }}
                else{
                    echo "<option value='' disabled>Błąd ładowania książek</option>";
                }
            
            ?>
            </select>
            <input type="submit" value="Wyślij">
            <?php
            if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['ksiazki'])){
                $id_ksiazki = $_POST['ksiazki'];
                $id_klienta = $_SESSION['id_klienta'];
                $data = date('Y-m-d');
                $zap1 = "INSERT INTO wypozyczenia (id_klienta,id_ksiazki,data_wypozyczenia) VALUES ('$id_klienta','$id_ksiazki','$data')";
                if($sql1=mysqli_query($conn,$zap1)){
                    echo "wypożyczenie wykonane prawidłowo. Zapraszamy po odbiór do najbliższej placówki";
                }else{
                    echo "Błąd wykonania zapytania";
                }
            }
            ?>
        </form>
        <form action="wyloguj.php" method="POST">   
        <input type="submit" value="Wyloguj się" name="wyloguj"/>
        <?php
        if(isset($_POST['wyloguj'])){
        header("Location:wyloguj.php");
        }
        ?>
        </form>
        </div>
        <div class="prawy">
            <div class="srodek">
            <?php
            $zap2="SELECT ksiazki.nazwa,ksiazki.autor,ksiazki.data_wydania FROM ksiazki";
            $sql2=mysqli_query($conn,$zap2);
            echo "<table border=1><th>Nazwa</th><th>Autor</th><th>data_wydania</th>";
            while($rzad1=mysqli_fetch_row($sql2)){
                echo "<tr><td>".$rzad1[0]."</td><td>"
            .$rzad1[1]."</td><td>"
            .$rzad1[2]."</td></tr>";
        
            }
            echo "</table>";
            
            ?>
            </div>
        </div>
        
    </div>
</body>
</html>