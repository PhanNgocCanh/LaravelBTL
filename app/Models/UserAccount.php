<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class UserAccount extends Model
{
    use HasFactory;
    public function getUser($email,$password){
        $useraccount = DB::table('TaiKhoan')
                        ->where('Email',$email)
                        ->where('MatKhau',$password)
                        ->get()->first();
        return $useraccount;
    }
    public function addUserAccount($data){
        DB::table('TaiKhoan')->insert($data);
    }
}
