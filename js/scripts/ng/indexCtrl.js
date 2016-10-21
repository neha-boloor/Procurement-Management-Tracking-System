(function() {
    'use strict';

    angular
        .module('myApp')
        .controller('indexCtrl', indexCtrl);

    indexCtrl.$inject = ['$scope', '$http'];

    /* @ngInject */
    function indexCtrl($scope, $http) {
        var vm = this;
        vm.title = 'indexCtrl';

        activate();

        ////////////////

        function activate() {
            
            $http({
                method: 'GET',
                url: 'js/data/events.json'
            }).then(function successCallback(response) {
                $scope.events = response.data.events;
            }, function errorCallback(response) {
            });
            $http({
                method: 'GET',
                url: 'js/data/news.json'
            }).then(function successCallback(response) {
                $scope.news = response.data.news;
            }, function errorCallback(response) {
            });
        }
    }
})();
