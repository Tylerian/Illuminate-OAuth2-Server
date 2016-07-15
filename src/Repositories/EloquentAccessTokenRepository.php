<?php

namespace Tylerian\Illuminate\OAuth2\Server\Repositores;

use Tylerian\Illuminate\Oauth2\Server\Models;
use Tylerian\Illuminate\Oauth2\Server\Exceptions;

use League\OAuth2\Server\Repositories\AccessTokenRepositoryInterface;

class EloquentAccessTokenRepository implements AccessTokenRepositoryInterface
{
    /**
     * {@inheritdoc }
     */
    public function revokeAccessToken($identifier)
    {
        $access_token = AccessToken::find($identifier);

        if ($access_token)
        {
            $access_token->setRevoked(true);
            $access_token->save();
        }

        else
        {
            throw new AccessTokenNotFoundException($identifier);
        }
    }
    
    /**
     * {@inheritdoc }
     */
    public function isAccessTokenRevoked($identifier)
    {
        $access_token = AccessToken::find($identifier);

        if ($access_token)
        {
	        return $access_token->isRevoked();
        }

        throw new AccessTokenNotFoundException($identifier);
    }

    /**
     * {@inheritdoc }
     */
    public function persistNewAccessToken(AccessTokenEntityInterface $entity)
    {
        $access_token->save();
    }
    
    /**
     * {@inheritdoc }
     */
    public function getNewToken(ClientEntityInterface $entity, array $scopes, $user_identifier = null)
    {
        $access_token = new AccessToken;
        
        try
        {
            $access_token->setClient($entity);

            foreach ($scopes as $scope)
            {
                $access_token->addScope($scope);
            }

            $access_token->setUserIdentifier($user_identifier);
        }

        finally
        {
            return $access_token;
        }
    }
}