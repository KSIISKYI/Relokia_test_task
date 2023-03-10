<?php

namespace App\Loaders;

class CompanyDataLoader extends DataLoader
{
    public function sendRequest(int $company_id)
    {
        $response = $this->client->request(
            'GET',
            "api/v2/organizations/$company_id.json",
            [
                'auth' => [
                    $this->token ? $this->email . '/token' : $this->email,
                    $this->token ? $this->token : $this->password
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
