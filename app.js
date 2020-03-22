const http = require('http');
const fs = require('fs');

const app = http.createServer(function(request,response){
    console.log(request)
    console.log(response)
    var url = request.url;
    if(request.url == '/'){
      url = '/intro.html';
    }
    if(request.url == '/favicon.ico'){
      response.writeHead(404);
      response.end();
      return;
    }
    response.writeHead(200);
    response.end(fs.readFileSync(__dirname + url));
 
});
app.listen(8080);