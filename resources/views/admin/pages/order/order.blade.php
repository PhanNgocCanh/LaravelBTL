@extends('admin.layouts.master')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Đơn hàng</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3 row">
            <h6 class="m-0 font-weight-bold text-primary col-md-4">Danh sách các đơn hàng</h6>
            <div class="d-flex justify-content-center mt-2">
                <form class="col-md-12" method="GET">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <select class="form-select" aria-label="Default select example" name="statusorder">
                                    <option value="">--Tình trạng--</option>                              
                                    @if(!empty($dataTTDH))
                                        @foreach($dataTTDH as $key => $item)
                                            <option value="{{$item->MaTTDH}}" {{old('statusorder') == $item->MaTTDH || request()->statusorder == $item->MaTTDH ? 
                                                'selected' :false}}>{{$item->TenTTDH}}</option>                                   
                                        @endforeach
                                    @endif                                    
                            </select> 
                        </div>
                        <div class="col-md-3">
                            <input type="search" class="form-control bg-light border-1 small" placeholder="Tìm kiếm..."
                                aria-label="Search" aria-describedby="basic-addon2" name="keywords" value="{{request()->keywords}}">
                        </div>
                        <div class="col-md-2">
                                <button class="btn btn-primary" type="submit">
                                    Tìm kiếm <i class="fas fa-search fa-sm"></i>
                                </button>
                        </div>
                    </div>
                </form>              
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width:100px">Số đơn hàng</th>
                            <th>Tên khách hàng</th>  
                            <th style="width:200px">Số điện thoại - Địa chỉ</th>  
                            <th style="width:160px;text-align:center;">Tổng tiền(VND)</th>
                            <th style="width:150px">Ngày đặt hàng</th>                                                                                                                         
                            <th style="width:150px">Trạng thái</th>
                            <th style="width:150px;text-align:center;">Thông tin</th>
                            <th style="width:50px">In</th>                                                                                   

                        </tr>
                    </thead>                                   
                    <tbody>
                        @if(!empty($dataOrder))
                            @foreach($dataOrder as $key => $item)
                                <tr>
                                    <td style="text-align:center;">{{$item->SoDH}}</td>
                                    <td>{{$item->HoTen}}</td>                                           
                                    <td>{{$item->SDT}} -{{$item->DiaChiGiao}}</td>
                                    <td style="text-align:center;">{{$item->TongTien}}</td>
                                    <td>{{$item->NgayDat}}</td>
                                    <td style="width:110px">
                                        <select name="status" id="status">                             
                                            @if(!empty($dataTTDH))
                                                @foreach($dataTTDH as $keyTTDH => $itemTTDH)
                                                    @if($itemTTDH->MaTTDH == $item->MaTTDH)
                                                    <option value="{{$item->SoDH}}-{{$item->Email}}-{{$item->MaTTDH}}" {{$itemTTDH->MaTTDH == $item->MaTTDH ? 
                                                        'selected' :false}}>{{$itemTTDH->TenTTDH}}</option>
                                                    @else     
                                                    <option value="{{$item->SoDH}}-{{$item->Email}}-{{$itemTTDH->MaTTDH}}" {{$itemTTDH->MaTTDH == $item->MaTTDH ? 
                                                        'selected' :false}}>{{$itemTTDH->TenTTDH}}</option>
                                                    @endif
                                                @endforeach
                                            @endif 
                                        </select>
                                    </td>
                                    <td style="width:110px;text-align:center;"><button class="btn btn-primary" data-toggle="modal" data-target="#order-info" onclick="getDetail('{{$item->SoDH}}','{{$item->Email}}')">Xem<i class="fas fa-fw fa-eye pl-2"></i></button></td>
                                    <td style="width:50px"><a href="{{route('admin.order.pdf',['SoDH' => $item->SoDH,'Email' => $item->Email])}}" class="btn btn-primary"><i class="fas fa-fw fa-print"></i></a></td>                                            
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="d-flex">
                    {{!empty($dataOrder) ? $dataOrder->withQueryString()->links(): ''}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.pages.order.modal-order')
@endsection

@section('script')
    <script>
        function getDetail(SoDH,Email){
            $.ajax({
                url:'/admin-area/order/detail/'+SoDH+'-'+Email,
                method: "GET",
                data:{
                    _token:'{{ csrf_token() }}'},
                dataType: "json",
                contentType: "json",
                success: function(data){
                    let len = data.length;
                    let total = 0;
                    let html = '';
                    for(var i =0 ; i< len; i++){
                        html +='<tr>'+
                               '<td>'+data[i].TenSP+'</td>'+
                               '<td>'+data[i].SoLuong+'</td>'+
                               '<td>'+data[i].Gia+'</td>'+
                               '<td>'+(data[i].SoLuong*data[i].Gia)+'</td>'+
                               '</tr>';
                        total +=data[i].SoLuong*data[i].Gia;
                    }
                    $('#detail-order').html(html);
                    $('#total').html('Tổng tiền: '+total+' VND');
                },
                error: function(err){
                    console.log(err);
                }
            });
        }
        $('select[name=status]').change(function(){
            let select = $(this).children('option:selected').val();
            let value = select.split('-');
            let SoDH = value[0];
            let Email = value[1];
            let TTDH = value[2];
            $.ajax({
                url:'/admin-area/order/update/'+SoDH+'-'+Email+'-'+TTDH,
                method:'GET',
                data:{
                    _token:'{{ csrf_token() }}'},
            }).done(function() {
                location.href = '/admin-area/order?statusorder='+TTDH;
            });
        })
    </script>
@endsection