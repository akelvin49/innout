<?php
session_start();
requireValidSession(true);
// Temporário

echo User::getCount(['raw' => 'id > 1']);
echo '<br>' . WorkingHours::getCount();
echo '<br>' . date("Y-m-d");