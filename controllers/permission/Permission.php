<?php 

require_once '../config/database.php';
spl_autoload_register(function ($className)
{
require_once "../models/$className.php";
});
$user = new UserModel();
session_start();


    if(isset($_SESSION['email'])== false){
        header('location: ./login.php');
    }else{
        if(isset($_SESSION['role'])==true){
            $permission = $_SESSION['role'];
            if($permission == "Admin"){
                
            }else{
                echo "User";
            }
        }
    }

