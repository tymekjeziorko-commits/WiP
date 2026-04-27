<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "taizadanie";

$conn = mysqli_connect("localhost", "root", "", "taizadanie");

if (!$conn) {
    die("Błąd połączenia: " . mysqli_connect_error());
}

$user = $_POST['user'];
$haslo = $_POST['haslo'];

$date = new DateTime();
$date = $date->format("y:m:d h:i:s");

session_start();


$sql = "SELECT * FROM uzytkownik WHERE login = '$user' AND haslo = '$haslo'";

$check = mysqli_query($conn, $sql);

if (mysqli_num_rows($check) > 0) {
        echo "zalogowano <br>";


  while($row = $check->fetch_assoc()) {
    $_SESSION[id] = $row["id"]; }

    $sql2 = "INSERT INTO logi (userId, datalog, form) VALUES ('$id', '$date', 'nie')";

    if (mysqli_query($conn, $sql2)) {
            echo "Dane zapisane w bazie!" . "<br>";
    }  
    else { echo "błąd";}
    } else { echo "błąd";}


mysqli_close($conn);
?> 

<form action="panel.php" method="post">

<label>Imie:</label>
<input type="text" name="imie"><br>
<label>Nazwisko:</label>
<input type="text" name="nazw"><br>
<label>Email:</label>
<input type="email" name="email"><br>

<input type="submit" value="zaloguj">
</form>