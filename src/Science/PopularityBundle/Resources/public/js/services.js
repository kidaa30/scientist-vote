'use strict';

angular.module('VoteApp.services', []).
    factory('scientists', function() {
      return []
    }).
    factory('ScientistsService', function($http) {
      var ScientistsServiceObject = {
        async: function() {
          console.log('scientists service called');
          var promise = $http.get('/app_dev.php/scientists').then(function (response) {
            if (response.status == 200) {
              return response.data;
            } else {
              return {};
            }
          });
          return promise;
        }
      };
      return ScientistsServiceObject;
    });