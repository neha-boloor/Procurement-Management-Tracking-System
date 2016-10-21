(function() {
    'use strict';

    angular
        .module('myApp')
        .controller('eventCtrl', eventCtrl);

    eventCtrl.$inject = ['$scope', '$http'];

    /* @ngInject */
    function eventCtrl($scope, $http) {
        var vm = this;
        vm.title = 'eventCtrl';

        activate();

        ////////////////

        function activate() {
            $http({
                method: 'GET',
                url: 'js/data/events.json'
            }).then(function successCallback(response) {
                $scope.events = response.data.events;
            }, function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
            });
        }
    }
})();
