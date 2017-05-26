<?php

class FootballDataAPI
{
    function __construct()
    {
        $this->baseUrl = "http://www.football-data.org/v1/";
        $this->competitions = array();
    }

    public function getCompetitions()
    {
        $url = $this->baseUrl . 'competitions';
        $data = $this->_getDataFromAPI($url);
        $count = count($data);
        for ($i=0; $i<$count; $i++) {
            $data[$i] = array(
                'competitionId'=> $data[$i]->id,
                'name'=> $data[$i]->caption,
            );
        }
        return json_encode($data);
    }

    public function getCompetitionTeams($competitionId)
    {
        $data = $this->_getDataFromAPI($this->baseUrl . 'competitions/' . $competitionId . '/teams');
        $returnData = [];
        $count = count($data->teams);
        for ($i=0; $i<$count; $i++) {
            $id = substr($data->teams[$i]->_links->self->href, strrpos($data->teams[$i]->_links->self->href, '/') + 1);
            $returnData['teams'][$i] = array(
                'name'=> $data->teams[$i]->name,
                'teamId' => $id,
                'crestUrl' => $data->teams[$i]->crestUrl
            );
        }
        $returnData['name'] = $this->_getDataFromAPI($this->baseUrl . 'competitions/' . $competitionId )->caption;
        return json_encode($returnData);
    }

    public function getTeamPlayers($teamId)
    {
        $data = $this->_getDataFromAPI($this->baseUrl . 'teams/' . $teamId . '/players');
        $returnData = [];
        $count = count($data->players);
        for ($i=0; $i<$count; $i++) {
            $returnData['players'][$i] = array(
                'name'=> $data->players[$i]->name,
            );
        }
        $returnData['name'] = $this->_getDataFromAPI($this->baseUrl . 'teams/' . $teamId)->name;
        return json_encode($returnData);
    }

    private function _getDataFromAPI($url)
    {
        $preferences['http']['method'] = 'GET';
        $preferences['http']['header'] = 'X-Auth-Token: 363808d1060641e88f9fe369f99db44a';
        $stream_context = stream_context_create($preferences);
        $response = file_get_contents($url, false, $stream_context);
        return json_decode($response);
    }
}