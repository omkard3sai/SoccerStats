angular.
module('SoccerStatsApp', [
        'ngRoute'
    ])
.filter('urlEscape', function() {
    return window.encodeURIComponent;
});