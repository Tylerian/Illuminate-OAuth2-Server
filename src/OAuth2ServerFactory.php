<?php

namespace Tylerian\Illuminate\Oauth2\Server;

use League\OAuth2\Server\ResourceServer;
use League\OAuth2\Server\AuthorizationServer;

use League\OAuth2\Server\Repositories\

class OAuth2ServerFactory
{
    /*
     * Make a new OAuth2Server instance.
     *
     * @return Tylerian\Illuminate\Oauth2\Server\OAuth2Server
     */
    public function make($public_key, $private_key)
    {
        return new OAuth2Server(
            $this->makeResourceServer($public_key, $private_key),
            $this->makeAuthorizationServer($public_key, $private_key)
        );
    }

    private function makeResourceServer($public_key)
    {
        return new ResourceServer(
            $app->make(AccessTokenRepositoryInterface::class), $public_key
        );
    }

    private function makeAuthorizationServer($public_key, $private_key)
    {
        return new AuthorizationServer(
            $app->make(ClientRepositoryInterface::class),
            $app->make(AccessTokenRepositoryInterface::class),
            $app->make(ScopeRepositoryInterface::class),
            $public_key, $private_key
        );
    }
}