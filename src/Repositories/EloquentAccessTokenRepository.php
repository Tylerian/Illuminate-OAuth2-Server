<?php

namespace Tylerian\OAuth2Server\Repositores;

use League\OAuth2\Server\Repositories\AccessTokenRepositoryInterface;

class EloquentAccessTokenRepository implements AccessTokenRepositoryInterface
{
    /**
     * {@inheritdoc }
     */
    public function revokeAccessToken($tokenId)
    {
        
    }
    
    /**
     * {@inheritdoc }
     */
    public function isAccessTokenRevoked($tokenId)
    {
        
    }

    /**
     * {@inheritdoc }
     */
    public function persistNewAccessToken(AccessTokenEntityInterface $accessTokenEntity)
    {

    }
    
    /**
     * {@inheritdoc }
     */
    public function getNewToken(ClientEntityInterface $clientEntity, array $scopes, $userIdentifier = null)
    {

    }
}