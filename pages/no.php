<?php 
/*php comenta diferente! test*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- É assim que se comenta, vai adicionando notas! -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/no.css" rel="stylesheet">
    <title> Portfol.io </title>
</head>

<body>
    <header>
        <h1>Portfol.io</h1>
        <!-- <img src="../img/rememberthealt.png" alt="good job"> -->
    </header>
    <article>
        <h2>
            That User/Password doesn't exist. Check again!
        </h2>
    </article>
    <form action="../actions/ActionLogin.php" method="post">
        <h3>Log in</h3>
        <label>
            User Name <input type="text" name="username">
        <p></p>
            Password <input type="password" name="password">
        </label>
        <p></p>
        <input type="submit" value="Log In">
    </form>
    <div id="newUser">
        New User?
        <form action="registration.php">
            <input type="submit" value="Sign Up">
        </form>
    </div>
   <footer>
    <a href="https://github.com/zymil/Portfolio">@github/Projeto</a>
    <p></p>
    <a href="../database/createDatabase.php">Criar a base de dados </a>
    <p>Copyright &copy; Grupo L, 2020</p>
</footer>
</body>
</html>