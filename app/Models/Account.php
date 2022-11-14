<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Account extends Model
{
    use HasFactory;
    public function getAllAccount(){
        return DB::table('TaiKhoan')->get();
    }
}
