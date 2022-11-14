<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\XuatXu;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class ProductClientsController extends Controller
{
    const _PerPage = 8;
    private $Product;
    private $National;
    public function __construct()
    {
        $this->Product = new Product();
        $this->National = new XuatXu();
    }
    public function index(){
        $dataProductSale = $this->Product->getProductSale();
        $dataProductCLient = $this->Product->getProductNoPage();
        return view('clients.pages.home.index',compact('dataProductSale','dataProductCLient'));
    }
    public function detailProduct($MaSP){
        $dataDetailProduct = $this->Product->getDetailProductJoin($MaSP);
        $dataProduct = $this->Product->getProductNoPage();
        return view('clients.pages.detail-product.index',compact('dataDetailProduct','dataProduct'));
    }
    public function getProductByCategory($MaDM){
        $dataProduct = $this->Product->getProductInCategory($MaDM,self::_PerPage);
        $dataXuatXu = $this->National->getXuatXu();
        return view('clients.pages.shop.index',compact('dataProduct','dataXuatXu','MaDM'));
    }

    public function getProductByPrice(Request $request){
        $MaxPrice = intval($request->maxprice);
        $MinPrice = intval($request->minprice);
        $MaDM = $request->MaDM;
        $dataProduct = $this->Product->getProductByPrice($MaDM,$MinPrice,$MaxPrice,self::_PerPage);
        $dataXuatXu = $this->National->getXuatXu();
        return view('clients.pages.shop.index',compact('dataProduct','dataXuatXu','MinPrice','MaxPrice','MaDM'));
    }
    public function getProductByNational(Request $request){
        $MaXX = $request->MaXX;
        $MinPrice = intval($request->minPrice);
        $MaxPrice = intval($request->maxPrice);
        $DanhMuc = $request->MaDM;
        $data = $this->Product->getProductByNational($DanhMuc,$MaXX,$MinPrice,$MaxPrice);
        return $data;
    }
     public function searchProduct(Request $request){
        if(!empty($request->keywords)){
            $keywords = $request -> keywords;
            $dataXuatXu = $this->National->getXuatXu();
            $dataProduct = $this->Product->getProductsFilter($keywords,[],self::_PerPage);
            return view('clients.pages.shop.index',compact('dataProduct','dataXuatXu'));
        }
        else{
             return redirect()->route('home')->with('msg',"Không tìm thấy sản phẩm tìm kiếm");
        }
    }
}
