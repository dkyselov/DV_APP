//let $ = require('jquery');
import $ from 'jquery';
import  'bootstrap';
import angular from 'angular';
require('./library/')();
const ngModule=angular.module('app',[]);
require('./directives')(ngModule);
require('./agcontrollers/')(ngModule);  
console.log("Hello world!!!99977"); 




