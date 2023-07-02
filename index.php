<?php

session_start();

require_once "app/controllers/AuthController.php";
require_once "app/controllers/HomeController.php";
require_once "app/controllers/PrivateController.php";

$action = isset($_GET['action']) ? $_GET['action'] : "login.php";

$authController = new AuthController();
$homeController = new HomeController();
$privateController = new PrivateController();

switch ($action) {
    case "login":
        $authController->login();
        break;

    case "loginVerify":
        $email = $_POST['email'];
        $password = $_POST['password'];

        $authController->loginVerify($email, $password);
        break;

    case "create":
        $authController->create();
        break;

    case "createVerify":
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $authController->createVerify($username, $email, $password);
        break;

    case "editProfile":
        $email = $_SESSION['user']['email'];
        $authController->update($email);
        break;

    case "updateVerify":
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $authController->updateVerify($username, $email, $password);
        break;
        
    case "logout":
        $authController->logout();
        break;

    case "home":
        $fk_id_user = $_SESSION['user']['id_user'];
        $homeController->home($fk_id_user);
        break;

    case "createPrivate":
        $privateController->createPrivate();
        break;

    case "createPrivateVerify":
        $fk_id_user = $_SESSION['user']['id_user'];
        $description = $_POST['description'];
        $user_or_email = $_POST['user_or_email'];
        $password = $_POST['password'];

        $privateController->createPrivateVerify($fk_id_user, $description, $user_or_email, $password);
        break;

    case "updatePrivate":
        $fk_id_user = $_SESSION['user']['id_user'];
        $id_private = $_GET['id_private'];

        $privateController->updatePrivate($fk_id_user, $id_private);
        break;

    case "updatePrivateVerify":
        $fk_id_user = $_SESSION['user']['id_user'];
        $id_private = $_POST['id_private'];
        $description = $_POST['description'];
        $user_or_email = $_POST['user_or_email'];
        $password = $_POST['password'];

        $privateController->updatePrivateVerify($fk_id_user, $id_private, $description, $user_or_email, $password);
        break;

    case "deletePrivate":
        $fk_id_user = $_SESSION['user']['id_user'];
        $id_private = $_GET['id_private'];

        $privateController->deletePrivate($fk_id_user, $id_private);
        break;

    default:
        $authController->login();
        break;
}