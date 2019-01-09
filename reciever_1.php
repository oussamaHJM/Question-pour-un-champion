<!D
OCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CSS/Style.css">
        <link rel="stylesheet" href="http://localhost/php_socket.io/CSS/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.min.js"></script>
        <title>Reciever</title>
    </head>
    <body>
    <div class="container1">
        <h6>Processing, please wait.</h6>
        <div class="progress-bar">
            <div class="shadow"></div>
        </div>
    </div>
    <h2></h2>
    <table class="table table-responsive">
        <tr>
            <th>User ID</th>
            <th>Question</th>
            <th>Réponse</th>
        </tr>
    </table>


    <script>
        var socket = io.connect("http://localhost:3001");
        socket.on("new_order",function (data){
            if (data.StartCompetition==1)
                location.replace("View/Reponse.php");
            if (data.RefreshValue==1)
                location.reload();
            else
            {
                $("h2").text(""+data.Question);
                $("table").append("<tr> <td>"+data.User_id+"</td><td>"+data.Question+"</td><td>"+data.Reponse+"</td><tr>");
            }
        })
    </script>
    </body>
</html>