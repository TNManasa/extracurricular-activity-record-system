<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Illuminate\Support\Facades\Auth;

class CheckStudent
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
            $id=Auth::user()->id;
            $qry=DB::select('select role from users where id = ?',[$id]);
            if($qry==null){
                return redirect()->back();
            }else{
                return $next($request);
            }

        }else{
            return redirect()->back();
        }

    }
}
