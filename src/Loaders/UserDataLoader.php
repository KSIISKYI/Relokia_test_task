<?php

namespace App\Loaders;

class UserDataLoader extends DataLoader
{
    public function sendRequest(int $user_id)
    {
        $response = $this->client->request(
            'GET',
            "api/v2/users/$user_id.json",
            [
                'auth' => [
                    $this->token ? $this->email . '/token' : $this->email,
                    $this->token ? $this->token : $this->password
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}
