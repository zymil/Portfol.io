<?php 
    include_once('../template/template.php');
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
    $subject_name=getSubjectNameFromID($subject_id);
    $result=getSubjectPhotos($subject_id);

    $username=$_SESSION['username'];

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/MainpageStyle.css" rel="stylesheet">
    <link href="../css/GalleryStyle.css" rel="stylesheet">
    <?php fontAndTitle(); ?>
</head>

<body>
    <header>
        <h1><a href="../pages/user_mainpage.php"> Portfol.io</a></h1>
    </header>
    
    <div id="username">
        <p>Logged in as: <?= $_SESSION['username'] ?></p>
        <a href="../actions/ActionLogout.php">Logout</a>
    </div>


    <nav id="operations">
        <a href="user_mainpage.php" id="Back">Go back</a>
        <a href="../pages/admin.php?subject=<?php echo $subject_id ?>" id="Admin">Admin Tools</a>
    </nav>
    <p></p>
    <p></p>
    <form action="../actions/ActionUpload.php" method="post" enctype="multipart/form-data">

        <?php if (isset($_SESSION['message'])) { ?>
            <div class="message">
                <?=$_SESSION['message']?>
            </div>
        <?php unset($_SESSION['message']); } ?>

        <input type="hidden" name="subject_name" value="<?php echo $subject_name ?>" >
        <input type="hidden" name="subject_id" value="<?php echo $subject_id ?>" >
        <input type="file" name="photoToUpload" id="photoToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    
    <nav id="pictures"> 
        <h3><?php echo $subject_name ?>'s Portfolio:</h3>
        <ul>
            <?php foreach($result as $row) { ?>
                <li>
                    <a href="/pictures/<?php echo $subject_name ?>/<?php echo $row['name'] ?>"><img id="pics" src="../pictures/<?php echo $subject_name ?>/<?php echo $row['name'] ?>"  alt="Picture"></a>
                    <span><?php echo $row["name"]?></span>
                </li>
            <?php } ?>
        </ul>
    </nav> 
    <?php footer() ?>
</body>
</html>