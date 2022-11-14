<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class XuatXu extends Model
{
    use HasFactory;
    public function getXuatXu(){
        return DB::table('XuatXu')->get();
    }
}
