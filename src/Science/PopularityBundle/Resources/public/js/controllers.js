'use strict';

angular.module('VoteApp.controllers', []).
    controller('VoteCtrl', ['$scope', 'scientists', 'ScientistsService', function($scope, scientists, ScientistsService) {
      $scope.scientists = scientists;

      $scope.initScientists = function() {
        ScientistsService.async().then(function(data) {
          scientists = data;
        });
      };
    }]);
