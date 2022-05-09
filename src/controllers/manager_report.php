<?php
session_start();
requireValidSession(true);

$activeUsersCount = User::getActiveUsersCount();
$absentUsers = WorkingHours::getAbsentUsers();

$yearAndMonth = (new DateTime())->format('Y-m');
$seconds = WorkingHours::getWorkedTimeInMonth($yearAndMonth);

// mudei o nome da variável $secondsInMonth do repositório 'cod3rcursos' para $timesInMonth e agora ela pega h:m:s.
$timesInMonth = getTimeStringFromSeconds($seconds);

loadTemplateView('manager_report', [
    'activeUsersCount' => $activeUsersCount,
    'absentUsers' => $absentUsers,
    'timesInMonth' => $timesInMonth,
]);