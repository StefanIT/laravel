<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;


class Users 
{
    //
    public $user_id;
    public $first_name;
    public $last_name;
    public $email;
    public $username;
    public $password;
    public $rePw;
    public $created_at;
    public $updated_at;
    public $picture_id;
    public $role_id;

    public function all()
    {
    	$result = DB::table('users')
                    ->join('pictures','users.picture_id','pictures.picture_id')
    				->get();
    	return $result;
    }

    public function login()
    {
    	$result = DB::table('users')
					->select('users.*','roles.role')
					->join('roles','users.role_id', '=', 'roles.role_id')
					->where([
						'name' => $this->username,
						'password' => md5($this->password)
					])
					->first();
    	return $result;
    }

    

    public function save()
    {
        $result = DB::table('users')
                    ->insert([
                        'name' => $this->username,
                        'first_name' => $this->first_name,
                        'last_name' => $this->last_name,
                        'email' => $this->email,
                        'password' => md5($this->password),
                        'created_at' => $this->created_at,
                        'role_id' => 3,
                        'picture_id' => $this->picture_id
                    ]);
        return $result;
    }

    public function update()
    {
        $result = DB::table('users')
                    ->where('id',$this->user_id)
                    ->update([
                        'name' => $this->username,
                        'first_name' => $this->first_name,
                        'last_name' => $this->last_name,
                        'email' => $this->email,
                        'password' => md5($this->password),
                        'updated_at' => $this->updated_at,
                        'role_id' => $this->role_id,
                        'picture_id' => $this->picture_id
                    ]);
        return $result;
    }

    public function delete()
    {
        return DB::table('users')
                ->where('id',$this->user_id)
                ->delete();
    }

    public function selectOne()
    {
        $result = DB::table('users')
                    ->join('roles','users.role_id', '=', 'roles.role_id')
                    ->where('users.id','=',$this->user_id)
                    ->get()
                    ->first();
        return $result;
    }
}
