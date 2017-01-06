module.exports = function(ngModule) {
  require('./hello/hello.js')(ngModule);
  require('./menu/menu.js')(ngModule);
  
}