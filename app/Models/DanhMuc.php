<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class DanhMuc extends Model
{
    use HasFactory;
    public function getDanhMuc(){
        return DB::table('DanhMuc')->get();
    }
}
