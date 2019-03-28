// assets/js/app.js
require('../css/app.css');

var $ = require('jquery');

$(document).ready(function(){
  $("#new_canvas_btn").click(function(event){
    event.preventDefault();
    var h = $("#height").val();
    var w = $("#width").val();
    $.post('/new-canvas', {h:h, w:w}, function(data, textStatus, xhr) {
      console.log(data);
    });
  });
});
