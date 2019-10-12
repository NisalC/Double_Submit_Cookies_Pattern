<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_COOKIE["PHPSESSID"]) && isset($_COOKIE["CSRF_TOKEN"]) &&
    isset($_POST['csrf_token'])) {

    if($_POST['csrf_token'] == $_COOKIE["CSRF_TOKEN"]){
        echo    "<script type='text/javascript'>
                    alert(\"You have completed the process successfully!\");
                </script>";
    }
    else{
        echo    "<script type='text/javascript'>
                    alert(\"Error! Operation failed\");
                </script>";
    }
}
else{
    if(!(isset($_POST['csrf_token']))){
        echo "Error! token not set";
    }
}

?>
