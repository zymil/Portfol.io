<?php 
/*php comenta diferente! test*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- É assim que se comenta, vai adicionando notas! -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/LoginStyle.css" rel="stylesheet">
    <title> Portfol.io </title>
</head>

<body>
    <header>
        <h1>Portfol.io</h1>
        <!-- <img src="../img/rememberthealt.png" alt="good job"> -->
    </header>
    <article>
        <h2>
            Register now and start managing your classes smarter.
            <p>By registering you get the chance to organize your 
             class notes, sketches and schedule into one single place.</p>
            <p>Register with your credentials as well as your class timetables and class id.
             (As other students who are taking the same class will be able to access your snippets and vice-versa, only
             if you want to do so of course !</p>
        </h2>
    </article>
    <form action="../actions/ActionLogin.php" method="post">
        <h2>Log in</h2>
        <label>
            User Name <input type="text" name="username">
        <p></p>
            Password <input type="password" name="password">
        </label>
        <input type="submit" value="LOG IN">
    </form>
    <div id="newUser">
        New User?
        <form action="register.php">
            <input type="submit" value="SIGN UP">
        </form>
    </div>
   <footer>
    <a href="https://github.com/zymil/Portfolio">@github/Projeto</a>
    <p></p>
    <a href="../sql/createDatabase.php">Criar a base de dados </a>
    <p>Copyright &copy; Grupo L, 2020</p>
</footer>
</body>
</html>