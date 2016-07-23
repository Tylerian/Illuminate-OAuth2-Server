<?php

namespace Tylerian\Illuminate\OAuth2\Server\Middleware;

use Exception;

use League\OAuth2\Server\AuthorizationServer;
use League\OAuth2\Server\Exception\OAuthServerException;

class AuthorizationServerMiddleware
{
    /**
     * The AuthorizationServer instance.
     *
     * @var \League\OAuth2\Server\AuthorizationServer
     */
    private $server;

    /**
     * Create a new AuthorizationServerMiddleware instance.
     *
     * @param \League\OAuth2\Server\AuthorizationServer $server
     */
    public function __construct(AuthorizationServer $server)
    {
        $this->server = $server;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param int                      $limit
     * @param int                      $time
     *
     * @throws \League\OAuth2\Server\Exception\OAuthServerException
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $limit = 10, $time = 60)
    {
        try
        {
             $response = $this->server->respondToAccessTokenRequest($request, $response);
        }

        catch (OAuthServerException $exception)
        {
            return $exception->generateHttpResponse($response);
        }

        catch (Exception $exception)
        {
            return (new OAuthServerException($exception->getMessage(), 0, 'unknown_error', 500))->generateHttpResponse($response);
        }

        return $next($request);
    }
}