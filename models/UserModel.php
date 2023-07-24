<?php 

class UserModel extends Model 
{
    public function login($email,$password) {
        $sql = parent::$connection->prepare("SELECT * FROM user WHERE email = ?");
        $sql->bind_param('s', $email);
        $user = parent::select($sql)[0];
        if(password_verify($password, $user['password'])){
            return $email;
        }else{
            return false;
        }
    }

    public function getUserById($id)
    {
        $sql = parent::$connection->prepare('SELECT * FROM user WHERE id=?');
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }

    public function register($fullName,$email,$password,$role){
        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = parent::$connection->prepare("INSERT INTO `user`(`full_name`, `email`,`password`,`role`) VALUES (?,?,?,?)");
        $sql->bind_param('ssss',$fullName,$email,$password,$role);
        return $sql->execute();
    }

    public function getAllUsers()
    {
        $sql = parent::$connection->prepare('SELECT * FROM user');
        return parent::select($sql);
    }


    public function checkUser($email,$password) {
        $sql = parent::$connection->prepare("SELECT * FROM user WHERE `email` = ?");
        $sql->bind_param('s',$email);
        $user = parent::select($sql)[0];
        if(password_verify($password, $user['password'])){
            return $user;
        }else{
            return false;
        }
        
    }

    public function editUserByAdmin($fullName, $email, $password, $role,$id){
        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = parent::$connection->prepare("UPDATE `user` SET `full_name`=?
        ,`email`=?,`password`=?,`role`=? WHERE `id` = ?");

        $sql->bind_param('ssssi',$fullName, $email, $password, $role,$id);
        return $sql->execute();
    }
    public function editUserByUser($fullName, $email, $password,$id){
        $sql = parent::$connection->prepare("UPDATE `user` SET `full_name`=?
        ,`email`=?,`password`=? WHERE `id` = ?");

        $sql->bind_param('sssi',$fullName, $email, $password,$id);
        return $sql->execute();
    }

}
