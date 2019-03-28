var socket = require('socket.io');
var express = require('express');
var mysql = require("mysql");

var app = express();
var server = app.listen(process.env.PORT || 4444, function(){
  console.log("HUNTER");
});

//static files
app.use(express.static('public'));

var io = socket(server);

io.on('connection', function(socket){
  console.log("Made connection" + socket.id);
  io.to(socket.id).emit('hunter', "Hi");


//make the connection with the database
var connection = mysql.createConnection({
  host: 'sql306.epizy.com',
  user: 'epiz_23130910',
  password: 'QeVKvzQVAK',
  database: 'epiz_23130910_test'

});


connection.connect((err) =>{
  if (err) {
    throw err;
  }
  console.log("Connection is done with the database");
});


let sql2 = "INSERT INTO `hunter`(`name`) VALUES ('Mohammad')";
  connection.query(sql2, function(err, rows){
    if(err) {
      console.log(err);
      return;
    }
    console.log("Query inserted");
  });



  socket.on('hunter', function(data){
    console.log(data);
    io.to(socket.id).emit('hunter', data);

  });
});
