<?php

namespace App\Http\Middleware;

use Closure;

class BeforeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 这是前置中间件，在还未进入 $next 之前调用

        //return $next($request);

        $response = $next($request);

        // 这是后置中间件，$next 已经执行完毕并返回响应 $response，
        // 我们可以在此处对响应进行修改。

        return $response;
    }
}
