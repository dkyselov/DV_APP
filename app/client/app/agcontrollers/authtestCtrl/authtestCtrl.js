module.exports = function(ngModule) {
    ngModule.controller('authtestCtrl', ['$scope', function($scope) {
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
                    return "Maxlenght incorrectly!";
                }
                //console.log(error); 
            }
        }
        $scope.login_fn=function(auth){
            console.log(auth);      
        }
        
     }]);
}