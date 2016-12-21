<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use DB;

class User implements Authenticatable
{
    public $id;
    public $email;
    public $password;
    public $role;
    public $_token;

    use Notifiable;

    public static function getUserRole($id){
        $studentCheck = DB::select('select * from students where students.user_id=?', [$id]);
        if($studentCheck != null){
            return 1;   // student
        }

        $supervisorCheck = DB::select('select * from supervisors where supervisors.user_id=?', [$id]);
        if($supervisorCheck != null){
            return 2;   // supervisor
        }

        $adminCheck = DB::select('select * from admin where admin.user_id=?', [$id]);
        if($adminCheck != null){
            return 3;
        }
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return "id";
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }

    //by salaka
    public static function findStudentIndex($id){
        $studentqry= DB::select('select index_no from students where user_id= ?',[$id]);
        $result_index = null;
        foreach ($studentqry as $student) {
            $result_index = $student->index_no;
        }
        return $result_index;
    }

    public static function findSupervisorID($id){
    $studentqry= DB::select('select emp_id from supervisors where user_id= ?',[$id]);
    $result_index = null;
    foreach ($studentqry as $student) {
        $result_index = $student->emp_id;
    }
    return $result_index;
}

    public static function findById($id){
        $user = DB::select('select * from users where id=?', [$id]);
        return $user;
    }

    public static function getEmailById($id){
        $user = self::findById($id);
        $email = $user[0]->email;
        return $email;
    }

    public static function getAll(){
        $raw_users = DB::select('select * from users');
        $users = [];

        foreach($raw_users as $user){
            $u = new User();
            $u->id = $user->id;
            $u->email = $user->email;
            $u->role = $user->role;
            array_push($users, $u);
        }

        return $users;
    }

    public static function getFlag($user_id){
        $resultsSet = DB::select('select flag from users where id=?', [$user_id]);
        $flag = $resultsSet[0]->flag;
        return $flag;
    }

    public static function toggleFlag($user_id){
        if(self::getFlag($user_id) == 0){
            DB::update('update users set flag=? where id=?', ['1', $user_id]);
        }else if(self::getFlag($user_id) == 1){
            DB::update('update users set flag=? where id=?', ['0', $user_id]);
        }
    }
}
