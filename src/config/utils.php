<?php

function AddSuccessMsg($msg) {
    $_SESSION['message'] = [
        'type' => 'success',
        'message' => $msg
    ];
}

function AddErroMsg($msg) {
    $_SESSION['message'] = [
        'type' => 'erro',
        'message' => $msg
    ];
}