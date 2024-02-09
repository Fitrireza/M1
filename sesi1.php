<?php
//memulai sesi
session_start();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <?php
    //Set variabel sesi
    $_SESSION["username"] = "admin";
    $_SESSION["password"] = "admin";

    echo "Variabel sesi telah diciptakan.";
    echo "<h2>Cek SESSION klik <a href='sesi2.php'>disini";
    ?>
</body>
</html>