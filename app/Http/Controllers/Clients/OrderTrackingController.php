<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\StatusOrder;
use Illuminate\Http\Request;

class OrderTrackingController extends Controller
{
    private $Order;
    private $StatusOrder;
    private $Product;
    public function __construct()
    {
        $this->Order = new Order();
        $this->StatusOrder = new StatusOrder();
        $this->Product = new Product();
    }
    public function index(){
        if(!empty(session()->get('account'))){
            $email = session()->get('account')['email'];
            $dataStatusOrder = $this->StatusOrder->getAllStatusOrder();
            $dataOrder = $this->Order->getOrder($email);
            return view('clients.pages.order-tracking.index',compact('dataOrder','dataStatusOrder','email'));
        }
        else return redirect()->route('clients.login');

    }
    public function DismissOrder(Request $request){
        $SoDH = $request->SoDH;
        $Email = $request->Email;
        $dataOrder = $this->Order->getDetailOrder($SoDH,$Email);
        foreach($dataOrder as $key => $item){
            $MaSP = $item->MaSP;
            $SoLuong = $item->SoLuong;
            $dataProduct = $this->Product->getDetailProduct($MaSP);
            $dataProduct = [
                'SoLuong' => $dataProduct->SoLuong + $SoLuong
            ];
            $this->Product->editProduct($MaSP,$dataProduct);
            $this->Order->deleteOrder($SoDH,$Email);
        }
        return redirect()->route('clients.order-tracking');
    }
}
