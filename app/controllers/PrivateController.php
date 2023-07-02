<?php

require_once "app/models/PrivateDAO.php";

class PrivateController
{
    private $privateDAO;

    public function __construct()
    {
        $this->privateDAO = new PrivateDAO();
    }

    public function createPrivate()
    {
        require_once "app/views/private/createPrivate.php";
    }

    public function createPrivateVerify($fk_id_user, $description, $user_or_email, $password)
    {
        $result = $this->privateDAO->getPrivateExists($fk_id_user, $description);

        if ($result) {
            $_SESSION['error'] = "Esse Segredo já existe";
            header("Location: index.php?action=createPrivate");
        } else {
            $result = $this->privateDAO->createPrivate($fk_id_user, $description, $user_or_email, $password);

            if ($result) {
                $_SESSION['success'] = "Segredo criado com sucesso";
                header("Location: index.php?action=home");
            } else {
                $_SESSION['error'] = "Ocorreu um erro ao criar o Segredo";
                header("Location: index.php?action=createPrivate");
            }
        }
    }

    public function updatePrivate($fk_id_user, $id_private)
    {
        $result = $this->privateDAO->getPrivateByDescription($fk_id_user, $id_private);

        if ($result) {
            require_once "app/views/private/updatePrivate.php";
        } else {
            $_SESSION['error'] = "Ocorreu um erro ao editar o Segredo";
            header("Location: index.php?action=home");
        }
    }

    public function updatePrivateVerify($fk_id_user, $id_private, $description, $user_or_email, $password)
    {   
        $result = $this->privateDAO->updatePrivate($fk_id_user, $id_private, $description, $user_or_email, $password);

        if ($result) {
            $_SESSION['success'] = "Segredo editado com sucesso";
            header("Location: index.php?action=home");
        } else {
            $_SESSION['error'] = "Ocorreu um erro ao editar o Segredo";
            header("Location: index.php?action=home");
        }
    }

    public function deletePrivate($fk_id_user, $id_private)
    {
        $result = $this->privateDAO->deletePrivate($fk_id_user, $id_private);

        if ($result) {
            $_SESSION['success'] = "Segredo deletado com sucesso";
            header("Location: index.php?action=home");
        } else {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o Segredo";
            header("Location: index.php?action=home");
        }
    }
}