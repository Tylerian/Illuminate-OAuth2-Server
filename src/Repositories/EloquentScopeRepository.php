<?php

namespace Tylerian\Illuminate\OAuth2\Server\Repositories;

use League\OAuth2\Server\Repositories\ScopeRepositoryInterface;

class EloquentScopeRepository implements ScopeRepositoryInterface
{
    public function getScopeEntityByIdentifier($identifier)
    {
        if ($scope = Scope::find($identifier))
        {
            return $scope;
        }
    }

    public function finalizeScopes(array $scopes, $grant_type, ClientEntityInterface $entity, $user_identifier = null)
    {
        // TODO: apply a filter to scopes by grant_type??

        return $scopes;
    }
}