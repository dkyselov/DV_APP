module.exports = function(ngModule) {
    ngModule.controller('authtestCtrl', ['$scope','$http','base64', function($scope,$http,base64) {
        $scope.show_errors=false;
        $scope.auth_send={};
		$scope.loading=false;
        //Open data What would you know whether loggin or not**********************************************************
		$http({
			method : "POST",
			url : "http://dv-app/app/api/login/",
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
        //Function logOut
		$scope.logout= function (){
			$scope.loading=true;
			$http.post("http://dv-app/app/api/logout/").success(function (data) {
				$scope.info = data['info'];
				if($scope.info=='errors'){
					$scope.loading=false;
					$scope.form_controll=true;
					$scope.user=false;
					//$("#user_info").fadeOut(1000);
				}
				else{
					alert("Bad connections");
					$scope.loading=false;
					window.location = "http://dv-app/badbrowser.html";
				}
			});
		}
        //Pattern for login to site***********************************************************************************
        $scope.usernamePattern=new RegExp("^[a-z0-9_\s]+$");
        $scope.passwordPattern=new RegExp("^[a-z0-9\s]+$");
        //Function error login*****************************************************************************************
        $scope.getError=function(error){
            if(angular.isDefined(error)){
                if(error.required){
                    return "The field must not be empty";
                }
                if(error.pattern){
                    return "Data are entered incorrectly";
                }
                if(error.minlength){
                    return "Minlenght incorrectly";
                }
                if(error.maxlength){
                    return "Maxlenght incorrectly";
                }
                //console.log(error); 
            }   
        }
        //Function login to site********************************************************************************************
        $scope.login_fn=function(auth){
            $scope.loading=true; 
            if(auth.remember!=true){
                auth.remember=false;
            }
            $scope.auth_send.username=base64.encode(auth.username || '');
            $scope.auth_send.password=base64.encode(auth.password || '');
			$scope.auth_send.remember= auth.remember;
            console.log(auth); 
            if($scope.auth_send.username=="" || $scope.auth_send.username==undefined || $scope.auth_send.password=="" || $scope.auth_send.password==undefined){
			//alert("Введите данные");
			$scope.loading=false;
			$scope.err="Data empty. All fields have to be filled";
			$scope.show_errors=true;
		}
		else{
		$http.post("http://dv-app/app/api/login/",$scope.auth_send).success(function (data) {
			$scope.info = data['info'];
			$scope.loading=false;
			if($scope.info == "login"){
				$scope.username=data['username'];
				$scope.show_errors=false;
				$scope.form_controll=false;	
				$scope.user=true;
				//$("#user_info").fadeIn(1000);
				
			}
			else{
				//$("#win3").fadeOut( 3000,function(){
				$scope.err=data['errors'][0];
				$scope.show_errors=true;
				$scope.form_controll=true;
				//});
			}
		   });
	      }    
        }
        
     }]);
}