<?php
    require_once '../config/database.php';
    spl_autoload_register(function ($className)
    {
    require_once "../models/$className.php";
    });

session_start();

    
 class Login
{


    public function login() {
        if (!empty($email)  && !empty($password)) {
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userModel= new UserModel();
            if($userModel->login($email,$password)){
                $checkRole = $userModel->checkUser($email,$password);
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $checkRole['role'];
                $_SESSION['id'] = $checkRole['id'];
                $_SESSION['password'] = $password;
                if(isset($_POST['remember_me'])){
                    setcookie('email',$_POST['email'],time() + 3600 /6);
                    
                }
                if($_SESSION['role'] == "Admin"){
                    header("location: ./homeByAdmin.php");
                }else{
                    header("location: ./homeByUser.php");

                }
                
            }else{
                echo "Email or Password is incorrect";
            }
        
        }
    }
}
    
}