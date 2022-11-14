<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImportOrder;
use App\Models\Supplier;
use App\Rules\MaSPExists;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class ImportOrderController extends Controller
{
    private $Supplier;
    private $ImportOrder;

    public function __construct()
    {
        $this->Supplier = new Supplier();
        $this->ImportOrder = new ImportOrder();
    }

    public function addImportOrder(){
        $dataSupplier = $this->Supplier->getSuppliers();
        return view('admin.pages.order.import-order',compact('dataSupplier'));
    }

    public function postAddImportOrder(Request $request){
        $request->validate(
            [
                'sopn' => 'required',
                'masp' => ['required',new MaSPExists],
                'slnhap' => 'required|integer',
                'gianhap' => 'required|integer'
            ],
            [
                'sopn.required' => 'Bắt buộc phải nhập','masp.required' => 'Bắt buộc phải nhập',
                'slnhap.required' => 'Bắt buộc phải nhập','slnhap.integer' => 'Phải là số',
                'gianhap.required' => 'Bắt buộc phải nhập','gianhap.integer' => 'Phải là số'
            ]
        );
        $SoPN = $request->sopn;
        $MaSP = $request->masp;
        if(count($this->ImportOrder->getImportOrder($SoPN))==0){
            $data =[
                'SoPN' => $request->sopn,
                'MaNCC' =>$request->ncc,
                'NgayNhap' => Carbon::now('Asia/Ho_Chi_Minh')->format('Y/m/d'),
                'TongTien' =>0
            ];
            $this->ImportOrder->addImportOrder($data);
            $dataDetail = [
                'SoPN' => $request->sopn,
                'MaSP' => $request->masp,
                'SoLuong' => $request->slnhap,
                'GiaNhap' => $request->gianhap
            ];
            $this->ImportOrder->addDetailImportOrder($dataDetail);
        }else{

            if(!$this->ImportOrder->getOneDetail($SoPN,$MaSP)){ 
                $data = [
                    'SoPN' => $request->sopn,
                    'MaSP' => $request->masp,
                    'SoLuong' => $request->slnhap,
                    'GiaNhap' => $request->gianhap
                ];
                $this->ImportOrder->addDetailImportOrder($data);
            }else{
                $data = [
                    'SoLuong' => $request->slnhap,
                    'GiaNhap' => $request->gianhap
                ];
                $this->ImportOrder->editDetailOrder($SoPN,$MaSP,$data);
            }
        }
        $Ncc = $request->ncc;
        $dataSupplier = $this->Supplier->getSuppliers();
        return view('admin.pages.order.import-order',compact('dataSupplier','SoPN','Ncc'));
    }

    public function getDetailImportOrder($SoPN){
        if($SoPN) {
            $data = $this->ImportOrder->getDetailImportOrder($SoPN);
            if(!$data) return 0;
            return $data;
        }
        return ['Không có dữ liệu chi tiết hoá đơn'];
    }

    public function getImportOrder($SoPN){
        if($SoPN) {
            $data = $this->ImportOrder->getImportOrder($SoPN);
            return $data;
        }
    }   

    public function getOneDetailOrder($SoPN,$MaSP){
        if($SoPN && $MaSP){
            $data = $this->ImportOrder->getOneDetail($SoPN,$MaSP);
            return $data;
        }
    }

    public function deleteImportOrder($SoPN){
         $this->ImportOrder->deleteImportOrder($SoPN);
         return [];
    }
    public function deleteOneDO($SoPN,$MaSP){
         $this->ImportOrder->deleteOneDetailOrder($SoPN,$MaSP);
         return [];
    }
}
