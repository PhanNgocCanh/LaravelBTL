<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Order extends Model
{
    use HasFactory;
    public function getAllOrderFilter($keywords = null,$filter = [],$Per_Page = null){
        $order = DB::table('DonHang');
        if(!empty($keywords)){
            $order = $order->where('SoDH','like','%'.$keywords.'%')
                           ->orWhere(function($query) use($keywords){
                                $query = $query->where('HoTen','like','%'.$keywords.'%');
                           });
        }
        if(!empty($filter)){
            if(!empty($filter['MaTTDH'])){
                $order = $order->where('MaTTDH',$filter['MaTTDH']);
            }
        }
        if(!empty($Per_Page)){
            $order = $order->paginate($Per_Page);
        }else{
            $order = $order->get();
        } 
        return $order;
    }
    
    public function getAllOrder(){
        return DB::table('DonHang')->get();
    }
    public function getOrder($Email){
        if(DB::table('DonHang')->where('Email',$Email)->exists()){
            return DB::table('DonHang')->where('Email',$Email)->get();
        }
    }
    public function getOneOrder($SoDH,$Email){
        if(DB::table('DonHang')->where('SoDH',$SoDH)->where('Email',$Email)->exists()){
            return DB::table('DonHang')->where('SoDH',$SoDH)->where('Email',$Email)->get()->first();
        }
    }
    public function getDetailOrder($SoDH,$Email){
        if(DB::table('DonHang')->where('SoDH',$SoDH)->where('Email',$Email)->exists()){
            return DB::table('ChiTietDonHang')
                    ->join('SanPham','ChiTietDonHang.MaSP','=','SanPham.MaSP')
                    ->select('ChiTietDonHang.*','SanPham.TenSP')
                    ->where('SoDH',$SoDH)
                    ->get();
        }
    }

    public function addOrder($data){
        $id = DB::table('DonHang')->insertGetId($data);
        return $id;
    }

    public function addDetailOrder($data){
        if(DB::table('ChiTietDonHang')->where('SoDH',$data['SoDH'])->where('MaSP',$data['MaSP'])->doesntExist()){
            DB::table('ChiTietDonHang')->insert($data);
        }
    }

    public function updateOrder($SoDH,$Email,$data){
        if(DB::table('DonHang')->where('SoDH',$SoDH)->where('Email',$Email)->exists()){
            DB::table('DonHang')->where('SoDH',$SoDH)->where('Email',$Email)->update($data);
        }
    }
    public function deleteOrder($SoDH,$Email){
        if(DB::table('DonHang')->where('SoDH',$SoDH)->where('Email',$Email)->exists()){
            DB::table('ChiTietDonHang')->where('SoDH',$SoDH)->delete();
            DB::table('DonHang')->where('SoDH',$SoDH)->where('Email',$Email)->delete();
        }
    }
    public function MoneyMonth($month){
        return DB::table('DonHang')
            ->whereMonth('NgayDat',$month)
            ->sum('TongTien');
    }
}
