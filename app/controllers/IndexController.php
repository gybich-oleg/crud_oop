<?php

namespace app\controllers;

use app\core\Response;
use app\models\User;

class IndexController
{
    private Response $response;
    private User $userModel;

    public function __construct()
    {
        $this->response = new Response();
        $this->userModel = new User();
    }

    public function index()
    {
        $users = $this->userModel->getAllUsers();
        $this->response->view('index_index', ['users' => $users]);
    }
}
