<?php
require_once 'CLASSES/usuarios.php';
$u = new Usuario;
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel = "stylesheet" href="CSS/estilo.css">
    </head>
    <body>
        <div id="corpo-form-cad">
             <h1>Cadastrar</h1>
            <form method="POST">
                <input type="text" name="nome"  placeholder="Nome Completo" maxlength="30">
                <input type="text" name="numero_quarto" placeholder="Numero do quarto" maxlength="30">    
                <input type="email" name="email"  placeholder="email" maxlength="40">
                <input type="password" name="senha"  placeholder="Senha" maxlength="15">
                <input type="password" name="confimsenha"  placeholder="Confirmar Senha" maxlength="30">
                <input type="submit" value="Cadastrar">
            </form>
        </div>
        <?php
        if (isset($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $numero_quarto = addslashes($_POST['numero_quarto']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            $confimsenha = addslashes($_POST['confimsenha']);
            if (!empty($nome) && !empty($numero_quarto) && !empty($email) && !empty($senha) && !empty($confimsenha)) {
                $u->conectar("projeto_login", "localhost", "root", "");
                if ($u->msgErro == "") {
                    if ($senha == $confimsenha) {
                        if ($u->cadastrar($nome, $numero_quarto, $email, $senha)) {
                            ?>
                            <div id="msg-sucesso">
                                Email cadastrado com sucesso !Acesse para entrar!
                            </div>
                            <?php
                        } else {
                            ?>
                            <div id="msg-erro">
                                Email ja cadastrado tente novamente com um que ainda não foi inserido!
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                        <div id="msg-erro">
                            Senha e confirmar senha não correspondem !
                        </div>
                <?php
            }
        } else {
             ?>
                        <div id="msg-erro">
                              <?php echo "Erro: .$u->msgErro";?>
                        </div>
                        <?php
         
        }
    } else {
        ?>
                        <div id="msg-erro">
                              Preencha todos os campos !
                        </div>
                        <?php
   
    }
}
?>
    </body>    


</html> 