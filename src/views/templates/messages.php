<?php
$errors = [
    'email' => false,
    'password' => false
];

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
} elseif (isset($exception)) {
    $message = [
        'type' => 'erro',
        'message' => $exception->getMessage(),
    ];

    if (get_class($exception) === 'ValidationException') {
        $errors = $exception->getErrors();
    }
    
}

$alertType = '';

if (isset($message)) {
    if ($message['type'] === 'erro') {
        $alertType = 'danger';
    }else {
        $alertType = 'success';
    }
}




?>

<?php if(isset($message)): ?>
    <div class="my-3 alert alert-<?= $alertType; ?>" role="alert">
        <?= $message['message']; ?>
    </div>
<?php endif ?>