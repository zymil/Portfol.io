<?php 
    include_once('../data/connect.php');
    include_once('../cookies/cookie.php');
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
        <h1>Portfol.io</h1>
        <!-- <img src="../img/rememberthealt.png" alt="good job"> -->
    </header>
    <div id="content">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="message">
                <?=$_SESSION['message']?>
            </div>
        <?php unset($_SESSION['message']); } ?>
        <section id="welcome">
            <h2>Hi there! </br>
            Remember, </br>
            Hard Work </br>
            pays-off </br></h2>
        </section>
        <section id="aboutBranch">
            <h2>Exemplo</h2>
            <div id="aboutBranchList">
              
            </div>
        </section>
        </div>

    <footer>
        <a href="https://github.com/zymil/Portfolio">@github/Projeto</a>
        <p>Copyright &copy; Grupo L, 2020</p>
</footer>
</body>
</html>