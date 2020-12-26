<?php 

    include_once('../database/connect.php');
    include_once('../cookies/cookie.php');

    if(!isset($_SESSION['username']) ) {
        $_SESSION['message'] = 'Please Login first!';
        header('Location: login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- É assim que se comenta, vai adicionando notas! -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/MainpageStyle.css" rel="stylesheet">
    <title> Portfol.io </title>
    
</head>

<body>
    <header>
        <h1><a href="../pages/user_mainpage.php"> Portfol.io</a></h1>
    </header>
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="message">
            <?=$_SESSION['message']?>
        </div>
    <?php unset($_SESSION['message']); } ?>
    
    <div id="username">
        <p>Logged in as: <?= $_SESSION['username'] ?></p>
        <a href="../actions/ActionLogout.php">Logout</a>
    </div>
    <nav id="operations">
        <a href="user_mainpage.php" id="Back">Go back</a>

    </nav>
    <section id="welcome">
        <h2>Hi there! </br>
            Remember, </br>
            Hard Work </br>
            pays-off </br>
        </h2>
    </section>
        <section id="accountInfo"> 
            <h3><?=$_SESSION['username']?>'s Portfolio:</h3>
       
            <!-- Aqui entra o menu dinamico que apresenta as cadeiras adicionadas -->



        </section> 
        
        <!-- <section id="Exemplo">
            <h2>Exemplo</h2>
            <div id="ex">
              
            </div>
        </section> -->

      
    <footer>
        <a href="https://github.com/zymil/Portfolio">@github/Projeto</a>
        <p>Copyright &copy; Grupo L, 2020</p>
    </footer>
</body>
</html>