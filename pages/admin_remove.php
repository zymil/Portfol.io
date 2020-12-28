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

    $subject_id = $_GET['subject'];
    $subject_name = getSubjectNameFromID($subject_id);
    $result=getSubjectData($subject_id);
    $goBackPath = "Location: ../pages/admin.php?subject=" . $subject_id;

    if($_SESSION['username'] != getStudentUsernameFromId( getAdmin_main($subject_id) )) {
            $_SESSION['message'] = 'Only The Creator Can add New Administrators';
            header($goBackPath);
            die();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- É assim que se comenta, vai adicionando notas! -->
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
        <a href="../pages/admin.php?subject=<?php echo $subject_id ?>" id="Back">Go back</a>
        <h3>Admin users added: </h3>
    </nav>
    <form action="../actions/ActionAdminRemove.php" method="POST" id="formremove">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="message">
                <?=$_SESSION['message']?>
            </div>
        <?php unset($_SESSION['message']); } ?>

        <ul>
            <?php foreach($result as $row) { ?>
                <form></form>
                <?php if($row["admin_sub1"] != NULL) { ?>
                        <li>
                        <span> <?php echo getStudentUsernameFromId($row["admin_sub1"])?></span>
                                <form action="../actions/ActionAdminRemove.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="subject_id" value="<?php echo $subject_id ?>" >
                                    <input type="hidden" name="student_id" value="<?php echo $row["admin_sub1"] ?>" >
                                    <input type="submit" value="remove" name="admin_sub1"id="adminremove">

                                </form>
                        </li>
                <?php } ?>
                <p> </p>
                <?php if($row["admin_sub2"] != NULL) { ?>
                        <li>
                        <span> <?php echo getStudentUsernameFromId($row["admin_sub2"])?></span>
                                <form action="../actions/ActionAdminRemove.php" method="post" enctype="multipart/form-data">

                                <input type="hidden" name="subject_id" value="<?php echo $subject_id ?>" >
                                    <input type="hidden" name="student_id" value="<?php echo $row["admin_sub2"] ?>" >
                                    <input type="submit" value="remove" name="admin_sub2"id="adminremove">

                                </form>
                        </li>
                <?php } ?>
                <p> </p>
                <?php if($row["admin_sub3"] != NULL) { ?>
                        <li>
                        <span> <?php echo getStudentUsernameFromId($row["admin_sub3"])?></span>
                                <form action="../actions/ActionAdminRemove.php" method="post" enctype="multipart/form-data">

                                <input type="hidden" name="subject_id" value="<?php echo $subject_id ?>" >
                                    <input type="hidden" name="student_id" value="<?php echo $row["admin_sub3"] ?>" >
                                    <input type="submit" value="remove" name="admin_sub3"id="adminremove">

                                </form>
                        </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </form>

    <?php footer() ?>
</body>
</html>