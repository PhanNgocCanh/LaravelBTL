<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class DonViTinh extends Model
{
    use HasFactory;
    public function getDonViTinh(){
        return DB::table('DonViTinh')->get();
    }
}
