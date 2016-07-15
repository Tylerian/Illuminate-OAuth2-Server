<?php

namespace Tylerian\Lumen\OAuth2\Server\Models;

use DateTime;

use Carbon\Carbon;

class AuthCode extends Eloquent implements AuthCodeEntityInterface
{
    private $client;
    private $revoked;
    private $scopes;

    protected $table = 'oauth2_auth_codes';    

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

    public function getClient()
    {
        return $this->client;
    }

    public function getScopes()
    {
        return $this->scopes;
    }

    public function getRedirectUri()
    {
        return $this->redirect_url;
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

    public function setRevoked($revoked)
    {
        $this->revoked = $revoked;
    }

    public function setClient(ClientEntityInterface $client)
    {
        $this->client = $client;
    }

    public function setRedirectUri($uri)
    {
        $this->redirect_url = $uri;
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