'use strict';

angular.module('VoteApp.controllers', []).
    controller('VoteCtrl', ['$scope', 'scientists', 'ScientistsService', function($scope, scientists, ScientistsService) {
      $scope.scientists = scientists;

      $scope.initScientists = function() {
        ScientistsService.async().then(function(data) {
          //scientists = data;

          for (var i=0;i < data.length; i++) {
            var scientist = JSON.parse(data[i]);
            scientists.push(scientist);
          }
          console.log(scientists);
        });
      };
    }]);
