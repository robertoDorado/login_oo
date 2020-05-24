<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body class="corpo">

<script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>

<form method="post" class="form" style="height:500px;">

    <h1>Cadastre-se</h1>

    <span>Nome:</span><br>
    <input type="text" name="nome" autofocus required><br><br>

    <span>Email:</span><br>
    <input type="email" name="email" required><br><br>

    <span>Senha:</span><br>
    <input type="password" name="senha" required><br><br>

    <span>Nascimento:</span><br>
    <input type="date" name="data" id="date" required><br><br>

    <input type="submit" value="Cadastrar"><button class="btn-login"><a href="login.php">Login</a></button>

   <?php
require_once "config.php";

if(isset($_POST['nome']) && empty($_POST['nome']) == false){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));
    $nascimento = addslashes($_POST['data']);

    $usuarios = new Usuarios();
    $verifica = $usuarios->verificarEmail2($email);
    $cadastro = $usuarios->setCadastro($nome, $email, $senha, $nascimento);

    if($verifica == true):
    ?>
    <div style="margin-top:20px;padding-left:20px;" class="erro"><label>E-mail já cadastrado</label></div>
    <?php endif;

    if($cadastro == true){
        header("Location: login.php");
    }
    
}
?>

</form>
    
</body>
</html>