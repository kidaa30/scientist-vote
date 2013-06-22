'use strict';

angular.module('VoteApp', ['VoteApp.services', 'VoteApp.controllers'],
    function ($interpolateProvider) {$interpolateProvider.startSymbol('[[').endSymbol(']]')}
);