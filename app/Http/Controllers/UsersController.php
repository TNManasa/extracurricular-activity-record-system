<?php

namespace App\Http\Controllers;

use App\Sport;
use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{
    public function loginUser(Request $request)
    {
        $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);

        $email=$request['email'];
        $pwd = $request['password'];

        $qry = DB::select('select password,role from users where email = ?',[$email]);

        //if there is no such email
        if ($qry==null){
            return view('user_login', ['customMessage' => 'email is not registered']);
        }

        //get the value of password
        $resultPassword=null;
        $resultRole=null;
        foreach ($qry as $row) {
            $resultPassword= $row->password;
            $resultRole=$row->role;
        }

        $resultPassword=bcrypt($resultPassword);
        if($resultPassword==$pwd){
            //if logged in user is student return to current dashboard, needs to be fixed when complete
            if($resultRole == 'student'){
                return view('welcome');
            }
            //if supervisor still no such view
            else{
                return 'not an student';
            }
        }else{

            return view('user_login', ['customMessage' => 'password missmatch error']);
        }
    }
}
