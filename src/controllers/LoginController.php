<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\LoginHelper;

class LoginController extends Controller {

    public function signin() {
        $flash = '';
        if( !empty($_SESSION['flash']) ){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('login', ['flash' => $flash]);
    }
    public function signinAction() {
        //Recebendo os dados email e password enviados do form
        $email = filter_input( INPUT_POST, 'email', FILTER_VALIDATE_EMAIL );
        $password = filter_input( INPUT_POST, 'password' );
        //Fazendo a verificação de email e senha foram enviados
        if( $email && $password ) {
            $token = LoginHelper::verifyLogin( $email, $password );
            if( $token ) {
                $_SESSION['token'] = $token;
                $this->redirect('/');
            } else {
                $_SESSION['flash'] = 'E-mail e/ou senha não conferem';
                $this->redirect('/login');
            }
        } else {
            $_SESSION['flash'] = 'Digite os campos de e-mail e/ou senha.';
            $this->redirect('/login');
        }
    }
    public function signup() {
        echo 'register';
    }

}