<?php

namespace Tylerian\Illuminate\Oauth2\Server\Exceptions;

use League\OAuth2\Server\Exception\OAuthServerException;

class UniqueTokenIdentifierConstraintViolationException extends OAuthServerException
{
    const ERROR_MESSAGE = 'Could not find any access token with id \'%s\'.';

    public function __construct($identifier)
    {
        $message = sprintf(ERROR_MESSAGE, $identifier);
        parent::__construct($message, 100, 'access_token_not_found', 404);
    }
}