@extends('clients.layouts.master')

@section('content')
    <!-- Breadcrumb Start -->
    @include('clients.pages.order-tracking.breadcrumb')
    <!-- Breadcrumb End -->

    <!-- Page Section Content Start -->
    <section class="page-secton-wrapper section-space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wishlist-tiel">
                        <h2 class="mb-5 fw-bold">Danh sách đơn hàng của bạn</h2>
                    </div>
                    <form action="#" class="cart-table">
                        <div class=" table-content table-responsive">
                            <table class="table border">
                                <thead>
                                    <tr>
                                        <!-- <th class="plantmore-product-thumbnail">Images</th> -->
                                        <th class="cart-product-name">Mã đơn hàng</th>
                                        <th class="plantmore-product-price">Ngày đặt</th>
                                        <th class="plantmore-product-stock-status">Tổng tiền</th>
                                        <th class="plantmore-product-add-cart">Trạng thái</th>
                                        <th class="plantmore-product-remove">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($dataOrder))
                                        @foreach($dataOrder as $key => $item)
                                            <tr>
                                                <td class="plantmore-product-name"><a href="#">{{$item->SoDH}}</a></td>
                                                <td class="plantmore-product-price"><span class="amount">{{$item->NgayDat}}</span></td>
                                                <td class="plantmore-product-stock-status"><span class="in-stock">{{$item->TongTien}}</span></td>
                                                @if(!empty($dataStatusOrder))
                                                    @foreach($dataStatusOrder as $keySO => $itemSO)
                                                        @if($itemSO->MaTTDH == $item->MaTTDH)
                                                        <td class="plantmore-product-add-cart">
                                                            <a href="#" class="btn btn-{{$item->MaTTDH =='TTDH01'?'warning':($item->MaTTDH =='TTDH02'? 'info':'success')}} btn--small">{{$itemSO->TenTTDH}}</a>
                                                        </td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if($item->MaTTDH == 'TTDH01')
                                                    <td class="plantmore-product-remove">
                                                        <a href="#"  data-bs-toggle="modal" data-bs-target="#order" onclick="getDetail('{{$item->SoDH}}','{{$email}}')">Xem</a> |
                                                        <a onclick=" return confirm('Bạn có chắc chắn muốn huỷ đơn không?')" href="{{route('clients.order-tracking.delete',['SoDH' => $item->SoDH,'Email' => $item->Email])}}">Huỷ bỏ</a>
                                                    </td>
                                                @else
                                                    <td class="plantmore-product-remove"><a href="#"  data-bs-toggle="modal" data-bs-target="#order" onclick="getDetail('{{$item->SoDH}}','{{$email}}')">Xem</a></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif                     
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="order" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="order">Thông tin hoá đơn</h5>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>                                                                   
                                <th>Thành tiền</th>                              
                            </tr>
                        </thead>                       
                        <tbody id="detail-order">                                                        
                        </tbody>
                    </table>
                    <p id="total"></p> 
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Đóng</button>                   
                </div>
            </div>
        </div>
    </div>  
    <!-- Page Section Content End -->
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
    </script>
@endsection