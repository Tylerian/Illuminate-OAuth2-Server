<?php

namespace Tylerian\Illuminate\OAuth2\Server\Repositores;

class EloquentAuthCodeRepository implements AuthCodeRepository
{
    public function getNewAuthCode()
    {
        return new AuthCode;
    }

    public function revokeAuthCode($identifier)
    {
        $auth_code = AuthCode::find($identifier);

        if ($auth_code)
        {
            $auth_code->setRevoked(true);
            $auth_code->save();
        }
    }

    public function isAuthCodeRevoked($identifier)
    {
        $auth_code = AuthCode::find($identifier);

        if ($auth_code)
        {
            return $auth_code->isRevoked();
        }

        return false;
    }

    public function persistNewAuthCode(AuthCodeEntityInterface $entity)
    {
        $entity->save();
    }
}