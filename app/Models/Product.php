<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Product extends Model
{
    use HasFactory;
    public function getProductsFilter($keywords = null,$filters = [],$PerPage = null){
        $product = DB::table('SanPham');
        if(!empty($keywords)){
            $product = $product->where('TenSP','like','%'.$keywords.'%');
        }
        if(!empty($filters)){
            if(!empty($filters['TinhTrang']) && $filters['TinhTrang'] == 2) $product = $product->where('SoLuong','=',0);
            else if(!empty($filters['TinhTrang']) && $filters['TinhTrang'] == 1) $product = $product->where('SoLuong','>',0);
            if(!empty($filters['MaDM'])) $product = $product->where('MaDM','=',$filters['MaDM']);
            if(!empty($filters['MaXX'])) $product = $product->where('MaXX','=',$filters['MaXX']);
        }
        if(!empty($PerPage)){
            $product = $product->paginate($PerPage);
        }else{
            $product = $product()->get();
        }
        return $product;
    }

    public function getProductNoPage(){
        return DB::table('SanPham')->get();
    }
    
    public function getProductSale(){
        return DB::table('SanPham')->where('GiamGia','>',0)->get();
    }

    public function getProductInCategory($MaDM ,$PerPage = null){
        $product = DB::table('SanPham')->where('MaDM',$MaDM)->where('SoLuong','>',0);
        if(!empty($PerPage)) $product = $product->paginate($PerPage);
        else $product = $product->get();
        return $product;
    }
    
    public function getProductByPrice($MaDM,$MinPrice,$MaxPrice,$PerPage = null){
        $product = DB::table('SanPham')
                    ->where('MaDM',$MaDM)
                    ->where('Gia','>=',$MinPrice)
                    ->where('Gia','<=',$MaxPrice);
        if(!empty($PerPage)) $product = $product->paginate($PerPage);
        else $product = $product->get();            
        return $product;
    }
    public function getProductByNational($MaDM,$MaXX,$MinPrice,$MaxPrice){
        $product = DB::table('SanPham')
        ->where('MaDM',$MaDM)
        ->where('MaXX',$MaXX)
        ->where('Gia','>=',$MinPrice)
        ->where('Gia','<=',$MaxPrice)
        ->get();
        return $product;
    }

    public function addProduct($data){
        if(DB::table('SanPham')->where('MaSP',$data['MaSP'])->doesntExist()){
            DB::table('SanPham')->insert($data);
        }
    }

    public function getDetailProduct($MaSP){
        return DB::table('SanPham')->where('MaSP',$MaSP)->get()->first();
    }

    public function getDetailProductJoin($MaSP){
        return DB::table('SanPham')
        ->join('DanhMuc','SanPham.MaDM','=','DanhMuc.MaDM')
        ->join('DonViTinh','SanPham.MaDVT','=','DonViTinh.MaDVT')
        ->join('XuatXu','SanPham.MaXX','=','XuatXu.MaXX')
        ->select('SanPham.*', 'DanhMuc.TenDM','DonViTinh.TenDVT','XuatXu.TenQG')
        ->where('MaSP',$MaSP)
        ->get()->first();
    }

    public function editProduct($MaSP,$data) {
        if(DB::table('SanPham')->where('MaSP',$MaSP)->exists()){
            DB::table('SanPham')->where('MaSP',$MaSP)->update($data);
        }
    }

    public function deleteProduct($MaSP){
        if(DB::table('SanPham')->where('MaSP',$MaSP)->exists() && DB::table('ChiTietPhieuNhap')->where('MaSP',$MaSP)->doesntExist()){
            DB::table('SanPham')->where('MaSP',$MaSP)->delete();
        }
    }
}
