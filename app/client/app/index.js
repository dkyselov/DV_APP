//import library
import $ from 'jquery';
import  'bootstrap';
import angular from 'angular';
import base_64 from 'angular-utf8-base64';
import angular_md5 from 'angular-md5';
//import modules
require('./library/')();
const ngModule=angular.module('app',['angular-md5','utf8-base64']);
require('./directives')(ngModule);
require('./agcontrollers/')(ngModule);  
console.log("Hello world!!!"); 




