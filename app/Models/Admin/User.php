<?php


namespace App\Models\Admin;


use Illuminate\Support\Facades\DB;

class User
{
    public function getAllUser(){
        return DB::table('users AS u')
            ->select('u.id_user','u.first_name','u.last_name','u.email','u.password','r.name as role')
            ->join('roles as r','u.id_role','=','r.id_role')
            ->get();
    }
}
