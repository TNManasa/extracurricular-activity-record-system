<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if(Auth::check()){
            $id=Auth::id();
            $qry=DB::select('select * from admin where user_id = ?',[$id]);
            if($qry==null){
                return redirect()->back();
            }else{
                return $next($request);
            }

        }else{
            return redirect()->route('/login');
        }

    }
}
