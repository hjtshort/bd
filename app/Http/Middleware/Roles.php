<?php

namespace App\Http\Middleware;

use App\models\User;
use Closure;
use App\models\roles as role;
use Illuminate\Support\Facades\Auth;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        role::where('role_alias', '=', $request->route()->getPrefix())->firstOrCreate(['role_alias' => $request->route()->getPrefix()]);
        $info = Auth::user();
        if($info->permisson!=''){
            $arrayPermission = json_encode($info->permission);
        }else{
            $arrayPermission = [];
        }
        if($info->isAdmin==1 || in_array($request->route()->getPrefix(),$arrayPermission) ){
            return $next($request);
        }else{
            return redirect()->route('index')->with(['error'=>'Bạn không đủ quyền']);
        }
    }
}
