<?php 

    require "init.php";

    $client = new Google_Client;
    $google = new GoogleAuth($client);

    

    $data = $google->checkRedirectCodeAndGetPayload();
    $_SESSION['user'] = (json_decode(json_encode($data)));
    header("location: profile.php");


 ?>