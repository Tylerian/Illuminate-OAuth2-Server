<?php

namespace Tylerian\Lumen\OAuth2\Server\Models;

use Carbon\Carbon;

use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\Traits\AccessTokenTrait;
use League\OAuth2\Server\Entities\AccessTokenEntityInterface;

class AccessToken extends Eloquent implements AccessTokenEntityInterface
{
    use AccessTokenTrait;

    protected $client;
    protected $scopes;

    protected $table = 'oauth2_tokens_access';

    public function isExpired()
    {
        return Carbon::now()->gte(
            $this->getExpiryDateTime()
        );
    }

    public function isRevoked()
    {
        return $this->revoked;
    }

    public function setRevoked($value)
    {
        $this->revoked = value;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function setClient(ClientEntityInterface $client)
    {
        $this->client = $client;
    }

    public function getScopes()
    {
        return $this->scopes;
    }
    
    public function getExpiryDateTime()
    {
        return Carbon::fromTimestamp(
            $this->expires_at
        );
    }

    public function getUserIdentifier()
    {
        return $this->id_account;
    }

    public function setExpiryDateTime(DateTime $date)
    {
        $this->expires_at = $date->getTimestamp();
    }

    public function addScope(ScopeEntityInterface $scope)
    {
        if (!is_array($this->scopes))
        {
            $this->scopes = array();
        }

        array_push($this->scopes, $scope);
    }
}