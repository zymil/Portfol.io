<?php 
  include_once('../cookies/cookie.php');
  include_once('../database/accounts.php');
  include_once('../database/connect.php');





    /*zero segurança xD  vamos ter que fazer tanto metodo
    inserir aqui sql methods para verificar users, vamos fazer
    com admin tmb n é?  temos de fazer duas paginas diferentes
    uma para cada, maaaas o que vai fazer o admin mesmo? 
    1. Tem acesso a toda a base de dados
    2. Tem uma lista de todos os alunos e caractristicas deles: 
  nr de uploads, class id ... uma table for sure 
    3. Pode apagar utilizadores (Maybe?)  
    No Login temos de verificar which one he is e redirect para 
    a pagina admnin_mainpage ou user_mainpage que vao ser ligeiramente 
    diferentes
    
    Deixamos o admin para o fim e melhor
    */

    $username = $_POST['username'];
    $password = $_POST['password'];

    /*aqui vai estar uns quantos IF's para decidir que tipo de user é
    para já so da para o user
    */
    if (checkStudent($username, $password)) {
      $_SESSION['username'] = $username;
      header('Location: ../pages/user_mainpage.php'); 
    } else {
      header('Location: ../pages/no.php');
    }
?>