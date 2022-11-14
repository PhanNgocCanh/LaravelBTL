<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Cart extends Model
{
    use HasFactory;
    private $MaSP;
    private $TenSP;
    private $Anh;
    private $SoLuong;
    private $Gia;
    private $GiamGia;
    private $ThanhTien;
    public function __construct($MaSP)
    {
        $this->MaSP = $MaSP;
        $product = new Product();
        $product = $product->getDetailProduct($MaSP);
        $this->TenSP = $product->TenSP;
        $this->Anh = $product->Anh;
        $this->SoLuong = 1;
        $this->Gia =$product->GiamGia > 0 ? ($product->Gia-($product->Gia*$product->GiamGia)/100): $product->Gia;
        $this->ThanhTien = $this->ThanhTien();
    }
    public function getMaSP(){ return $this->MaSP;}
    public function setMaSP($MaSP){$this->MaSP = $MaSP;}
    public function getTenSP(){ return $this->TenSP;}
    public function setTenSP($TenSP){$this->TenSP = $TenSP;}
    public function getAnh(){ return $this->Anh;}
    public function setAnh($Anh){$this->Anh = $Anh;}
    public function getSoLuong(){ return $this->SoLuong;}
    public function setSoLuong($SoLuong){$this->SoLuong = $SoLuong;}
    public function getGia(){ return $this->Gia;}
    public function setGia($Gia){$this->Gia = $Gia;}
    public function ThanhTien() { return $this->SoLuong*$this->Gia;}
    public function getCart(){ return [
        'MaSP' => $this->MaSP,
        'TenSP' => $this->TenSP,
        'Anh' => $this->Anh,
        'SoLuong' => $this->SoLuong,
        'Gia' => $this->Gia,
        'ThanhTien' => $this->ThanhTien()
    ];}
}
