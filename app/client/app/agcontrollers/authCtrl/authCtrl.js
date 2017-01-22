module.exports = function(ngModule) {
	ngModule.controller('authCtrl', ['$scope', '$http', function($scope, $http) {
        $scope.show_errors=false;
		$scope.form_controll=true;
		$scope.ok=false;
		$scope.check=0;
        $scope.send_data = function () {
        let login = $scope.login;
        let password=$scope.password; 
		let check=$scope.check;
        let request = {"username":login,"password":password,"remember":check};
		$http.post("http://dv-app/app/api/login/",request).success(function (response) {
			/*if(response[0] == false){
				$scope.data= response;
				$scope.show_errors=true;
				$scope.ok=false;
				$scope.form_controll=true;
			}
			else{*/
				$scope.data=response;
				$scope.show_errors=false;
				$scope.ok=true;
				$scope.form_controll=false;
			//}
		});          
		
	};
    }]);
}