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
    <link href="../css/SubjectsStyle.css" rel="stylesheet">
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
    </nav>
    <section id="welcome">
        <h2>Hi there! </br>
            Remember, </br>
            Hard Work </br>
            pays-off </br>
        </h2>
    </section>
    <nav id="subjects"> 
        <h3><?=$_SESSION['username']?>'s Portfolio:</h3>
        <ul>
            <?php foreach ($result as $row){ ?>
                <li>
                    <a href="list_gallery.php?subject=<?php echo $row['id'] ?>"id="subs"><?php echo $row["name"] ?></a>
                </li>
            <?php } ?>
        </ul>
    </nav>
      
    <footer>
        <a href="https://github.com/zymil/Portfolio">@github/Projeto</a>
        <p>Copyright &copy; Grupo L, 2020</p>
    </footer>
</body>
</html>