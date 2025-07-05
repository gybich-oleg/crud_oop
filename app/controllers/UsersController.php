<?php

namespace app\controllers;

use app\core\Response;
use app\models\User;

class UsersController
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
        $this->response->view('index_create');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = trim($_POST['first_name']);
            $lastName = trim($_POST['last_name']);
            $email = trim($_POST['email']);

            if ($this->userModel->createUser($firstName, $lastName, $email)) {
                $_SESSION['success_message'] = 'User created!';
            } else {
                $_SESSION['success_message'] = 'Error creating user!';
            }

            $this->response->redirect('/?controller=users&action=list');
        } else {
            $this->response->notFound();
        }
    }

    // Відображення списку користувачів
    public function list()
    {
        $users = $this->userModel->getAllUsers();
        $this->response->view('index_index', ['users' => $users]);
    }

    // Видалення користувача
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id && $this->userModel->deleteUser((int)$id)) {
            $_SESSION['success_message'] = 'Users deleted!';
        } else {
            $_SESSION['success_message'] = 'Error deleting user!';
        }
        $this->response->redirect('/?controller=users&action=list');
    }

    // Відображення форми редагування
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $user = $this->userModel->getUserById((int)$id);
            if ($user) {
                $this->response->view('edit_user', ['user' => $user]);
                return;
            }
        }
        $this->response->notFound();
    }

    // Оновлення користувача
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)$_POST['id'];
            $firstName = trim($_POST['first_name']);
            $lastName = trim($_POST['last_name']);
            $email = trim($_POST['email']);

            if ($this->userModel->updateUser($id, $firstName, $lastName, $email)) {
                $_SESSION['success_message'] = 'User updated!';
            } else {
                $_SESSION['success_message'] = 'Error updating user!';
            }
            $this->response->redirect('/?controller=users&action=list');
        } else {
            $this->response->notFound();
        }
    }
}
