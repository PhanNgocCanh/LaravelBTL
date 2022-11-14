<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductRequest;
use App\Models\DanhMuc;
use App\Models\DonViTinh;
use App\Models\Product;
use App\Models\XuatXu;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $XuatXu;
    private $DanhMuc;
    private $DonViTinh;
    private $SanPham;
    const _Per_Page =5;
    public function __construct()
    {
        $this->XuatXu = new XuatXu();
        $this->DonViTinh = new DonViTinh();
        $this->DanhMuc = new DanhMuc();
        $this->SanPham = new Product();
    }
    public function index(Request $request)
    {
        $filters = [];
        $keywords = null;
        if(!empty($request->keywords)) $keywords = $request->keywords;
        if(!empty($request->tinhtrang)) $filters ['TinhTrang'] =  ($request->tinhtrang =='1'? 1 : 2);
        if(!empty($request->madm)) $filters ['MaDM'] =$request->madm;
        if(!empty($request->maxx)) $filters ['MaXX'] = $request->maxx;
        $dataSanPham = $this->SanPham->getProductsFilter($keywords,$filters,self::_Per_Page);
        $dataDanhMuc = $this->DanhMuc->getDanhMuc();
        $dataXuatXu = $this->XuatXu->getXuatXu();
        return view('admin.pages.product.index',compact('dataSanPham','dataDanhMuc','dataXuatXu'));
    }

    public function create()
    {
        $dataXuatXu = $this->XuatXu->getXuatXu();
        $dataDonViTinh = $this->DonViTinh->getDonViTinh();
        $dataDanhMuc = $this->DanhMuc->getDanhMuc();
        return view('admin.pages.product.add-product',compact('dataXuatXu','dataDonViTinh','dataDanhMuc'));
    }

    public function store(ProductRequest $request)
    {
        $data = [
            'MaSP' =>$request->masp,'TenSp' =>$request->tensp,'MaDM' =>$request->madm,
            'MaDVT' =>$request->madvt,'MaXX' =>$request->maxx,'Gia' =>$request->gia,
            'GiamGia' =>($request->giamgia ? $request->giamgia: 0),'Anh' =>$request->anh,'ThanhPhan' =>$request->thanhphan,
            'HDSD' => $request->hdsd,'BaoQuan' =>$request->baoquan,'Mota' =>$request->mota

        ];
        if($request->hasFile('anh-secondary')){
             $image = $request->file('anh-secondary');
             $storePath = $image->move('images',$image->getClientOriginalName());
        }
        $this->SanPham->addProduct($data);
        return redirect()->route('product.index');
    }

    // dữ liệu cho phần modal
    public function getDetail($id){
        $data = $this->SanPham->getDetailProductJoin($id);
        return $data;
    }
    public function getDetailEdit($MaSP){
        $data = $this->SanPham->getDetailProduct($MaSP);
        $dataXuatXu = $this->XuatXu->getXuatXu();
        $dataDonViTinh = $this->DonViTinh->getDonViTinh();
        $dataDanhMuc = $this->DanhMuc->getDanhMuc();
        return view('admin.pages.product.edit-product',compact('data','dataXuatXu','dataDonViTinh','dataDanhMuc'));
    }
    public function postEditProduct(EditProductRequest $request) {
        $data = [
            'TenSP' => $request->tensp,'MaDM' => $request->madm,'MaDVT' => $request->madvt,
            'MaXX' => $request->maxx,'Gia' =>$request->gia,'GiamGia' =>($request->giamgia ? $request->giamgia: 0),
            'Anh' => $request->anh,'ThanhPhan' => $request->thanhphan,'HDSD' =>$request->hdsd,
            'BaoQuan' => $request->baoquan,'MoTa' => $request->mota
        ];
        if($request->hasFile('anh-secondary')){
            $image = $request->file('anh-secondary');
            $storePath = $image->move('images',$image->getClientOriginalName());
        }
        $MaSP = $request->masp;
        $this->SanPham->editProduct($MaSP,$data);
        return redirect()->route('product.index');
    }
    public function deleteProduct($id){
        $MaSP = $id;
        $this->SanPham->deleteProduct($MaSP);
        return redirect()->route('product.index');
    }
}
