<?php

namespace Tylerian\OAuth2Server\Models;

use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\Traits\RefreshTokenTrait;
use League\OAuth2\Server\Entities\RefreshTokenEntityInterface;

class OAuth2RefreshToken extends Eloquent implements RefreshTokenEntityInterface
{
    use EntityTrait,
        RefreshTokenTrait;

    private $client;

    public function getClient()
    {
        return $this->client ?? false;
    }

    public function getScopes()
    {
        return explode(' ', $this->scopes);
    }

    public function getAccessToken()
    {
        return $this->id_access_token;
    }

    public function getExpiryDateTime()
    {
        return Carbon::createFromTimestamp($this->expires_at);
    }

    public function setExpiryDateTime(\DateTime $datetime)
    {
        $this->expires_at = $datetime->getTimestamp();
    }

    public function getUserIdentifier()
    {
        return $this->id_account;
    }
}