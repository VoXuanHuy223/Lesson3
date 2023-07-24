<?php
require_once '../config/database.php';
spl_autoload_register(function ($className) {
    require_once "../models/$className.php";
});
require_once '../controllers/permission/Permission.php';
$userModel = new userModel();
$userList = $userModel->getAllUsers();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            margin: 0 auto;
        }
    </style>
</head>

<body class="position-relative">
    <div class="container py-5">
        <a href="./homeByadmin.php" class="btn btn-primary">Home</a>
        <?php
        if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
            ?>
            <a class="btn btn-light" href="../controllers/logout.php">Logout</a>
        <?php } else { ?>
            <a href="./login.php?act=login" class="btn btn-light">Login</a>
            <a href="./register.php?act=register" class="btn btn-light">Register</a>
        <?php } ?>
    </div>
    <div class="main border col-md-6 row-justify-content-center  px-5 py-5 ">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>#</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <?php 
            $stt = 1;
            if ($_SESSION['role'] == "Admin") {
                foreach ($userList as $user) {


                    ?>
            <tbody>
                <tr>
                    <td>
                        <?php echo $stt++ ?>
                    </td>
                    <td>
                        <?php echo $user['full_name'] ?>
                    </td>
                    <td>
                        <?php echo $user['email'] ?>
                    </td>
                    <td>
                        <?php echo $user['role']; ?>
                    </td>
                    <td>
                        <a href="./editByAdmin.php?id=<?php echo $user['id']; ?>"><i
                                class="fa-regular fa-pen-to-square"></i></a>
                        <a href="#"><i
                                class="fa-solid fa-ellipsis border border-primary border-3 rounded-circle"></i></a>
                        <a href="#"><i class="fa-regular fa-file"></i></a>
                        <a href="./profileByAdmin.php?id=<?php echo $user['id']; ?>"><i
                                class="fa-regular fa-eye"></i></a>
                    </td>
                </tr>
            </tbody>
            <?php }
            } ?>
        </table>
    </div>

</body>

</html>