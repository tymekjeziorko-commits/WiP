<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "taizadanie";

$conn = mysqli_connect("localhost", "root", "", "taizadanie");

if (!$conn) {
    die("Błąd połączenia: " . mysqli_connect_error());
}

session_start();

$t=time();
$czas = (date("h:m:s",$t));

$imie = $_POST['imie'];
$nazwisko = $_POST['nazw'];
$email = $_POST['email'];




$sql = "INSERT INTO dane (userId, imie, nazwisko, email, data) VALUES ('$_SESSION[id]', '$imie', '$nazwisko', '$email', '$czas')";

$check = mysqli_query($conn, $sql);

if (mysqli_num_rows($check) > 0) {
        echo "zapisano formularz";

    } else { echo "błąd";}


mysqli_close($conn);
?> 