module.exports = function(ngModule) {
	ngModule.controller('myCtrl', ['$scope', '$http', function($scope, $http) {
        $scope.show_errors=false;
		$scope.form_controll=true;
		$scope.ok=false;
        $scope.send_data = function () {
        let login = $scope.login;
        let password=$scope.password; 
        let request = {"login":login,"password":password};
		$http.post("http://dv-app/app/api/user/",request).success(function (response) {
			if(response[0] == false){
				$scope.data= response[1];
				$scope.show_errors=true;
				$scope.ok=false;
				$scope.form_controll=true;
			}
			else{
				$scope.data=response[1];
				$scope.show_errors=false;
				$scope.ok=true;
				$scope.form_controll=false;
			}
		});          
		
	};
    }]);
}
