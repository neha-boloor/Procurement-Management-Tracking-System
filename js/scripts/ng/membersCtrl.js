(function() {
    'use strict';

    angular
        .module('myApp')
        .controller('membersCtrl', membersCtrl);

    membersCtrl.$inject = ['$scope','$http'];

    /* @ngInject */
    function membersCtrl($scope,$http) {
        var vm = this;
        vm.title = 'membersCtrl';

        activate();

        ////////////////

        function activate() {
        	$http({
                method: 'GET',
                url: 'js/data/batches.json'
            }).then(function successCallback(response) {
                $scope.batches = response.data.batches;
            }, function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
            });
        }
    }
})();