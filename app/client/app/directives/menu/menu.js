module.exports = function(ngModule) {
  ngModule.directive('menu', menuFn);
  function menuFn() {
    return {
      restrict: 'E',
      scope: {},
      templateUrl: 'http://localhost/dv_app/appclient/app/directives/menu/menu.html',
      controllerAs: 'vm',
      controller: function() {
        let vm=this;
       vm.menu = ['About us','Contact','Payment'];
       console.log(vm.menu);
      }
    }
  }
}