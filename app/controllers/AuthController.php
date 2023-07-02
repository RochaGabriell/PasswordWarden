<?php

require_once "app/models/AuthDAO.php";

class AuthController
{

    private $authDAO;

    public function __construct()
    {
        $this->authDAO = new AuthDAO();
    }

    public function login()
    {
        if ($_SESSION['user']) {
            header("Location: index.php?action=home");
        }
        require_once "app/views/auth/login.php";
    }

    public function loginVerify($email, $password)
    {
        $user = $this->authDAO->getUserByEmail($email);

        if ($user) {
            if ($password == $user['password']) {
                $_SESSION['user'] = $user;
                header("Location: index.php?action=home");
            } else {
                $_SESSION['error'] = "Senha incorreta";
                header("Location: index.php?action=login");
            }
        } else {
            $_SESSION['error'] = "Usuário não encontrado";
            header("Location: index.php?action=login");
        }
    }

    public function create()
    {
        if ($_SESSION['user']) {
            header("Location: index.php?action=home");
        }
        require_once "app/views/auth/create.php";
    }

    public function createVerify($username, $email, $password)
    {
        $user = $this->authDAO->getUserByEmail($email);

        if ($user) {
            $_SESSION['error'] = "Usuário já cadastrado";
            header("Location: index.php?action=create");
        } else {
            $this->authDAO->createUser($username, $email, $password);
            $_SESSION['success'] = "Usuário cadastrado com sucesso";
            header("Location: index.php?action=login");
        }
    }

    public function update($email)
    {
        $user = $this->authDAO->getUserByEmail($email);
        require_once "app/views/auth/update.php";
    }

    public function updateVerify($username, $email, $password)
    {

        $id_user = $_SESSION['user']['id_user'];
        $this->authDAO->updateUser($username, $email, $password, $id_user);
        $_SESSION['success'] = "Usuário alterado com sucesso";
        $_SESSION['email'] = $email;
        header("Location: index.php?action=home");
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        header("Location: index.php");
    }
}