<?php

namespace App\Http\Middleware;

use Closure;
use Auth0\SDK\JWTVerifier;

class Auth0Middleware
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->hasHeader('Authorization')) {
          return response()->json('Authorization Header not found', 401);
        }

        $token = $request->bearerToken();

        if($request->header('Authorization') == null || $token == null) {
          return response()->json('No token provided', 401);
        }

        $this->retrieveAndValidateToken($token);
        
        return $next($request);
    }

    public function retrieveAndValidateToken($token)
    {
        try {
            $verifier = new JWTVerifier([
                'valid_audiences' => ['https://api.unitext.sk'],
                'client_id' => '2kLMGHnhWqNGICSKgZbUnK0UnqhIaMqd',
                'client_secret' => '01HksOQxbLDWc8qnYJTp2ogQF0gIZuNyq0W922RTkLFfathZOyLex0knEkMRAtpR'
            ]);

            $decoded = $verifier->verifyAndDecode($token);
        }
        catch(\Auth0\SDK\Exception\CoreException $e) {
            throw $e;
        };
    }

}
