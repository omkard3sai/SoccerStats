<?php
header('Content-Type: application/json');
require_once("FootballDataAPI.php");
$GLOBALS['action_URI_segment_number'] = 4;
$GLOBALS['url_parts'] = explode('/', $_SERVER['REQUEST_URI']);
$action = $GLOBALS['url_parts'][$GLOBALS['action_URI_segment_number']];
if (function_exists($action)) {
    $action();
}
else {
    getCompetitions();
}

// Function to retrieve competition list
function getCompetitions() {
    $dataObject = new FootballDataAPI();
    echo $dataObject->getCompetitions();
}

// Function to retrieve competition teams using an id
function getCompetitionTeams() {
    $competition_id = $GLOBALS['url_parts'][$GLOBALS['action_URI_segment_number']+1];
    if(!isset($competition_id))
        die('ID required');
    $dataObject = new FootballDataAPI();
    echo $dataObject->getCompetitionTeams($competition_id);
}

// Function to retrieve players for a team using an id
function getTeamPlayers() {
    $team_id = $GLOBALS['url_parts'][$GLOBALS['action_URI_segment_number']+1];
    if(!isset($team_id))
        die('ID required');
    $dataObject = new FootballDataAPI();
    echo $dataObject->getTeamPlayers($team_id);
}