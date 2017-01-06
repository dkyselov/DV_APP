let angular=require('angular');
const ngModule=angular.module('app',[]);
require('./directives')(ngModule);
require('./agcontrollers/index')(ngModule);  
console.log("Hello app world"); 



