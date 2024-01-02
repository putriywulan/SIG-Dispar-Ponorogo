<?php
require_once 'vendor/autoload.php';

class Auth
{

    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
    }
    public function connect()
    {
        $google_client = new Google_Client();
        $google_client->setClientId('214159041181-ndrcl3f1foees6inbag1715scplpcimd.apps.googleusercontent.com');
        $google_client->setClientSecret('2dZo47hBgVY9Wq6n89VNM9YU');
        $google_client->setRedirectUri('https://localhost/sig_wisata/Home');
        $google_client->addScope('email');
        $google_client->addScope('profile');

        return $google_client;
    }
}
