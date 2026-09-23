<?php

namespace App\Controllers;

use MF\Controller\Action;
use App\Models\UserModel;
class IndexController extends Action
{
    public function index()
    {
        $this->render('index');
    }
    public function login()
    {
        $user = new UserModel();
        $this->view->dados = $user->findUserById(1);
        $this->render('login');
    }
}
