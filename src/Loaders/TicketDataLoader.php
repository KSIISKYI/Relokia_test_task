<?php

namespace App\Loaders;
 
class TicketDataLoader extends DataLoader
{
    protected $per_page;
    protected $current_page_number;

    public function __construct(string $base_url, string $email, int $per_page, string $password = null, $token = null)
    {
        parent::__construct($base_url, $email, $password, $token);
        $this->per_page = $per_page;
        $this->current_page_number = 1;
    }

    public function sendRequest()
    {
        $response = $this->client->request(
            'GET',
            "api/v2/tickets.json?per_page=$this->per_page&page=$this->current_page_number", 
            [
                'auth' => [
                    $this->token ? $this->email . '/token' : $this->email,
                    $this->token ? $this->token : $this->password
            ]
        ]);

        $this->current_page_number++;

        return json_decode($response->getBody()->getContents(), true);
    }
    
}
