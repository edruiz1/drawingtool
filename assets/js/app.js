// assets/js/app.js
require('../css/app.css');

var $ = require('jquery');

$(document).ready(function(){

  $("#clear-canvas").click(function(event) {
    clearCanvas();
  });

  $("#new-canvas").submit(function(event){
    event.preventDefault();
    clearError('canvas-error');
    clearCanvas();
    var h = parseInt($("#height").val());
    var w = parseInt($("#width").val());
    $.post('/new-canvas', {h:h, w:w}, function(data, textStatus, xhr) {
      if(textStatus == 'success' && data.status){
        $("#canvas").css({
          'width': data.width+'px',
          'height': data.height+'px',
          'margin': '10px auto'
        });
        $("#clear-canvas").css('visibility','visible').hide().fadeIn();
        $(".card-new-line").css('visibility','visible').hide().fadeIn();
        $(".card-new-rectangle").css('visibility','visible').hide().fadeIn();

      }
    },"json").fail(function(error) {
      errorDisplay('canvas-error' ,error.responseJSON.error.message);
    });
  });

  $("#new-line").submit(function(event) {
    event.preventDefault();
    clearError('line-error');
    x1 = parseInt($("#x1").val());
    x2 = parseInt($("#x2").val());
    y1 = parseInt($("#y1").val());
    y2 = parseInt($("#y2").val());
    postData = {
      x1:x1,
      y1:y1,
      x2:x2,
      y2:y2
    };
    $.post('/new-line', postData, function(data, textStatus, xhr) {
      if(textStatus == 'success' && data.status){
        var canvas = document.getElementById('canvas');
        var context = canvas.getContext('2d');
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.font = 'italic 12px sans-serif';
        context.strokeStyle = "red";
        context.lineWidth = "2";
        // Reset the current path
        context.beginPath();
        context.moveTo(x1,y1);
        for (i = x1; i <= x2; i+= 10) {
          for (j = y1; j <= y2; j+= 12) {
            context.strokeText('x', i, j);
          }
        }
      }
    }, "json").fail(function(error){
        errorDisplay('line-error', error.responseJSON.error.message);
    });
  });

  $("#new-rectangle").submit(function(event) {
    event.preventDefault();
    clearError('rectangle-error');
    rx1 = parseInt($("#rx1").val());
    rx2 = parseInt($("#rx2").val());
    ry1 = parseInt($("#ry1").val());
    ry2 = parseInt($("#ry2").val());
    postData = {
      rx1:rx1,
      ry1:ry1,
      rx2:rx2,
      ry2:ry2
    };
    $.post('/new-rectangle', postData, function(data, textStatus, xhr) {
      if(textStatus == 'success' && data.status){
        var canvas = document.getElementById('canvas');
        var context = canvas.getContext('2d');
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.font = 'italic 12px sans-serif';
        context.strokeStyle = "red";
        context.lineWidth = "2";
        // Reset the current path
        context.beginPath();
        context.moveTo(rx1,ry1);
        i = rx1;
        j = ry1;
        for (i = rx1; i <= rx2; i+= 10) {
          context.strokeText('x', i, ry1);
          context.strokeText('x', i, ry2);
        }
        context.moveTo(rx1,ry1);
        for (i = ry1; i <= ry2; i+= 10) {
          context.strokeText('x', rx1, i);
          context.strokeText('x', rx2, i);
        }
      }
    }, "json").fail(function(error){
        errorDisplay('rectangle-error', error.responseJSON.error.message);
    });
  });

});

function errorDisplay(id, message) {
  $("#"+id).css('visibility','visible').hide().fadeIn();
  $("#"+id).html('<span>'+message+'</span>');
}

function clearError(id) {
  $("#"+id).hide();
  $("#"+id).html();
  $("input").removeClass('alert-danger');
}

function clearCanvas() {
  var canvas = document.getElementById('canvas');
  var context = canvas.getContext('2d');
  context.clearRect(0, 0, canvas.width, canvas.height);
}
