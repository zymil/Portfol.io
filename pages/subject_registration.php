<?php 

    include_once('../database/connect.php');
    include_once('../cookies/cookie.php');
    include_once('../template/template.php');

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
    <link href="../css/PushFooterDown.css" rel="stylesheet">
    <link href="../css/GalleryStyle.css" rel="stylesheet">
    <?php fontAndTitle(); ?>
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
        <a href="../pages/user_mainpage.php" id="Back">Go back</a>
    </nav>
    <form action="../actions/ActionSubjectRegistration.php" method="POST">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="message">
                <?=$_SESSION['message']?>
            </div>
        <?php unset($_SESSION['message']); } ?>
        <h3>Add a new Subject to your Portfolio!</h3>
        <label>
            Subject Name:  <input type="text" name="subject_name"> 
        </label>
        <p></p>
        <input type="submit" value="Submit"id="submitphoto">
    </form>

    <?php footer() ?>
</body>
</html>