<?php

namespace App\Http\Middleware;

use Closure;

class ActionMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $function_key, $action_keys) {
        $user = $request->session()->get('user');
        $action_keys = explode('|', $action_keys);
        if (isset($user->permissions[$function_key])) {
            foreach ($action_keys as $action_key) {
                if (in_array($action_key, $user->permissions[$function_key])) {
                    return $next($request);
                }
            }
        }
        if ($request->ajax()) {
            return response(json_encode([
                "code" => 403,
                "message" => "Không có quyền truy cập",
                "data" => ""
            ]));
        } else {
            return redirect()->action('Admin\HomeController@index')->with('error', 'Không có quyền truy cập');
        }
    }
}
