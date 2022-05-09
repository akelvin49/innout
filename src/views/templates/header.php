<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/template.css">
    <title>In N' Out</title>
</head>
<body>
    <header class="header">
        <a href="index.php" class="logo-a">
            <div class="logo">
                <i class="icofont-travelling mr-2"></i>
                <span class="font-weight-ligth">In</span>
                <span class="font-weight-bold mx-2">N'</span>
                <span class="font-weight-ligth">Out</span>
                <i class="icofont-runner-alt-1 ml-2"></i>
            </div>
        </a>
        <div class="menu-toggle mx-3">
            <i class="icofont-navigation-menu"></i>
        </div>
        <div class="spacer"></div>
        <div class="dropdown">
            <div class="dropdown-button">
                <img src= <?="http://www.gravatar.com/avatar.php?gravatar_id=" . md5(strtolower(trim($_SESSION['user']->email)));?> alt="user" class="avatar" >

                <span class="ml-3 my-1"><?= $_SESSION['user']->name; ?></span>
                <i class="icofont-simple-down mx-2"></i>                
            </div>

            <div class="dropdown-content">
                    <ul class="nav-list">
                    <?php if($user->is_admin) : ?>
                        <li class="nav-item">
                            <a href="date_generator.php">
                                <i class="icofont-data text-danger mr-2"></i>
                                Gerar dados
                            </a>
                        </li>
                    <?php endif ?>                   
                        <li class="nav-item">
                            <a href="logout.php">
                                <i class="icofont-logout mr-2"></i>
                                Sair
                            </a>
                        </li>
                    </ul>
                </div>
            
        </div>
    </header>