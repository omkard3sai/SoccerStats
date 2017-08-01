angular.
module('SoccerStatsApp').
config(function config($locationProvider, $routeProvider) {
        $locationProvider.hashPrefix('');

        $routeProvider.
        when('/home', {
            template: '<competition-list></competition-list>'
        }).
        when('/teams/:competitionId', {
            template: '<competition-teams></competition-teams>'
        }).
        when('/players/:teamId', {
            template: '<player-list></player-list>'
        }).
        otherwise('/home');
    }
);