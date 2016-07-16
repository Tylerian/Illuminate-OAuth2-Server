<?php

namespace Tylerian\Illuminate\OAuth2\Server\Repositories;

use League\OAuth2\Server\Entities\AuthCodeEntityInterface;
use League\OAuth2\Server\Repositories\AuthCodeRepositoryInterface;

use Tylerian\Illuminate\OAuth2\Server\Models\AuthCode;
use Tylerian\Illuminate\OAuth2\Server\Exceptions\ResourceNotFoundException;

class EloquentAuthCodeRepository implements AuthCodeRepositoryInterface
{
    public function getNewAuthCode()
    {
        return new AuthCode;
    }

    public function revokeAuthCode($identifier)
    {
        if ($auth_code = AuthCode::find($identifier))
        {
            $auth_code->setRevoked(true);
            $auth_code->save();   return;
        }

        throw new ResourceNotFoundException('auth code', $identifier);
    }

    public function isAuthCodeRevoked($identifier)
    {
        if ($auth_code = AuthCode::find($identifier))
        {
            return $auth_code->isRevoked();
        }

        throw new ResourceNotFoundException('auth code', $identifier);
    }

    public function persistNewAuthCode(AuthCodeEntityInterface $entity)
    {
        $entity->save();
    }
}