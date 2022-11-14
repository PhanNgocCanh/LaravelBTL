<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CheckOutController extends Controller
{
    private $Order;
    private $Product;
    public function __construct()
    {
        $this->Order = new Order();
        $this->Product = new Product();
    }
    public function index(){
        if(!session()->get('account')) return redirect()->route('clients.cart')->with('message-login','Bạn phải đăng nhập để tiến hành thanh toán');
        $cart = session()->get('cart');
        $Total = 0;
        foreach($cart as $key => $item) $Total += $item['ThanhTien'];
        return view('clients.pages.checkout.index',compact('cart','Total'));
    }
    public function addOrder(OrderRequest $request){
        $account = session()->get('account');
        $NgayGiao = date_create($request->date,new DateTimeZone('Asia/Ho_Chi_Minh'));
        $NgayGiao = date_format($NgayGiao,'Y/m/d');
        $cart = session()->get('cart');
        $Total = 0;
        foreach($cart as $key => $item) $Total += $item['ThanhTien'];
        $data = [
            'Email' => $account['email'],
            'MaTTDH' => 'TTDH01',
            'HoTen' => $request->name,
            'SDT' => $request->sdt,
            'DiaChiGiao' => $request->address,
            'NgayDat' => Carbon::now('Asia/Ho_Chi_Minh')->format('Y/m/d'),
            'NgayGiao' => $NgayGiao,
            'ThanhToan' => $request->payment,
            'TongTien' => $Total
        ];
        $SoDH = $this->Order->addOrder($data);
        foreach($cart as $key => $item){
            $dataDetail = [
                'SoDH' => $SoDH,
                'MaSP' => $item['MaSP'],
                'SoLuong' => $item['SoLuong'],
                'Gia' => $item['Gia'],
                'ThanhTien' => $item['ThanhTien']
            ];
            $MaSP = $dataDetail['MaSP'];
            $dataProduct = $this->Product->getDetailProduct($MaSP);
            $dataProduct = [
                'SoLuong' => $dataProduct->SoLuong - $dataDetail['SoLuong']
            ];
            $this->Product->editProduct($MaSP,$dataProduct);
            $this->Order->addDetailOrder($dataDetail);
        }
        session()->pull('cart');
        return redirect()->route('home')->with('success-order','Đặt hàng thành công !');
    }
}
