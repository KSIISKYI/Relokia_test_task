<?php

namespace App\Loaders;

class GroupDataLoader extends DataLoader
{
    public function sendRequest(int $group_id)
    {
        $response = $this->client->request(
            'GET',
            "api/v2/groups/$group_id.json",
            [
                'auth' => [
                    $this->token ? $this->email . '/token' : $this->email,
                    $this->token ? $this->token : $this->password
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
