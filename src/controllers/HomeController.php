<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\LoginHelper;

class HomeController extends Controller {

    private $loggedUser;

    public function __construct() {

        $this->loggedUser = LoginHelper::checkLogin();

        if( $this->loggedUser === false ) {
            $this->redirect('/login');
        }
    }

    public function index() {
        $this->render('home', ['nome' => 'Bonieky']);
    }
}