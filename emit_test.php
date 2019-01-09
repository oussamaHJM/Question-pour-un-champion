<?php
/**
 * Created by Oussama.
 * User: oussama
 * Date: 03/03/2018
 * Time: 21:29
 */

include ("vendor/autoload.php");
use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;



if (isset($_POST["submit"]))
{

    $form_data = array("first_name"=>$_POST["first_name"],"last_name"=>$_POST["last_name"],"email"=>$_POST["email"],"message"=>$_POST["message"]);

    $version = new Version2X("http://localhost:3001");
    $client = new Client($version);

    $client->initialize();
    $client->emit("new_order", $form_data);
    $client->close();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/bootstrap.min.css">
        <title>Form</title>
    </head>
    <body>
        <div>
            <form action="" method="post">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-1">
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input id="first_name" type="text" name="first_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input id="last_name" type="text" name="last_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message">Special Instructions</label>
                            <textarea id="message" name="message" class="form-control" cols="5"></textarea>
                        </div>
                        <div class="form-inline text-center">
                            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>