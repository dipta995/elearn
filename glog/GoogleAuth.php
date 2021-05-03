<?php

/**
* Google Authentication Class
*/
class GoogleAuth
{
    protected $client;
    protected $guzzle;
    public function __construct(Google_Client $google_client)
    {
       $this->client = $google_client;
       if ($this->client) {
           $this->client->setClientId('1021791098858-78cdan0k6p0ucjl9c5qpqfbgeeo7euht.apps.googleusercontent.com');
           $this->client->setClientSecret('x5iXt5IlYe62XxHdf9C7khC0');
           $this->client->setRedirectUri('http://localhost/elearn/glog/callback.php');
           
           $this->client->setScopes(['https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/plus.profile.emails.read']);
       }
    }
    public function getAuthUrl()
    {
        return $this->client->createAuthUrl();
    }
    public function setToken($token)
    {
        $_SESSION['access_token'] = $token;
        $this->client->setAccessToken($token);
    }
    public function getPayload()
    {
        $token = $this->client->getAccessToken();
        $token_array = $this->client->verifyIdToken($token['id_token']);
        if ($token_array) {
            return $token_array;
        }
        return false;
    }
    public function checkRedirectCodeAndGetPayload()
    {
        if (isset($_GET['code'])) {
            $authenticate = $this->client->authenticate($_GET['code']);
            $this->setToken($this->client->getAccessToken());
            $payload = $this->getPayload();
            return $payload;
        }
        return false;
    }


}