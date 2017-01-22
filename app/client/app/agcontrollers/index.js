module.exports = function(ngModule) {
require('./myctrl/myCtrl.js')(ngModule); 
require('./authCtrl/authCtrl.js')(ngModule);
require('./registerCtrl/registerCtrl.js')(ngModule);
}