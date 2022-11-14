<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Supplier extends Model
{
    use HasFactory;
    public function getSuppliers(){
        return DB::table('NhaCungCap')->get();
    }
}
