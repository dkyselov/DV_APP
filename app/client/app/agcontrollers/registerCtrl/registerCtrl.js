module.exports = function(ngModule) {
	ngModule.controller('registerCtrl', ['$scope', '$http', function($scope, $http) {
        $scope.show_errors=false;
		$scope.form_controll=true;
		$scope.ok=false;
        $scope.send_data = function () {
        let request = {
            "email":$scope.email1,
            "username":$scope.username,
            "password":$scope.password,
            "first_name":$scope.first_name,
            "last_name":$scope.last_name,
            "country":$scope.country,
            "city":$scope.city,
            "company":$scope.company,
            "phone_number":$scope.phone_number,
        };
		$http.post("http://dv-app/app/api/register/",request).success(function (response) {
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