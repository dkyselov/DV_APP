module.exports = function(ngModule) {
  ngModule.directive('menu', menuFn);
  function menuFn() {
    return {
      restrict: 'E',
      scope: {},
      templateUrl: 'http://localhost/dv_app/app/client/app/directives/menu/menu.html',
      controllerAs: 'vm',
      controller: function() {
        const vm=this;
        vm.menu = ['Home','About As','Contacts','Orders'];
      }
    }
  }
}