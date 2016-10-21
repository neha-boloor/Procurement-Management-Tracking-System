(function() {
    'use strict';

    angular
        .module('myApp')
        .controller('albumCtrl', albumCtrl);

    albumCtrl.$inject = ['$scope','$http'];

    /* @ngInject */
    function albumCtrl($scope,$http) {
        var vm = this;
        vm.title = 'albumCtrl';

        activate();

        ////////////////

        function activate() {
        	var url=window.location.href;
        	var albumSlug=url.split("=")[1];
        	var albumUrl='images/gallery/'+albumSlug;
        	$scope.albumUrl=albumUrl;
        	$http({
                method: 'GET',
                url: albumUrl+'/info.json'
            }).then(function successCallback(response) {
                $scope.photos = response.data.photos;
                $scope.albumName= response.data.albumName;
                document.title=$scope.albumName+" | Artists' Forum, NITK";
            }, function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
            });
        }
    }
})();