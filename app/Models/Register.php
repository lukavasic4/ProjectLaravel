<?php


namespace App\Models;


use Illuminate\Support\Facades\DB;

class Register
{
    public function insertUser($first_name, $last_name, $email, $password){
        return DB::table('users')->insert(['first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'password' => md5($password),'id_role' => 2]);
    }
}
