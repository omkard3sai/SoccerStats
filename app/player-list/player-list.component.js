angular.
module('SoccerStatsApp').
component('playerList', {
    templateUrl: 'app/player-list/player-list.template.html',
    controller: function PlayerListController($routeParams, $http) {
        var self = this;
        $http.get('ajax/api/getTeamPlayers/' + $routeParams.teamId).then(function(response) {
            self.playerList = response.data['players'];
            self.teamName = response.data['name'];
        });
    }
});