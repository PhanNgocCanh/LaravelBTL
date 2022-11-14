<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ImportOrder extends Model
{
    use HasFactory;
    public function getImportOrder($SoPN){
        return DB::table('PhieuNhap')->where('SoPN',$SoPN)->get();
    }

    public function getDetailImportOrder($SoPN){
        if(DB::table('ChiTietPhieuNhap')->where('SoPn',$SoPN)->exists()){
            return DB::table('ChiTietPhieuNhap')
            ->join('SanPham','ChiTietPhieuNhap.MaSP','=','SanPham.MaSP')
            ->select('ChiTietPhieuNhap.*','SanPham.TenSP')
            ->where('SoPn',$SoPN)
            ->get();
        }
    }
    
    public function getDetailIO($SoPN){
        if(DB::table('ChiTietPhieuNhap')->where('SoPn',$SoPN)->exists()){
            return DB::table('ChiTietPhieuNhap')
            ->where('SoPn',$SoPN)
            ->get();
        }
    }

    public function getOneDetail($SoPN,$MaSP){
        return DB::table('ChiTietPhieuNhap')
                ->where('SoPN',$SoPN)
                ->where('MaSP',$MaSP)
                ->get()->first();
    }
    public function addImportOrder($data){
       return DB::table('PhieuNhap')->insert($data);
    }

    public function addDetailImportOrder($data){
        $soluong = DB::table('SanPham')->where('MaSP',$data['MaSP'])->get()[0]->SoLuong;
        DB::table('SanPham')->where('MaSP',$data['MaSP'])->update(['SoLuong' => ($data['SoLuong']+$soluong)]);
        DB::table('PhieuNhap')
        ->where('SoPN',$data['SoPN'])
        ->update(['TongTien' => ($data['SoLuong']*$data['GiaNhap']+$this->getTotal($data['SoPN']))]);
        return DB::table('ChiTietPhieuNhap')->insert($data);
    }

    public function getTotal($SoPN){
        return DB::table('PhieuNhap')->where('SoPN',$SoPN)->get()->first()->TongTien;
    }
    
    public function editDetailOrder($SoPN,$MaSP,$data){
        $soluong = DB::table('SanPham')->where('MaSP',$MaSP)->get()[0]->SoLuong;
        $soluongOld = $this->getOneDetail($SoPN,$MaSP)->SoLuong;
        DB::table('SanPham')->where('MaSP',$MaSP)->update(['SoLuong' => ($soluong-$soluongOld+$data['SoLuong'])]);
        $tongtien = $this->getImportOrder($SoPN)[0]->TongTien;
        $SoLuongOld = $this->getOneDetail($SoPN,$MaSP)->SoLuong;
        $GiaNhapOld = $this->getOneDetail($SoPN,$MaSP)->GiaNhap;
        DB::table('PhieuNhap')->where('SoPN',$SoPN)
        ->update(['TongTien' => ($tongtien-($SoLuongOld*$GiaNhapOld)+($data['SoLuong']*$data['GiaNhap']))]);
        DB::table('ChiTietPhieuNhap')
        ->where('SoPN',$SoPN)
        ->where('MaSP',$MaSP)
        ->update($data);
    }
    
    public function deleteImportOrder($SoPN){
         $ChiTietPhieuNhap = $this->getDetailIO($SoPN);
         foreach($ChiTietPhieuNhap as $key => $item){
            $MaSP = $item->MaSP;
            $SoLuongXoa = $item->SoLuong;
            $SoLuongSP = DB::table('SanPham')->where('MaSP',$MaSP)->get()[0]->SoLuong;
            DB::table('SanPham')->where('MaSP',$MaSP)->update(['SoLuong' => ($SoLuongSP-$SoLuongXoa)]);
            DB::table('ChiTietPhieuNhap')->where('SoPN',$SoPN)->where('MaSP',$MaSP)->delete();
         }
         DB::table('PhieuNhap')->where('SoPN',$SoPN)->delete();
    }
    
    public function deleteOneDetailOrder($SoPN,$MaSP){
        $soluong = DB::table('SanPham')->where('MaSP',$MaSP)->get()[0]->SoLuong;
        $oldDetailOrder = $this->getOneDetail($SoPN,$MaSP);
        $tongtien = $this->getImportOrder($SoPN)[0]->TongTien;
        DB::table('SanPham')->where('MaSP',$MaSP)->update(['SoLuong' => ($soluong-$oldDetailOrder->SoLuong)]);
        DB::table('PhieuNhap')->where('SoPN',$SoPN)->update(['TongTIen' => ($tongtien - ($oldDetailOrder->SoLuong*$oldDetailOrder->GiaNhap))]);
        DB::table('ChiTietPhieuNhap')
        ->where('SoPN',$SoPN)
        ->where('MaSP',$MaSP)
        ->delete();
    }
}
