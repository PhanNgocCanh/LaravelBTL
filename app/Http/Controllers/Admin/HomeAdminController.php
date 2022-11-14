<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    private $Product;
    private $Order;
    public function __construct()
    {
        $this->Product = new Product();
        $this->Order = new Order();
    }
    public function index(){
        $TotalProduct = count($this->Product->getProductNoPage());
        $Order = $this->Order->getAllOrder();
        $TotalOrder = count($Order);
        $TotalMoney = 0;
        foreach($Order as $key => $item){
            $TotalMoney +=$item->TongTien;
        }
        return view('admin.pages.home.index',compact('TotalProduct','TotalOrder','TotalMoney'));
    }
}
