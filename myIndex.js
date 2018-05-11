var app = require('express');

var server = require('http').Server(app);

var io = require('socket.io')(server);


var redis = require('redis');

 var axios = require('axios');

var defaultRoom = null;

var users = [];



server.listen(8890);


io.on('connection', function(socket){

  console.log('Client connected');

console.log(socket.id)

io.sockets.emit('ImOnline', socket.id)

var redisClient = redis.createClient();


redisClient.subscribe('message');



redisClient.on('message', function(channel, message){

  console.log('myEvent' + channel + message);

  socket.emit(channel, message);

});



redisClient.on('disconnect', function(){

redisClient.quit();
});

socket.on('new message', function(message){

  console.log("myMessage" + message);
});

socket.on('latestMessage', function(latestmessage){


var connected = false


  if(defaultRoom == socket.room){



    io.in(defaultRoom).clients(function (error, clients) {
                  if (error) { throw error; }



  if(clients.length<3){

                  for(var i =0; i<clients.length; i++){

                    if(clients[i] != socket.id){
                        connected = true
                      io.to(clients[i]).emit('sendMessage', {message: latestmessage.message, friend: latestmessage.friend, messagedata: latestmessage.messagedata, clientsData: clients, bonusdata: latestmessage.bonusdata, isConnected:connected})

                        connected = false
                    }
                  }

                }
                if(!connected){


                        if(latestmessage.friend['previous_conn_id'] != latestmessage.friend['current_conn_id']){

                          io.to(latestmessage.friend['current_conn_id']).emit('messageNotification', {bonusdata: latestmessage.myId})

                          io.to(latestmessage.friend['previous_conn_id']).emit('messageNotification', {bonusdata: latestmessage.myId})
                        }
                        else{

                            io.to(latestmessage.friend['previous_conn_id']).emit('messageNotification', {bonusdata: latestmessage.myId})
                        }



                }

                    console.log(clients[1], clients)



              });



  }
  {}







});


socket.on('friendOnline', function(data){

  io.sockets.emit('yourFriend', data)

})

socket.on('roomdata', function(data){

if(data.currentRole == 'tutor'){

  if(defaultRoom){

    socket.leave(defaultRoom)


  io.in(data.firstUser + data.secondUser).clients(function (error, clients) {
                if (error) { throw error; }

              if(clients.length <2){

                socket.join(data.firstUser + data.secondUser);

                defaultRoom = data.firstUser + data.secondUser;

                socket.room = defaultRoom
              }

            });

}
else{
      socket.leave(defaultRoom)
  socket.join(data.firstUser + data.secondUser);

  defaultRoom = data.firstUser + data.secondUser;

    socket.room = defaultRoom

}
}
else{

  if(defaultRoom){





  io.in(data.secondUser + data.firstUser).clients(function (error, clients) {
                if (error) { throw error; }

              if(clients.length <3){

                socket.join(data.secondUser + data.firstUser);

                defaultRoom = data.secondUser + data.firstUser;
                  socket.room = defaultRoom
              }

            });
}

else{
  socket.join(data.secondUser + data.firstUser);

  defaultRoom = data.secondUser + data.firstUser;
    socket.room = defaultRoom

}

}

console.log(io.sockets.adapter.rooms["12"]);
console.log('his socket', data.mySocketId)
console.log('mysocket', socket.id)


})


socket.on('ImOn', function(data){

  users.push(socket.id)
  io.sockets.emit('Now', data)
  console.log(users)
})


socket.on('forceDisconnect', function(data){

  io.sockets.connected[data].disconnect();
})


socket.on('disconnect', function(){



io.sockets.emit('userDisconnected', socket.id)




    console.log('disconnected', socket.id)


});


});
