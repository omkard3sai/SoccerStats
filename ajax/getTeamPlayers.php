<?php
header('Content-Type: application/json');
require_once("FootballDataAPI.php");
if(!isset($_GET['teamId']))
    die('Error');
$dataObject = new FootballDataAPI();
echo $dataObject->getTeamPlayers($_GET['teamId']);
