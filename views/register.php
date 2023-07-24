<?php
require_once '../config/database.php';
require_once '../controllers/RegisterController.php';

$register = new Register();
$register->register();

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
        <a href="./login.php?act=login" class="btn btn-light">Login</a>
        <a href="./register.php?act=register" class="btn btn-primary">Register</a>

        <div class="main border col-md-6 row-justify-content-center  px-5 py-5 ">

            <form method="POST" action="" id="formLogin">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="passwordConfirm" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" required>
                </div>
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="role" id="role" value="User">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>

    
    <script>
        const form = document.getElementById('formLogin');
        form.onsubmit = function(event) {
            const password = form.elements.password.value;
            const confirmPassword = form.elements.passwordConfirm.value;

            if (password !== confirmPassword) {
                alert("Password and Confirm Password do not match!");
                event.preventDefault(); 
            }
        };
    </script>

</body>

</html>