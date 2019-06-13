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
        <div id="corpo-form">
        <h1>Entar</h1>
            <form method="POST" >
                <input type="email" placeholder="Usuario" name="email">
                <input type="password"  placeholder="Senha" name="senha">
        <input type="submit" value="Acessar">
        
        <a href="cadastrar.php">Ainda não e cadastrado?<strong></strong>Cadastra-se</a>
        </form>
        </div>
        <?php
        if (isset($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
// verificar preenchimento
            if (!empty($email) && !empty($senha)) 
            {
                $u->conectar("projeto_login", "localhost", "root", "");
                if ($u->msgErro == "") {//está tudo ok 
                if ($u->logar($email, $senha)) 
                {
                    header("location: AereaPrivada.php");
                }
               
                else 
                {
                     ?>
                            <div id="msg-erro">
                                   Email e/ou senha invalida
                            </div>
                            <?php
                 
                }
                }
                else
                {
                     ?>
                        <div id="msg-erro">
                              <?php echo "Erro: .$u->msgErro";?>
                        </div>
                        <?php
                }
  
 
                } else {
                      ?>
                            <div id="msg-erro">
                            Preencha todos os campos                            
                            </div>
                            <?php
                    
                }
        }
        
        ?>
    </body>
    </html>