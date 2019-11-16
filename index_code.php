<html>
    <title>Login</title>
    <body>
        <?php
        $usr = "admin";
        $psw = "password";
        $username = '$_POST[email]';
        $password = '$_POST[pwd]';
        //$usr == $username && $psw == $password
        session_start();
        if ($_SESSION['login']==true || ($_POST['username']=="$usr" && $_POST['password']=="password")) {
            echo "Welcome :)";
            $_SESSION['login']=true;
        }else {
            echo "incorrect login";
        }
        ?>

        <form name="input" action="index.html" method="get">
            <input type="submit" value="Home">
        </form>
    </body>
</html>