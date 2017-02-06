module.exports = function(ngModule) {
    ngModule.controller('authtestCtrl', ['$scope','md5', function($scope,md5) {
      /* $scope.data5 = "Hello";
       var data6= md5.createHash($scope.data5 || '');
       console.log(data6);*/
        $scope.usernamePattern=new RegExp("^[a-z0-9_\s]+$");
        $scope.passwordPattern=new RegExp("^[a-z0-9\s]+$");
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
        $scope.login_fn=function(auth){
            
            $scope.auth_send={};
            $scope.auth_send.username=md5.createHash(auth.username || '');
            $scope.auth_send.password=md5.createHash(auth.password || '');
            console.log($scope.auth_send);      
        }
        
     }]);
}