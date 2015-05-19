<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$email = 'demo@mail.com';
$password = 'password';

$salt = 'secret_key_on_left';
$pepa = 'secret_key_on_right';

$hash = md5($salt . $password . $pepa);

function setMyCookie ($hash) {
    setcookie('mCi', $hash, time() + (8640 * 30));
}

function unsetMyCookie () {
    setcookie('mCi', '', time() + (8640 * 30));
}

if (isset($_GET['logout'])) {
    session_destroy();
    unsetMyCookie();
    header('Location: /');
}

if (((isset($_SESSION['login']) && $_SESSION['login']) == $hash) || (isset($_COOKIE['mCi']) && $_COOKIE['mCi'] == $hash)) {
    $_SESSION['authenticated'] = true;
} else if (isset($_POST['submit'])) {
    if ($_POST['email'] == $email && $_POST['password'] == $password) {
        if ($_POST['rememberme']) {
            setMyCookie($hash);
        } else {
            unsetMyCookie();
        }
        $_SESSION["login"] = $hash;
        header("Location: /");
    } else {
        $_SESSION['authenticated'] = false;
    }
} else {
    $_SESSION['authenticated'] = false;
}

// Custom constants
define('USER_AUTH', isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true ? true : false);

if (USER_AUTH == false && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) != '/') {
    header('Location: /');
    exit;
}