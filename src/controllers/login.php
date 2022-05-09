<?php

loadModel('login');
session_start();
$exception = null;


if(count($_POST) > 0) {
    $login = new Login($_POST);
    try {
        $user = $login->chechLogin();
        $_SESSION['user'] = $user;
        header('location: day_records.php');
       
    } catch (AppException $e) {
        $exception = $e;
    }
}



loadView('login', ['exception' => $exception]);