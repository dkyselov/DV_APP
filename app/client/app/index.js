//let $ = require('jquery');
let angular=require('angular');
require('./library/')();
const ngModule=angular.module('app',[]);
require('./directives')(ngModule);
require('./agcontrollers/')(ngModule);  
console.log("Hello world!!!99977"); 




