<?php
Class Usuario
{
    private $pdo;
    public $msgErro = "";
    Public function  conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try{
        
            $pdo = new PDO("mysql:dbname=" .$nome.";host=".$host,$usuario, $senha);
             
        } catch (PDOException $e) {

            $msgErro = $e ->getMessage();
        }
       
    }
    
     Public function  cadastrar($nome, $numero_quarto, $email, $senha)
    {
        global $pdo;
        $sql = $pdo -> prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql ->bindValue(":e" ,$email);
        $sql -> execute();        
        if($sql ->rowCount()> 0 )
        {
            return false ;
        }
        else
        {
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, numero_quarto, email, senha)VALUES(:n, :t, :e, :s )");
            $sql ->bindValue(":n" ,$nome);
            $sql ->bindValue(":t" ,$numero_quarto);
            $sql ->bindValue(":e" ,$email);
            $sql ->bindValue(":s" , md5($senha));
            $sql -> execute();
            return true;
        }
    }
    
     Public function  logar($email, $senha)
    {
        global $pdo;
        $sql = $pdo ->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql ->bindValue(":e" ,$email);
        $sql ->bindValue(":s" , md5($senha));
        $sql -> execute();
        if($sql ->rowCount()> 0 )
        {
           $dado = $sql ->fetch();
           session_start();
           $_SESSION['id_usuario'] = $dado['id_usuario'];
           return true;
        }
        else
        {
              return false ;
        }
    }
}

?>