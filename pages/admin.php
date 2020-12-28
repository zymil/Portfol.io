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
    $goBackPath = "Location: ../pages/list_gallery.php?subject=" . $subject_id;
    $adminRights=1;
    $subject_name=getSubjectNameFromID($subject_id);
    $result=getSubjectPhotos($subject_id);

    $username=$_SESSION['username'];

    if(($_SESSION['username'] != getStudentUsernameFromId( getAdmin_main($subject_id) )) 
        && ($_SESSION['username'] != getStudentUsernameFromId( getAdmin_sub1($subject_id) ) )
        && ($_SESSION['username'] != getStudentUsernameFromId( getAdmin_sub2($subject_id) ) )
        && ($_SESSION['username'] != getStudentUsernameFromId( getAdmin_sub3($subject_id) ) ) ) {
            $_SESSION['message'] = 'Administration Rights Required';
            $adminRights=0;
            header($goBackPath);
    }

    

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
        <a href="../pages/admin_add.php?subject=<?php echo $subject_id ?>" id="Admin">Add an Admin</a>
        <a href="../pages/admin_remove.php?subject=<?php echo $subject_id ?>" id="Admin">Remove an Admin</a>
    </nav>
    <p></p>
    <p></p>
    <form action="../actions/ActionUpload.php" method="post" enctype="multipart/form-data">

        <?php if (isset($_SESSION['message']) && $adminRights == 1) { ?>
            <div class="message">
                <?=$_SESSION['message']?>
            </div>
        <?php unset($_SESSION['message']); } ?>

        <input type="hidden" name="subject_name" value = "<?php echo $subject_name ?>" >
        <input type="hidden" name="subject_id" value = "<?php echo $subject_id ?>" >
        <input type="hidden" name="admin_page" value = 1 >
        <input type="file" name="photoToUpload" id = "photoToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>



    <nav id="pictures"> 
        <h3><?php echo $subject_name ?>'s Portfolio:</h3>
        <ul>
            <?php foreach($result as $row) { ?>
                <li>
                    <a href="/pictures/<?php echo $subject_name ?>/<?php echo $row['name'] ?>"><img id="pics" src="../pictures/<?php echo $subject_name ?>/<?php echo $row['name'] ?>"  alt="Picture"></a>
                        <form action="../actions/ActionDeletePhoto.php" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="photo_name" value="<?php echo $row['name'] ?>" >
                            <input type="hidden" name="subject_id" value="<?php echo $subject_id ?>" >
                            <input type="hidden" name="subject_name" value="<?php echo $subject_name ?>" >
                            <input type="submit" value="Delete Picture" name="admin"id="delete">

                        </form>
                </li>
            <?php } ?>
        </ul>
    </nav> 
    <?php footer() ?>
</body>
</html>