<?php
require "config.php";

function greet()
{
    $hour = (int)date('H');

    if ($hour < MORNING_START) {
        return "Good Night";
    } elseif ($hour < AFTERNOON_START) {
        return "Good Morning";
    } elseif ($hour < EVENING_START) {
        return "Good Afternoon";
    } elseif ($hour < NIGHT_START) {
        return "Good Evening";
    } else {
        return "Good Night";
    }
}
