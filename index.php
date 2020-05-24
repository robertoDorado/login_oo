<?php
session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false){
    echo "Login ok<br>";

}else{
    header("Location: login.php");
}

?>

<a href="sair.php">Sair</a>