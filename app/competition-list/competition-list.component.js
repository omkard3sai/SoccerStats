angular.
module('SoccerStatsApp').
component('competitionList', {
    templateUrl: 'app/competition-list/competition-list.template.html',
    controller: function CompetitionListController($http) {
        var self = this;
        $http.get('ajax/api/getCompetitions').then(function(response) {
            self.competitionList = response.data;
        });
    }
});