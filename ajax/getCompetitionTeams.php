<?php
header('Content-Type: application/json');
require_once("FootballDataAPI.php");
if(!isset($_GET['competitionId']))
    die('Error');
$dataObject = new FootballDataAPI();
echo $dataObject->getCompetitionTeams($_GET['competitionId']);
