<?php
session_start();
logger("Logout de Usuário: '{$_SESSION['user']->name}', Email: '{$_SESSION['user']->email}'");
session_destroy();
header('Location: login.php');
exit();