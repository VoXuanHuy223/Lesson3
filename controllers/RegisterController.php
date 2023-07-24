<?php

    require_once '../config/database.php';
    spl_autoload_register(function ($className)
    {
    require_once "../models/$className.php";
    });

session_start();
class Register{
    public function register()  {
        $userModel= new UserModel();
        if(isset($_POST['email'])){
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = "User";
            $_SESSION['role'] = $role;
            if(empty($fullname) || empty($email) || empty($password)){
               echo "Register Unsuccessfully";
            } elseif($userModel->register($fullname,$email,$password,$role)){
                header('location: ./login.php');
            }
        }
    }
}