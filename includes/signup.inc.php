<?php

if(isset($_POST["submit"])) {

    // grabing the data from html
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"]; 
    $pwdrepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];  

    // instantiate signupcontr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";

    $signup = new SignupContr($uid, $pwd, $pwdrepeat, $email);

    // running all error handlers
    $signup->signupUser();

    // back to front page
    header("location: ../index.php?error=none");
}   