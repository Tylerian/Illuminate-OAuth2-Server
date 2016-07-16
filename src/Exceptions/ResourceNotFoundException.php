<?php

namespace Tylerian\Illuminate\Oauth2\Server\Exceptions;

use League\OAuth2\Server\Exception\OAuthServerException;

class ResourceNotFoundException extends OAuthServerException
{
    const ERROR_MESSAGE = 'Could not find any %s with id \'%s\'.';

    public function __construct($resource, $identifier)
    {
        $message  = sprintf(ERROR_MESSAGE, $resource, $identifier);
        $resource = strtolower(str_replace(' ', '_', $resource));
        
        parent::__construct($message, 100, sprintf('%s_not_found', $resource), 404);
    }
}