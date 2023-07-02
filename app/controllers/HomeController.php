<?php

require_once "app/models/PrivateDAO.php";

class HomeController
{

    private $homeDAO;

    public function __construct()
    {   
        $this->homeDAO = new PrivateDAO();
    }
    public function home($fk_id_user)
    {
        if (!isset($_SESSION['user'])) {
            $_SESSION['error'] = "Você precisa estar logado";
            header("Location: index.php?action=login");
        }
        $list = $this->homeDAO->getPrivates($fk_id_user);
        require_once "app/views/home/home.php";
    }
}