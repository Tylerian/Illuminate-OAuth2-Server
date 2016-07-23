<?php

namespace Tylerian\Illuminate\Oauth2\Server;

class OAuth2Server
{
    private $resource_server;
    private $authorization_server;

    public function __construct(ResourceServer $resource_server, AuthorizationServer $authorization_server)
    {
        $this->resource_server      = $resource_server;
        $this->authorization_server = $authorization_server;
    }
}