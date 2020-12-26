<?php

    //in development
    function savePic($username){
        move_uploaded_file($_FILES['pic']['tmp_name'], "../pictures/$username.jpg");
    }

?>