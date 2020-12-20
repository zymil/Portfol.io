<?php 

    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username'] = $username;

    /*zero segurança xD  vamos ter que fazer tanto metodo
    inserir aqui sql methods para verificar users, vamos fazer
    com admin tmb n é?  temos de fazer duas paginas diferentes
    uma para cada, maaaas o que vai fazer o admin mesmo? 
    1. Tem acesso a toda a base de dados
    2. Tem uma lista de todos os alunos e caractristicas deles: 
nr de uploads, class id ... uma table for sure 
    3. Pode apagar utilizadores (Maybe?)  */

?>