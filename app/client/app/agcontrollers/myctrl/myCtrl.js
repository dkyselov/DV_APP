module.exports = function(ngModule) {
	ngModule.controller('myCtrl', ['$scope', '$http', function($scope, $http) {
        $scope.firstName = "Vasia";
        $scope.lastName = "";
    }]);
}
