(function() {
    'use strict';

    angular
        .module('myApp')
        .controller('galleryCtrl', galleryCtrl);

    galleryCtrl.$inject = ['$scope','$http'];

    /* @ngInject */
    function galleryCtrl($scope,$http) {
        var vm = this;
        vm.title = 'galleryCtrl';

        activate();

        ////////////////

        function activate() {
        	$http({
                method: 'GET',
                url: 'images/gallery/gallery.json'
            }).then(function successCallback(response) {
                $scope.albumLoad=true;
                $scope.gallery = response.data.albums;
                console.log(response.data);
            }, function errorCallback(response) {
                $scope.albumLoad=true;
                // called asynchronously if an error occurs
                // or server returns response with an error status.
            });
        }
    }
})();