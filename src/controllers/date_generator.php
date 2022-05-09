<?php
session_start();
requireValidSession();

Database::executeSql('DELETE FROM working_hours');
Database::executeSql('DELETE FROM users WHERE id > 6');

function getDayTemplateByOdds($regularRate, $extraRate, $lazyRate) {

    $regularDayTemplate = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '17:00:00',
        'worked_time' => DAILY_TIME
    ];
    $extraHourDayTemplate = [
        'time1' => '08:00:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '18:00:00',
        'worked_time' => DAILY_TIME + 3600
    ];
    $lazyDayTemplate = [
        'time1' => '08:30:00',
        'time2' => '12:00:00',
        'time3' => '13:00:00',
        'time4' => '17:00:00',
        'worked_time' => DAILY_TIME - 1800
    ];

    $value = rand(0, 100);

    if($value <= $regularRate) {
        return $regularDayTemplate;
    }elseif ($value <= $regularRate + $extraRate) {
        return $extraHourDayTemplate;
    }else {
        return $lazyDayTemplate;
    }
}

function populateWorkingHours($userId, $initialDate, $regularRate, $extraRate, $lazyRate) 
{
    $currentDate = $initialDate;
    $today = new DateTime();
    // $today->modify('-1 day');
    $columns = ['user_id' => $userId, 'work_date' => $currentDate];
    $count = 0;

    while(isBefore($currentDate, $today) && ($count < 50)) {
        if(!isWeekend($currentDate)) {
            $template = getDayTemplateByOdds($regularRate, $extraRate, $lazyRate);
            $columns = array_merge($columns, $template);
            $workingHours = new WorkingHours($columns);
            $workingHours->insert();
        }
        $currentDate = getNextDay($currentDate)->format('Y-m-d');
        $columns['work_date'] = $currentDate;
        $count++;
    }
}

populateWorkingHours(1, date('Y-4-1'), 70, 20, 10);
populateWorkingHours(3, date('Y-4-1'), 30, 65, 5);
populateWorkingHours(4, date('Y-4-1'), 20, 5, 75);
populateWorkingHours(6, date('Y-4-1'), 20, 5, 75);


echo '<h1>Inseriu com sucesso<h1>';
echo '
<form action="day_records.php" method="get">
    <div>
            <button >
                    Voltar
            </button>
    </div>
</form>
';


