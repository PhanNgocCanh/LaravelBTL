<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    private $Product;
    public function __construct()
    {
        $this->Product = new Product();
    }
    public function index(){
        $dataCart = session()->get('cart');
        $Total = 0;
        foreach($dataCart as $key => $item) $Total += $item['ThanhTien'];
        if($dataCart == null) return view('clients.pages.cart.index',['msg' => 'Chưa có sản phẩm nào trong giỏ hàng !']);
        return view('clients.pages.cart.index',compact('dataCart','Total'));
    }

    public function addToCart($MaSP){
        $cart = session()->get('cart') ;
        $CartItem = new Cart($MaSP);
        $item = $CartItem->getCart();
        if($cart == null){
            session()->put('cart',[$item]);
        }
        else{
            if($this->checkMaSPExsit($item['MaSP'],$cart)) $session = session()->push('cart',$item);
            else {
                $cart = session()->get('cart') ;
                foreach($cart as $key => $it){
                    if($it['MaSP'] == $item['MaSP']){
                        $item['SoLuong'] = $it['SoLuong']+1;
                        $item['ThanhTien'] = $it['Gia']*$item['SoLuong'];
                        $cart[$key] = $item;
                    }
                }
                session()->put('cart',$cart);         
            }
        }
       //session()->pull('cart');
    }

    public function checkMaSPExsit($MaSP,$Arr){
        foreach($Arr as $key => $item) if($item['MaSP'] == $MaSP) return false;
        return true;
    }
    
    public function UpdateQuantity($MaSP,$type){
        $cart = session()->get('cart');
        foreach($cart as $key => $item){
            if($item['MaSP'] == $MaSP){
                $SoLuong = $this->Product->getDetailProduct($item['MaSP'])->SoLuong;
                if($cart[$key]['SoLuong']+ $type > $SoLuong) return redirect()->route('clients.cart')->with('message-noupdate','Update không thành công ! Sản phẩm không đủ chỉ còn '.$SoLuong);
                if($cart[$key]['SoLuong']==1 && $type == -1) break;
                $cart[$key]['SoLuong'] +=$type;
                $cart[$key]['ThanhTien'] = $cart[$key]['SoLuong']*$cart[$key]['Gia'];
            }
        }
        session()->put('cart',$cart);
        return redirect()->route('clients.cart');
    }
    
    public function deleteItemCart($MaSP){
        $cart = session()->get('cart');
        foreach($cart as $key => $item){
            if($item['MaSP'] == $MaSP) unset($cart[$key]);
        }
        session()->put('cart',$cart);
        if(count(session()->get('cart'))>0) return redirect()->route('clients.cart');
        else return redirect()->route('home');
    }
}
