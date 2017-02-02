module.exports = function(ngModule) {
	ngModule.controller('registerCtrl', ['$scope', '$http', function($scope, $http) {
       //Check, logged in or not
	   $http({
			method : "POST",
			url : "http://dv-app/app/api/login/"
    	}
		).then(function mySucces(response) {
			if(response.status==200){
				$scope.info = response.data['info'];
				//console.log(response.status);
				if($scope.info=='login'){
					$scope.username=response.data['username'];
					$scope.user=true;
					$scope.form_controll=false;
					$scope.complate=false;
					
				}
				if($scope.info=='errors'){
					$scope.form_controll=true;
					$scope.user=false;
					$scope.complate=false;
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
		//LogOut function
		$scope.logout= function (){
			$http.post("http://dv-app/app/api/logout/").success(function (data) {
				$scope.info = data['info'];
				if($scope.info=='errors'){
					window.location = "http://dv-app/pages/index_test.html";
					$scope.form_controll=true;
					$scope.user=false;
					$scope.complate=false;
					//$("#user_info").fadeOut(1000);
					
				}
				else{
					alert("Bad connections");
					window.location = "http://dv-app/badbrowser.html";
				}
			});
		}
	  /*$scope.show_errors=false;
		$scope.form_controll=true;*/
        $scope.registration = function () {
        let request = {
            "email":$scope.email_add,
            "username":$scope.login,
            "password":$scope.password,
			"password_confirm":$scope.password_confirm,
            "first_name":$scope.first_name,
            "last_name":$scope.last_name,
            "country":$scope.country,
            "city":$scope.city,
            "company":$scope.company,
            "phone_number":$scope.phone_number,
        };
		$http.post("http://dv-app/app/api/register/",request).success(function (data) {
				$scope.info=data['info'];
				console.log($scope.info);
				if($scope.info == "ok"){
					//content
					$scope.complate=true;
					$scope.show_errors=false;
					$scope.form_controll=false;	
					$scope.user=false;
				}
				
				 if($scope.info == "error"){
					$scope.data=data.message._external;
					//Content
					$scope.complate=false;
					$scope.show_errors=true;
					$scope.form_controll=true;	
					$scope.user=false;
				}
				 if ($scope.info == "empty_error"){
					$scope.data=data.message;
					//Content
					$scope.complate=false;
					$scope.show_errors=true;
					$scope.form_controll=true;	
					$scope.user=false;
				}
				 if ($scope.info == "found_error"){
					$scope.data=data.message;
					//Content
					$scope.complate=false;
					$scope.show_errors=true;
					$scope.form_controll=true;	
					$scope.user=false;
				} 					
		});          
		
	};
    }]);
}