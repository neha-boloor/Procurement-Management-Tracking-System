(function() {
    'use strict';

    angular
        .module('myApp')
        .controller('batchCtrl', batchCtrl);

    batchCtrl.$inject = ['$scope','$http'];

    /* @ngInject */
    function batchCtrl($scope,$http) {
        var vm = this;
        vm.title = 'batchCtrl';

        activate();

        ////////////////

        function activate() {
        	var url=window.location.href;
        	var batchSlug=url.split("=")[1];
            console.log(batchSlug);
        	var batchUrl='images/members/'+batchSlug;
        	$scope.batchUrl=batchUrl;
        	$http({
                method: 'GET',
                url: batchUrl+'/info.json'
            }).then(function successCallback(response) {
                $scope.members = response.data.members;
                $scope.batchName= response.data.batchName;
                document.title=$scope.batchName+" | Artists' Forum, NITK";
            }, function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
            });
        }
    }
})();