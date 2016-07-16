<?php

namespace Tylerian\Lumen\OAuth2\Server\Models;

use DateTime;

use Carbon\Carbon;

use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use League\OAuth2\Server\Entities\RefreshTokenEntityInterface;

class OAuth2RefreshToken extends Eloquent implements RefreshTokenEntityInterface
{
    protected $table = 'oauth2_tokens_refresh';
    protected $access_token;

    public function getIdentifier()
    {
        return $this->id;
    }

    public function setIdentifier($identifier)
    {
        $this->id = $identifier;
    }

    public function getExpiryDateTime()
    {
        return Carbon::createFromTimestamp($this->expires_at);
    }

    public function setExpiryDateTime(DateTime $date)
    {
        $this->expires_at = $date->getTimestamp();
    }

    public function getAccessToken()
    {
        return $this->access_token;
    }

    public function setAccessToken(AccessTokenEntityInterface $access_token)
    {
        $this->access_token = $access_token;
    }
}