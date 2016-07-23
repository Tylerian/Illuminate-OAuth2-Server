<?php

namespace Tylerian\Illuminate\OAuth2\Server\Repositories;

use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use League\OAuth2\Server\Repositories\AccessTokenRepositoryInterface;

use Tylerian\Illuminate\Oauth2\Server\Models\AccessToken;
use Tylerian\Illuminate\OAuth2\Server\Exceptions\ResourceNotFoundException;

/**
 *
 */
class EloquentAccessTokenRepository implements AccessTokenRepositoryInterface
{
    /**
     * {@inheritdoc }
     */
    public function revokeAccessToken($identifier)
    {
        if ($access_token = AccessToken::find($identifier))
        {
            $access_token->setRevoked(true);
            $access_token->save();   return;
        }

        throw new ResourceNotFoundException('access token', $identifier);
    }
    
    /**
     * {@inheritdoc }
     */
    public function isAccessTokenRevoked($identifier)
    {
        if ($access_token = AccessToken::find($identifier))
        {
	        return $access_token->isRevoked();
        }

        throw new ResourceNotFoundException('access token', $identifier);
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