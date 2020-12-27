<?php 

    include_once('../database/connect.php');
    include_once('../cookies/cookie.php');
    include_once('../database/students.php');
    include_once('../database/subjects.php');
    include_once('../database/photos.php');

    if(!isset($_SESSION['username']) ) {
        $_SESSION['message'] = 'Please Login first!';
        header('Location: login.php');
    }
    $subject_id=$_GET['subject'];
    //echo $subject_id;
    $subject_name=getSubjectNameFromID($subject_id);
    //echo $subject_name;
    $results=getSubjectPhotos($subject_id);
    echo $results;
    var_dump($results);
    print_r($results);

    $username=$_SESSION['username'];

    

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
    <p></p>
    <p></p>
    <form action="../actions/ActionUpload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    
    <section id="pictures"> 
        <h3><?php echo $subject_name ?>'s Portfolio:</h3>

        <section class="list">
            <?php foreach($result as $row) { ?>
                <article>
                    <img src="pictures/<?php echo $subject_name ?>/<?php $row['name'] ?>.jpg" alt="">
                    <span><?php echo $row["id"]?></span>
                </article>

            <?php } ?>

        </section>

    </section> 
   
        
    
    <footer>
        <a href="https://github.com/zymil/Portfolio">@github/Projeto</a>
        <p>Copyright &copy; Grupo L, 2020</p>
    </footer>
</body>
</html>