require('bootstrap');
require('./script.js');

document.Dropzone = require('dropzone');
window.$=window.jQuery=require('jquery');
Dropzone.autoDiscover = false;
require('./announcementImages.js');