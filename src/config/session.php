<?php

function requireValidSession($requiresAdmin = false) {
    $user = $_SESSION['user'];
    if (!isset($user)) {
        header('Location: login.php');
        exit();
    } elseif($requiresAdmin && !$user->is_admin){
        addErroMsg("Acesso Negado!");
        header('Location: day_records.php');
        exit();
    }
}