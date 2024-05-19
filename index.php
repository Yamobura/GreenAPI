<?php             
  require __DIR__ . '/APIfunctions.php';
  $apiURL = "https://7103.api.greenapi.com";          
    ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row d-flex mt-5">
            <div class="col">
                <form method="POST" action="index.php">
                    <div class="d-inline-grid col-6">
                        <input type="text" placeholder="Enter idInstance" class="mb-3" name="idInstance" value="7103937832">
                        <input type="text" placeholder="Enter ApiTokenInstance" class="mb-4" name = "apiTokenInstance" value="ea24520caf254b06b47881e11cff3e2a61c6f59ccc2d4912ae">
                        <input type="submit" class="button btn btn-primary mb-3" name="getSettings" value="getSettings" >
                        <input type="submit" class="button btn btn-primary mb-3" name="getStateInstance" value="getStateInstance" >
                    </div>

                    <div class="d-inline-grid mt-5 col-6">
                        <input type="text" placeholder="Enter contact info" class="mb-3" name="contactMessage" value="">
                        <input type="text" placeholder="Enter your message" class="mb-4" name="message" value="Hello world!">
                        <input type="submit" class="button btn btn-primary mb-3" name="sendMessage" value="sendMessage" >
                    </div>

                    <div class="d-inline-grid mt-5 col-6">
                        <input type="text" placeholder="77771234567" class="mb-3" name="contactFile" value="79248888291">
                        <input type="text" placeholder="Enter file path" class="mb-4" name="file" value="https://i.natgeofe.com/n/548467d8-c5f1-4551-9f58-6817a8d2c45e/NationalGeographic_2572187_square.jpg">
                        <input type="submit" class="button btn btn-primary mb-3" name="sendFileByUrl" value="sendFileByUrl" >
                    </div>

                </form>


            </div>
            <div class="col">
                <div>Ответ:</div>
                <div class="border h-100 overflow-auto">
  
                    <?php

                        if (isset($_POST['getSettings'])) {                          
                           getSettings($apiURL, $_POST);
                                    } 
                        if(isset($_POST['getStateInstance'])) { 
                        getStateInstance ($apiURL, $_POST); 
                        } 
                        if(isset($_POST['sendMessage'])) {
                            sendMessage ($apiURL,$_POST); 
                        } 

                        if(isset($_POST['sendFileByUrl'])) { 
                            //sendFileByUrl2 ($apiURL, $_POST['idInstance'], $_POST['apiTokenInstance'], $_POST['contactFile'], $_POST['file']);
                            sendFileByUrl ($apiURL, $_POST); 
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>

</html>