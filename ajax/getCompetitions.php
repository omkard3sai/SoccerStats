<?php
header('Content-Type: application/json');
require_once("FootballDataAPI.php");
$dataObject = new FootballDataAPI();
echo $dataObject->getCompetitions();
