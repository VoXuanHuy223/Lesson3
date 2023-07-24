<?php
require_once '../config/database.php';
spl_autoload_register(function ($className)
{
require_once "../models/$className.php";
});
require_once '../controllers/LoginController.php' ;

$login = new Login();
$login->login();
if(isset($_COOKIE['email']) && isset($_SESSION['password'])){
    $email_login = $_COOKIE['email'];
    $pass_login = $_SESSION['password'];
}else{
    $email_login = "";
    $pass_login = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="position-relative">
    <div class="container py-5">
    <a href="./homeByadmin.php" class="btn btn-light">Home</a>
        <?php
            if( isset($_SESSION['email']) && !empty($_SESSION['email']) )
                {
                ?>
                    <a class="btn btn-light" href="../controllers/logout.php">Logout</a>
                <?php }else{ ?>
                    <a href="./login.php" class="btn btn-primary">Login</a>
                    <a href="./register.php" class="btn btn-light">Register</a>
                <?php } ?>

        <div class="main border col-md-6 row-justify-content-center  px-5 py-5 ">

            <form method="POST" action="./login.php">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email_login; ?>" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="<?php echo $pass_login; ?>" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>


</body>

</html>