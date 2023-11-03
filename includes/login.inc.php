<?php

if(isset($_POST["submit"])) {

    // grabing the data from html
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"]; 

    // instantiate signupcontr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";

    $login = new LoginContr($uid, $pwd);

    // running all error handlers
    $login->loginUser();

    // back to front page
    header("location: ../index.php?error=none");
}   