//import library
import $ from 'jquery';
import  'bootstrap';
import angular from 'angular';
//import modules
require('./library/')();
const ngModule=angular.module('app',[]);
require('./directives')(ngModule);
require('./agcontrollers/')(ngModule);  
console.log("Hello world!!!"); 




