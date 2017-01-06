module.exports = function(ngModule) {
  ngModule.directive('hello', helloFn);

  function helloFn() {
    return {
      restrict: 'E',
      scope: {},
      templateUrl: 'directives/hello/hello.html',
      controllerAs: 'vm',
      controller: function() {
        var vm = this;
        vm.greeting = 'Hello Webpack';
      }
    }
  }
}