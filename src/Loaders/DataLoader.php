<?php

namespace App\Loaders;

use GuzzleHttp\Client;

abstract class DataLoader
{
    protected $base_url;
    protected $email;
    protected $password;
    protected $token;
    protected $client;

    public function __construct(string $base_url, string $email, string $password = null, $token = null)
    {
        $this->base_url = $base_url;
        $this->email = $email;
        $this->password = $password;
        $this->token = $token;
        $this->client = null;
        self::setClient();
    }

    protected function setClient()
    {
        $this->client = new Client(['base_uri' => $this->base_url]);
    }
}
