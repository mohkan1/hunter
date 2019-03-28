//Make connection
//https://huntermonster4.herokuapp.com/
var socket = io.connect('https://huntermonster5.herokuapp.com/');

socket.on('hunter', function(data){
  alert(data);

});


$('#submit').click(function(){
  var val = $('#input').val();
  socket.emit('hunter', val);
});
