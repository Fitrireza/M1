<?php
session_start();
$user=$_SESSION["username"];
$pass=$_SESSION["password"];
?>
<!DOCTYPE html>
<html>
<body>
    <?php
    // Echo variabel sesi yang telah diset di halaman sebelumnya
    echo "username: " .$user. ".<br>";
    echo "password: " .$pass. ".";

    echo "<h2>Cek SESSION klik <a href='sesi3.php'>disini";
    ?>
</body>
</html>