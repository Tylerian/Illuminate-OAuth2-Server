<?php

namespace Tylerian\Illuminate\OAuth2\Server\Repositories;

use Closure;

use Tylerian\Illuminate\OAuth2\Server\Models\Client;

use League\OAuth2\Server\Repositories\ClientRepositoryInterface;

class EloquentClientRepository implements ClientRepositoryInterface
{
    private $validator;

    public function __construct(Closure $validator = null)
    {
        $this->validator = $validator ?: function($value, $expected)
        {
            return password_verify($value, $expected);
        };
    }

    public function getClientEntity($identifier, $grant_type, $secret = null, $validate = true)
    {
        if ($client = Client::find($identifier))
        {
            if (!$validate)
            {
                return $client;
            }

            else if ($client->getSecret() && call_user_func($this->validator, $client->getSecret(), $secret))
            {
                return $client;
            }
        }
    }
}