<?php

namespace Tylerian\Illuminate\OAuth2\Server\Models;

use League\OAuth2\Server\Entities\ClientEntityInterface;

class Client extends Eloquent implements ClientEntityInterface
{
    protected $table = 'oauth2_clients';

    public function getName()
    {
        return $this->name;
    }

    public function getSecret()
    {
        return $this->secret;
    }

    public function getIdentifier()
    {
        return $this->id;
    }

    public function getRedirectUri()
    {
        return $this->redirect_url;
    }
}