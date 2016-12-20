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
            $id=Auth::id();
            $qry=DB::select('select * from students where user_id = ?',[$id]);
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
