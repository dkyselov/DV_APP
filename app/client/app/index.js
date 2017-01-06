let angular=require('angular');
//var $ = require("jquery");
const ngModule=angular.module('app',[]);
require('./directives')(ngModule);
require('./agcontrollers/index')(ngModule);  
//require('./library/index');
console.log("Hello world!!!999"); 




