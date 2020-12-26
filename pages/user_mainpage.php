<?php 

    include_once('../database/connect.php');
    include_once('../cookies/cookie.php');
    include_once('../database/students.php');
    include_once('../database/subjects.php');

    if(!isset($_SESSION['username']) ) {
        $_SESSION['message'] = 'Please Login first!';
        header('Location: login.php');
    }
    $username=$_SESSION['username'];
    $result=getSubjects();

?>
<!DOCTYPE html>
<html lang="en">
<head>
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
        <a href="../pages/subject_registration.php" id="Add">Add new Subject</a>
        <a href="../pages/admin.php" id="Admin">Admin Tools</a>
    </nav>
    <section id="welcome">
        <h2>Hi there! </br>
            Remember, </br>
            Hard Work </br>
            pays-off </br>
        </h2>
    </section>
    <section id="subjects"> 
        <h3><?=$_SESSION['username']?>'s Portfolio:</h3>
        <ul>
            <?php foreach ($result as $column){ ?>
                <li>
                    <a href=""><?php echo $column["name"] ?></a>
                </li>
            <?php } ?>
        </ul>
    </section> 
    <!-- Aqui entra o menu dinamico que apresenta as cadeiras adicionadas -->
        
    <form action="../actions/ActionUpload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>






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