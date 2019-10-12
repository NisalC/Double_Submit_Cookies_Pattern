<?php

$username = "admin";
$password = "admin";

if(isset($_POST['username']) && isset($_POST['password'])){
    if($_POST['username'] == $username && $_POST['password'] == $password){
        session_start();
        session_destroy();
        session_unset();
        session_start();
        session_regenerate_id(true);

        $csrfToken = base64_encode(hash("sha256", uniqid(mt_rand(1000, 9999).microtime(), true), true));

        $cookie_name = "CSRF_TOKEN";
        $cookie_value = $csrfToken;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/");

        echo    "<script type='text/javascript'>
                    window.location = \"add_user.html\";
                </script>";
    }
    else{
        echo    "<script type='text/javascript'>
                    window.location = \"index.html\";
                    alert(\"Either the username or the password is incorrect. Please provide valid login credentials.\");
                </script>";
    }
}
else{
    echo "not set";
}
?>
