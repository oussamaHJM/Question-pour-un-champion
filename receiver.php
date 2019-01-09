<!DOCTYPE html>
<html lang="en">
<head>
	<title>Spectateur</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="CSS/util.css">
	<link rel="stylesheet" type="text/css" href="CSS/main.css">
<!--===============================================================================================-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.3/socket.io.min.js"></script>
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter" style="z-index: 0;">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
                    <div class="rowprog">
                        <div class="progress">
                            <div class="progress-bar">
                                <div class="progress-shadow"></div>
                            </div>
                        </div>
                    </div>
                    <h1 style="width: 100%; text-align: center; color: #fff"></h1>
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Participant</th>
								<th class="column2">Réponse</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

    <script>
        var socket = io.connect("http://localhost:3001");
        socket.on("new_order",function (data){
            if (data.RefreshValue==1)
                location.reload();
            else
            {
                $("h1").text(""+data.Question);
                $("tbody").append('<tr> <td class="column1">'+data.User_id+'</td><td class="column2">'+data.Reponse+'</td><tr>');
            }
        })
    </script>

	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/maintab.js"></script>

</body>
</html>