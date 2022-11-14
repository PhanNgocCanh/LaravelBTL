<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class StatusOrder extends Model
{
    use HasFactory;
    public function getAllStatusOrder(){
        return DB::table('TinhTrangDonHang')->get();
    }
}
