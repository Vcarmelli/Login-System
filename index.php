<?php
    session_start();
?>

<!DOCTYPE html>
<!-- LEGGO SEPT 22, 2023 -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
            <h2 class="name">Vash's Auto Paint</h2>
            <nav class="nav">
                <a href="index.php">Home</a>
                <a href="#">Sales</a>
                <a href="#">Contact Us</a>

                <div class="header-greet">
                    <?php    
                        if(isset($_SESSION["userid"])) {
                    ?>        
                            <span><a href="#">WELCOME, <?php echo $_SESSION["useruid"]; ?></a></span>
                            <!-- <button class="btn-header">Login</button> -->
                    <?php
                        }
                        else {
                    ?>
                            <!-- <li><a href="#">SIGN UP</a></li>
                            <li><a href="#" class="header-login-a">LOGIN</a></li> -->
                            <!-- <button class="btn-header">Login</button> -->
                    <?php
                        }
                    ?>    
                </div>
                <button class="btn-header">Login</button>
            </nav>
    </header>

    <section class="index">
        <div class="wrapper">
            <div class="index-signup">
                <h4 class = "index-text">SIGN UP</h4>
                <p class="index-desc">Don't have an account yet? Sign up here!</p>
                <form action="includes/signup.inc.php" method="post">
                    <label for="uid">Username</label>
                    <input type="text" name="uid" placeholder="Enter your username" id="uid">
                    <label for="pwd">Password</label>
                    <input type="password" name="pwd" placeholder="Enter your password" id="pwd">
                    <label for="pwdrep">Re-enter Password</label>
                    <input type="password" name="pwdrepeat" placeholder="Repeat password" id="pwdrep">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Enter your e-mail" id="email">
                    <br>
                    <button  type="submit" name="submit" class="btn-signup" >SIGN UP</button>
                </form>
            </div>

            <div class="index-login">
                <h4 class = "index-text">LOGIN</h4>
                <p class="index-desc">Don't have an account yet? Sign up here!</p>
                <form action="includes/login.inc.php" method="post">
                    <label for="uid-login">Username</label>
                    <input type="text" name="uid-login" placeholder="Enter your username" id="uid-login">
                    <label for="pwd-login">Password</label>
                    <input type="password" name="pwd-login" placeholder="Enter your password" id="pwd-login">
                    <br>
                    <button type="submit" name="submit" class="btn-login">LOG IN</button>
                </form>
            </div>
        </div>
    </section>
 
</body>
</html>