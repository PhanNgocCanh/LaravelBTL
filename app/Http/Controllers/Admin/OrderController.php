<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\StatusOrder;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class OrderController extends Controller
{
    private $TinhTrang;
    private $Order;
    const __Per_Page = 4;
    public function __construct()
    {
        $this->TinhTrang = new StatusOrder();
        $this->Order = new Order();
    }
    public function index(Request $request){
        $filter = [];
        $keywords = null;
        $dataOrder = null;
        if(!empty($request->keywords)) $keywords = $request->keywords;
        if(!empty($request->statusorder)) $filter['MaTTDH'] = $request->statusorder;
        $dataTTDH = $this->TinhTrang->getAllStatusOrder();
        if(!empty($filter) || !empty($keywords)) $dataOrder = $this->Order->getAllOrderFilter($keywords,$filter,self::__Per_Page);
        return view('admin.pages.order.order',compact('dataOrder','dataTTDH'));
    }
    public function getDetailOrder($SoDH,$Email){
        $data = $this->Order->getDetailOrder($SoDH,$Email);
        return $data;
    }
    public function updateStatus($SoDH,$Email,$Status){
        $data = [
            'MaTTDH' => $Status
        ];
        $this->Order->updateOrder($SoDH,$Email,$data);
    }
    public function generatePDF($SoDH,$Email){
        $dataOrder = $this->Order->getOneOrder($SoDH,$Email);
        $dataOrder = [
            'SoDH' =>$dataOrder->SoDH,
            'HoTen' => $dataOrder->HoTen,
            'DiaChi' =>$dataOrder->DiaChiGiao,
            'SDT' =>$dataOrder->SDT,
            'NgayDat' =>$dataOrder->NgayDat,
            'TongTien' =>$dataOrder->TongTien
        ];
        $dataDetailOrder = $this->Order->getDetailOrder($SoDH,$Email);
        $data = [];
        foreach($dataDetailOrder as $key => $item){
            $arr = [
                'TenSP' => $item->TenSP,
                'SoLuong' => $item->SoLuong,
                'Gia' =>$item->Gia
            ];
            $data[] = $arr;
        }
         $pdf = Pdf::loadView('myOrderPDF', compact('dataOrder','data'));
        // //Nếu muốn hiển thị file pdf theo chiều ngang
        //  //$pdf->setPaper('A4', 'landscape');
        
        // //Nếu muốn download file pdf
         return $pdf->download('myOrderPDF.pdf');
    }
    public function ThongKe(){
        $data = [];
        for($i = 1 ;$i<=12 ;$i++){
            $data [] = $this->Order->MoneyMonth($i);
        }
        return $data;
    }
}
