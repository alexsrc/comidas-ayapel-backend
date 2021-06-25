<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;


class JwtMiddleware
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;
    public $request;

    /**
     * Create a new middleware instance.
     *
     * @param \Illuminate\Contracts\Auth\Factory $auth
     * @return void
     */
    public function __construct(Auth $auth, Request $request)
    {
        $this->auth = $auth;
        $this->request = $request;
    }

    public function bearerToken()
    {
        $header = $this->request->header('Authorization', '');
        if (Str::startsWith($header, 'Bearer ')) {
            return Str::substr($header, 7);
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        try {

            $token = $this->bearerToken();
            $request->request->add(['token' => $token]);
            $tokenDecode = JWT::decode($token, env('JWT_SECRET'),array('HS256'));
            $decoded_array = (array)$tokenDecode;
            $clienteId = $decoded_array['sub'];
            $request->request->add(['clientId' => $clienteId]);

        } catch (\Exception $ex) {
            return response("Unauthorized ".$ex->getMessage(), 401);
        }
        if ($token == "") {
            return response("Unauthorized. {$token}", 401);
        }


        return $next($request);
    }
}
