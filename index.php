<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="description" content="Login">
    <meta name="author" content="Lorenzo Angelino aka MrLolok">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: white;
        }
    </style>
</head>

<body>
    <div id="container-login">
        <div id="title">
            <i class="material-icons lock">lock</i> Login
        </div>
<?php if(isset($err)){ echo $err; } ?>   
        <form  method="post" target="_self">
            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="username" placeholder="Email Id" type="text" name="email" required class="validate" autocomplete="off">
            </div>

            <div class="clearfix"></div>

            <div class="input">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <input id="password" placeholder="Password" type="password" name="pwd" required class="validate" autocomplete="off">
            </div>

            <div class="remember-me">
                <input type="checkbox">
                <span style="color: #DDD">Remember Me</span>
            </div>

            <input type="submit" name="login" value="Log In" />
        </form>
		<?php
session_start();    // Session start
 
if(isset($_POST['login']))    // Check form submit with IF Isset function
{
$username="admin";    // set variable value
$password="123";        // set variable value
if($_POST['email']==$username && $_POST['pwd']==$password)   // Check Given user name, password and Variable user name password are same
{
$_SESSION['username']=$username;    // set session from given user name
header('location:mainpage.php');
}
else
{
header('location:invalid.php');
}
}
?>

        <div class="forgot-password">
            <a href="#">Forgot your password?</a>
        </div>
        <div class="privacy">
            <a href="#">Privacy Policy</a>
        </div>

        <div class="register">
            Don't have an account yet?
            <a href="/register.html"><button id="register-link">Register here</button></a>
        </div>
    </div>
</body>

</html>
