<?php

function returnResponse ($options, $url)
{
    $context = stream_context_create($options);
    $content = @file_get_contents($url, false, $context);
    
    if($content === FALSE) 
    {
        $content = "Data is invalid. Please check and submit again.";  
    }

    else {$content = str_replace(',', ",<br>", $content);}
     
    echo $content;
}

function getSettings ($apiURL, $dataArray)
{
    $idInstance = $dataArray['idInstance'];
    $apiTokenInstance = $dataArray['apiTokenInstance'];
    $url = "$apiURL/waInstance$idInstance/getSettings/$apiTokenInstance";

    $options = array(
    'http' => array(
        'header' => "Content-Type: application/json\r\n",
        'method' => 'GET'
    )
);

    echo returnResponse($options, $url);
}

function getStateInstance ($apiURL, $dataArray)
{
    $idInstance = $dataArray['idInstance'];
    $apiTokenInstance = $dataArray['apiTokenInstance'];
    $url = "$apiURL/waInstance$idInstance/getStateInstance/$apiTokenInstance";

    $options = array(
    'http' => array(
        'header' => "Content-Type: application/json\r\n",
        'method' => 'GET'
    )
);

    echo returnResponse($options, $url);
}

function sendMessage ($apiURL, $dataArray)
{
    $idInstance = $dataArray['idInstance'];
    $apiTokenInstance = $dataArray['apiTokenInstance'];
    $contact = $dataArray['contactMessage'];
    $message = $dataArray['message'];
    $url = "$apiURL/waInstance$idInstance/sendMessage/$apiTokenInstance";

    if ($message === "")
    {
        echo "Message is empty";
        exit;
    }
        $data = array(
        'chatId' => "$contact@c.us",
        'message' => "$message",
);


    $options = array(
    'http' => array(
        'header' => "Content-Type: application/json\r\n",
        'method' => 'POST',
        'content' => json_encode($data)
    )
);

    echo returnResponse($options, $url);
}

function sendFileByUrl ($apiURL, $dataArray)
{
    $idInstance = $dataArray['idInstance'];
    $apiTokenInstance = $dataArray['apiTokenInstance'];
    $contact = $dataArray['contactFile'];
    $fileURL = $dataArray['file'];
    $url = "$apiURL/waInstance$idInstance/sendFileByUrl/$apiTokenInstance";

if ($fileURL === "")
    {
        echo "URL is empty";
        exit;
    }

$data = array(
    'chatId' => "$contact@c.us",
    'urlFile' => "$fileURL",
    'fileName' => "test.jpg"
    );

    $options = array(
        'http' => array(
            'header' => "Content-Type: application/json\r\n",
            'method' => 'POST',
            'content' => json_encode($data)
        )
    );    

    echo returnResponse($options, $url);
}


function sendFileByUrl2 ($apiURL, $idInstance, $apiTokenInstance, $contact, $fileURL)
{
$url = "https://7103.api.greenapi.com/waInstance7103937832/sendFileByUrl/ea24520caf254b06b47881e11cff3e2a61c6f59ccc2d4912ae";


$data = array(
    'chatId' => "$contact@c.us",
    'urlFile' => "$fileURL",
    'fileName' => "test.jpg"
    );

    $options = array(
        'http' => array(
            'header' => "Content-Type: application/json\r\n",
            'method' => 'POST',
            'content' => json_encode($data)
        )
    );    

    $context = stream_context_create($options);

    $response = file_get_contents($url, false, $context);
    
    echo $response;
}

?>