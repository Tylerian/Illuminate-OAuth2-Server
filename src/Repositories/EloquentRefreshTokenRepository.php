<?php

namespace Tylerian\Illuminate\OAuth2\Server\Repositories;

use League\OAuth2\Server\Entities\RefreshTokenEntityInterface;
use League\OAuth2\Server\Repositories\RefreshTokenRepositoryInterface;

use Tylerian\Illuminate\OAuth2\Server\Models\RefreshToken;
use Tylerian\Illuminate\OAuth2\Server\Exceptions\ResourceNotFoundException;

class EloquentRefreshTokenRepository implements RefreshTokenRepositoryInterface
{
    public function getNewRefreshToken()
    {
        return new RefreshToken;
    }

    public function revokeRefreshToken($identifier)
    {
        if ($refresh_token = RefreshToken::find($identifier))
        {
            $refresh_token->setRevoked(true);
            $refresh_token->save();   return;
        }

        throw new ResourceNotFoundException('refresh token', $identifier);
    }

    public function isRefreshTokenRevoked($identifier)
    {
        if ($refresh_token = RefreshToken::find($identifier))
        {
            return $refresh_token->isRevoked();
        }

        throw new ResourceNotFoundException('refresh token', $identifier);
    }

    public function persistNewRefreshToken(RefreshTokenEntityInterface $entity)
    {
        $entity->save();
    }
}