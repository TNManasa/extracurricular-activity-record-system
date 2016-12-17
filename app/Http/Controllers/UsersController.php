<?php

namespace App\Http\Controllers;

use App\Sport;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Crypt;
use App\User;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    public function loginUser(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request['email'];
        $pwd = $request['password'];

        $qry = DB::select('select id,password from users where email = ?', [$email]);

        //if there is no such email
        if ($qry == null) {
            return view('user_login', ['customMessage' => 'email is not registered']);

        } else {

            //get the value of password
            $resultPassword = null;
            $resultId = null;
            foreach ($qry as $row) {
                $resultPassword = $row->password;
                $resultId = $row->id;

            }

            $resultPassword = Crypt::decrypt($resultPassword);
            if ($resultPassword == $pwd) {

                //to authenticate the user, whose passwords are matched
                $user = new User();
                $user->id = $resultId;
                $user->password = $pwd;
                Auth::login($user);

                //to find the type of user , omitting that role field
                $subqry1= DB::select('select * from students where user_id = ?', [$resultId]);
                $subqry2 = DB::select('select * from supervisors where user_id = ?', [$resultId]);

                if($subqry1==null and $subqry2!=null){
                    return redirect()->route('supervisors.dashboard');
                }elseif ($subqry2==null and $subqry1!=null){
                    return redirect()->route('students.dashboard');
                }else{
                    return 1;
                }

            } else {

                return view('user_login', ['customMessage' => 'password missmatch error']);
            }

        }
    }
}
