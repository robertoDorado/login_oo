<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body class="corpo">

<?php
session_start();
require_once "config.php";

if(isset($_POST['email']) && empty($_POST['email']) == false){
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $usuarios = new Usuarios();
    $user = $usuarios->Logar($email, $senha);
    
    if($user == true){
        $_SESSION['id'] = $user;
        header("Location: index.php");
    }
}

?>

<script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}

</script>

<form  method="post" class="form" style="padding-top:5%;">

    <h1>Login</h1>

    <span>Email:</span><br>
    <input type="email" name="email" autofocus required><br><br>

    <span>Senha:</span><br>
    <input type="password" name="senha" required><br><br>

    <input type="submit" value="Entrar"><br><br>

    <button class="btn-cadastro"><a style="text-decoration:none;" href="cadastrar.php">Cadastre-se aqui</a></button><br><br>

    <?php

    if(isset($_POST['email']) && empty($_POST['senha']) == false){
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    $usuario = new Usuarios();
    $user = $usuarios->Logar($email, $senha);

    if($email && $senha != $user):
    ?>
        <div class="erro"><label>Email ou senha incorreto</label></div>
    <?php endif;
}
?>
</form>
    
</body>
</html>