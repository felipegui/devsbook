<?php
namespace src\helpers;

use \src\models\User;

//Classe específica de verificações de login
class LoginHelper {
    
    public static function checkLogin() {
        if( !empty($_SESSION['token']) ) {
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->one();
            if( count($data) > 0 ) {

                $loggedUser = new User();
                $loggedUser->setId($data['id']);
                $loggedUser->setEmail($data['email']);
                $loggedUser->setName($data['name']);

                return $loggedUser;

            }
        } 
        return false;
    } 
}
?>