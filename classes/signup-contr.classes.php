<!-- database controller -->

<?php

class SignupContr extends Signup {
    private $uid;
    private $pwd;
    private $pwdrepeat;
    private $email;

    public function __construct($uid, $pwd, $pwdrepeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdrepeat = $pwdrepeat;
        $this->email = $email;
    }

    public function signupUser() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        if($this->invalidUid() == false) {
            header("location: ../index.php?error=username");
            exit();
        }

        if($this->invalidEmail() == false) {
            header("location: ../index.php?error=email");
            exit();
        }    

        if($this->pwdMatch() == false) {
            header("location: ../index.php?error=password");
            exit();
        }

        if($this->uidTakenCheck() == false) {
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    //methods for error handling of inputs
    private function emptyInput() {
        // checks if all input are filled
        $result = false;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdrepeat) || empty($this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result; 
    }

    private function invalidUid() { 
        // checks the format of username
        $result = false;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result; 
    }

    private function invalidEmail() { 
        // checks the format of email address
        $result = false;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result; 
    }

    private function pwdMatch() {
        // checks if passwords are match
        $result = false;
        if($this->pwd !== $this->pwdrepeat) {
            $result = false; 
        }
        else {
            $result = true;
        }
        return $result; 
    }

    private function uidTakenCheck() {
        // database chack if same username
        $result = false;
        if(!$this->checkUser($this->uid, $this->email)) {
            $result = false; 
        }
        else {
            $result = true;
        }
        return $result; 
    }
} 