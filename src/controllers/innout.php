<?php

session_start();
requireValidSession();

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

try {
    $currentTime = strftime('%H:%M:%S', time());
    if(isset($_POST['forcedTime']) && $_POST['forcedTime']) {
        $currentTime = $_POST['forcedTime'];
    }
    $records->innout($currentTime);
    AddSuccessMsg('Ponto inserido com sucesso!');
} catch(AppException $e) {
    AddErroMsg($e->getMessage());
}
header('Location: day_records.php');