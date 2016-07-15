<?php

namespace Tylerian\Lumen\OAuth2\Server\Models;

use League\OAuth2\Server\Entities\ScopeEntityInterface;

class Scope extends Eloquent implements ScopeEntityInterface
{
    protected $table = 'oauth2_scopes';

    public function getIdentifier()
    {
        return $this->id;
    }
}