<meta charset="UTF-8">

<?php


class Usuarios {

    private $nome;
    private $email;
    private $senha;
    private $nascimento;

    private $pdo;

    public function __construct(){
        try{
            $this->pdo = new PDO("mysql:dbname=projeto_login_oo;host:127.0.0.1", "root");
        }catch(PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
    }

    public function setCadastro($nome, $email, $senha, $nascimento){
        if($this->verificarEmail($email) == false){
        $sql = "INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, nascimento = :nascimento";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue (':senha', $senha);
        $sql->bindValue(':nascimento', $nascimento);
        $sql->execute();

        return true;
        }
    }

    public function Logar($email, $senha){
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }
    }

    public function verificarEmail2($email){
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

    private function verificarEmail($email){
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        }
    }

}
?>
