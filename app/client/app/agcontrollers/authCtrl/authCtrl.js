module.exports = function(ngModule) {
	ngModule.controller('authCtrl', ['$scope', '$http', function($scope, $http) {
        //$scope.info="error";
	    $scope.show_errors=false;
		$scope.check=0;
		//Open data 
		$http({
			method : "POST",
			url : "http://dv-app/app/api/login/"
    	}
		).then(function mySucces(response) {
			if(response.status==200){
				$scope.info = response.data['info'];
				if($scope.info=='login'){
					$scope.username=response.data['username'];
					$scope.user=true;
					$scope.form_controll=false;
				}
				if($scope.info=='errors'){
					$scope.form_controll=true;
					$scope.user=false;
				}
			}
			else{
				window.location = "http://dv-app/badbrowser.html";
			}
    	},
		
		function myError(response) {
			$scope.error = response.statusText;
			window.location = "http://dv-app/badbrowser.html";
    	});
		//LogOut
		$scope.logout= function (){
			$http.post("http://dv-app/app/api/logout/").success(function (data) {
				$scope.info = data['info'];
				if($scope.info=='errors'){
					$scope.form_controll=true;
					$scope.user=false;
					//$("#user_info").fadeOut(1000);
				}
				else{
					alert("Bad connections");
					window.location = "http://dv-app/badbrowser.html";
				}
			});
		}
		//Send data to server
        $scope.login_to_site = function () {
        let login = $scope.login;
        let password=$scope.password; 
		let check=$scope.check;
        let request = {"username":login,"password":password,"remember":check};
		if(request.username=="" || request.username==undefined || request.password=="" || request.password==undefined){
			//alert("Введите данные");
			$scope.err="Data empty. All fields have to be filled";
			$scope.show_errors=true;
		}
		else{
		$http.post("http://dv-app/app/api/login/",request).success(function (data) {
			$scope.info = data['info'];
			//alert($scope.info);
			if($scope.info == "login"){
				$scope.username=data['username'];
				$scope.show_errors=false;
				$scope.form_controll=false;	
				$scope.user=true;
				//$("#user_info").fadeIn(1000);
			}
			else{
				$scope.err=data['errors'][0];
				$scope.show_errors=true;
				$scope.form_controll=true;
			}
		});
	}          	
	};
	
    }]);
}