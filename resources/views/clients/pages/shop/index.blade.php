@extends('clients.layouts.master')

@section('content')
    @include('clients.pages.shop.breadcrumb')
    <section class="page-secton-wrapper section-space-pb">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-12 sidebar widget-area-side left-sidebar order-2 order-lg-1">
                        <div class="shop-widget">
                            <h5 class="widget-title">
                                Lọc theo giá
                            </h5>

                            <!-- filter-price-content Start -->
                            <div class="filter-price-content">
                                <form action="" method="post">
                                    @csrf
                                    <div id="price-slider" class="price-slider"></div>
                                    <div class="filter-price-wapper">
                                        <div class="filter-price-cont">
                                            <span>Giá</span>
                                            <div class="input-type">
                                                <input type="text" value="{{!empty($MinPrice)?$MinPrice:''}}" name="minprice" id="min-price" readonly="" />
                                            </div>
                                            <span>—</span>
                                            <div class="input-type">
                                                <input type="text" value="{{!empty($MaxPrice)?$MaxPrice:''}}" name="maxprice" id="max-price" readonly="" />
                                            </div>
                                            <div class="input-type">
                                                VND
                                            </div>
                                        </div>

                                        <button class="add-to-cart-button" type="submit">
                                            <span>Lọc</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- filter-price-content end -->
                        </div>

                        <div class="shop-widget">
                            <h5 class="widget-title">
                                Xuất xứ
                            </h5>
                            <ul class="product-brand">
                                @if(!empty($dataXuatXu))
                                    @foreach($dataXuatXu as $key => $item)
                                        <li class="product-brand-item">
                                            <input type="radio" name="qg" id="{{$item->MaXX}}" value="{{$item->MaXX}}">
                                            <label for="{{$item->MaXX}}">{{$item->TenQG}}</label>
                                        </li>              
                                    @endforeach
                                @endif
                            </ul>
                        </div>                   
                    </div>

                    <div class="col-lg-9 col-12 order-1 order-lg-2">
                        <!--shop toolbar start-->
                        <div class="shop-toolbar-wrapper ms-lg-4 mb-3">
                            <div class="shop-toolbar-btn d-flex align-items-center">
                                <button data-role="grid-3" type="button" class="active btn-grid-3" title="3">
                                    <i class="icon-rt-apps-sharp"></i>
                                </button>
                                <button data-role="grid-list" type="button" class=" btn-list" title="List">
                                    <i class="icon-rt-list"></i>
                                </button>                             
                            </div>

                                <select name="orderby" id="short">
                                    <option value="TenSP-asc">Tên sản phẩm A-Z</option>
                                    <option value="TenSP-desc">Tên sản phẩm Z-A</option>
                                    <option value="Gia-asc">Giá thấp-cao</option>
                                    <option value="Gia-desc">Giá cao-thấp</option>                                 
                                </select>

                        </div>
                        <!--shop toolbar end-->

                        <div class="shop-product-wrapper ms-lg-4 border-top border-start row gx-0 archive-products" id="product-content">
                        @if(!empty($dataProduct))
                                @foreach($dataProduct as $key =>$item)
                                    @if($item->SoLuong >0)
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                                            <!-- Single Item Start -->
                                                <div class="single-product-item">
                                                    <div class="single-product-item-image">
                                                        <a href="{{route('clients.detail-product',['MaSP' => $item->MaSP])}}" class="prodcut-images">
                                                            <img class="primary-image" src="{{asset('images/'.$item->Anh)}}" alt="">                                          
                                                        </a>
                                                        <ul class="single-product-item-action">                                           
                                                            <li class="single-product-item-action-list">
                                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link" onclick="show('{{$item->MaSP}}')"><i class="icon-rt-eye2"></i></a>
                                                            </li>
                                                            <li class="single-product-item-action-list product-cart">
                                                                <a href="" class="single-product-item-action-link" onclick="addCart('{{$item->MaSP}}')"><i class="icon-rt-basket-outline"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <div class="single-product-item-content mt-4">                                     
                                                        <h6 class="single-product-item-title"><a href="#">{{$item->TenSP}}</a></h6>
                                                        <div class="single-product-item-price">
                                                        @if($item->GiamGia > 0)
                                                            <p class="price">{{$item->Gia-($item->Gia*$item->GiamGia)/100}} VND</p>
                                                            <p class="price-sale ms-3">{{$item->Gia}} VND</p>
                                                        @else
                                                            <p class="price">{{$item->Gia}} VND</p>
                                                        @endif
                                                        </div>
                                                        <div class="product-list-style">
                                                            <p class="product-list-description">{{$item->MoTa}}</p>
                                                            <div class="product-list-action-cart">
                                                                <a href="" onclick="addCart('{{$item->MaSP}}')"><span class="text">Thêm vào giỏ</span></a>
                                                            </div>
                                                        </div>
                                                        @if($item->GiamGia >0)
                                                                <div class="percent-sale">{{$item->GiamGia}}%</div>
                                                        @endif
                                                    </div>
                                                    
                                                </div> <!-- Single Item End -->
                                        
                                        </div>  
                                    @endif                    
                                @endforeach
                        @endif
                        </div>
                        <div class="page-pagination d-flex justify-content-center">                             
                            {{$dataProduct->withQueryString()->links()}}
                        </div>
                        <input type="text" id="category" value="{{!empty($MaDM) ?$MaDM:''}}" hidden>
                    </div>
                </div>
            </div>
        </section>
    @include('clients.partials.modal-product')
@endsection

@section('script')
   <script>
        function show(MaSP){
            $.ajax({
                url: "/admin-area/product-modal/"+MaSP,
                method: "GET",
                data:{
                    _token:'{{ csrf_token() }}'},
                dataType: "json",
                contentType: "json",
                success: function (data) {
                    var img = data.Anh;
                    var path = location.href.split('/');
                    var localpath = path[0]+'/'+path[1]+'/'+path[2];
                     var html = '';
                     html +=' <button type="button" class="button-close" data-bs-dismiss="modal" aria-label="Close">'+
                                    '<span aria-hidden="true">&times;</span>'+
                              '</button>'+
                              '<div class="modal-inner-area">'+
                                '<div class="row gx-3 product-details-inner">'+
                                    '<div class="col-lg-6 col-md-6 col-sm-6">'+
                                        '<div class="product-details-left">'+
                                            '<div class="product-details-images slider-lg-image-1">'+
                                                '<div class="lg-image">'+
                                                    '<a href="product-details-tab-vertical.html" class="img-poppu" style="width:100%"><img src="'+localpath+'/images/'+img+'" alt="product image" style="width:100%"></a>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-lg-6 col-md-6 col-sm-6">'+
                                        '<div class="product-details-view-content">'+
                                            '<h3 class="title">'+data.TenSP+'</h3>'+
                                            '<p class="product-details-view-desc">'+data.MoTa+'</p>'+
                                            '<div class="price-box">';
                                     if(data.GiamGia > 0)  html +='<span class="new-price">'+(data.Gia-(data.Gia*data.GiamGia)/100)+' VND</span>-'+
                                                                    '<span class="old-price">'+data.Gia+' VND</span>';
                                     else if(data.GiamGia ==0 )  html += '<span class="new-price">'+data.Gia+' VND</span>';
                                            html +='</div>'+
                                            '<div class="product-vareant">'+
                                                '<div class="pa_size">'+
                                                    '<label class="pa_size_label">Đơn vị tính</label>'+
                                                    '<span class="packet-swatch-vareant active swatch-1-kg" data-value="1-kg">'+data.TenDVT+'</span>'+
                                                '</div>'+
                                                '<div class="packet-swatch-vareant-price"></div>'+
                                                '<div class="stock in-stock">Còn hàng</div>'+
                                            '</div>'+
                                            '<div class="single-add-to-cart">'+
                                                '<a hrer="" class="add-to-cart btn btn--primary md:px-5" onclick="addCart(\''+data.MaSP+'\')">Thêm vào giỏ</a>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                $('.modal-body').html(html)
                },
                error: function(err){
                    console.log(err);
                      alert('Lỗi không lấy được dữ liệu!');
                }
            });
        }
        $(':input[name = qg]').change(function(){
            var MaXX = $(this).val();
            minPrice = $('#min-price').val()? $('#min-price').val() :0;
            maxPrice = $('#max-price').val()? $('#max-price').val() :500000;
            MaDM = $('#category').val();
            $.ajax({
                url: '/clients/product-national/'+MaDM+'-'+MaXX+'-'+minPrice+'-'+maxPrice,
                method: "GET",
                data:{
                    _token:'{{ csrf_token() }}'},
                dataType: "json",
                contentType: "json",
                success: function(data){
                    var len = data.length;
                    var html = '';
                    for(var i = 0 ; i<len;i++){
                        if(data[i].SoLuong > 0){
                        html +='<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">'+
                                        '<div class="single-product-item">'+
                                            '<div class="single-product-item-image">'+
                                                '<a href="http://127.0.0.1:8000/clients/detail-product/'+data[i].MaSP+'" class="prodcut-images">'+
                                                    '<img class="primary-image" src="http://127.0.0.1:8000/images/'+data[i].Anh+'" alt="">'+                                          
                                                '</a>'+
                                                '<ul class="single-product-item-action">'+                                           
                                                    '<li class="single-product-item-action-list">'+
                                                        '<a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link" onclick="show(\''+data[i].MaSP+'\')"><i class="icon-rt-eye2"></i></a>'+
                                                    '</li>'+
                                                    '<li class="single-product-item-action-list product-cart">'+
                                                        '<a href="product-details.html" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a>'+
                                                    '</li>'+
                                                '</ul>'+
                                            '</div>'+
                                            '<div class="single-product-item-content mt-4">'+                                     
                                                '<h6 class="single-product-item-title"><a href="product-details.html">'+data[i].TenSP+'</a></h6>'+
                                                '<div class="single-product-item-price">';
                                                if(data[i].GiamGia > 0)
                                                html += '<p class="price">'+(data[i].Gia -(data[i].Gia*data[i].GiamGia)/100)+' VND</p>'+
                                                    '<p class="price-sale ms-3">'+data[i].Gia+' VND</p>';
                                                else
                                                html += '<p class="price">'+data[i].Gia+' VND</p>';
                                                html +='</div>'+
                                                '<div class="product-list-style">'+
                                                    '<p class="product-list-description">'+data[i].MoTa+'</p>'+
                                                    '<div class="product-list-action-cart">'+
                                                        '<a href="product-details.html"><span class="text">Add to cart</span></a>'+
                                                    '</div>'+
                                                '</div>';
                                                if(data[i].GiamGia >0)
                                                        html +='<div class="percent-sale">'+data[i].GiamGia+'%</div>';
                                           html += '</div>'+
                                            
                                        '</div>'+                          
                                '</div>'; 
                        }
                    }
                    $('#product-content').html(html)
                     if(len<=8) $('.page-pagination').html('');
                },
                error: function(err){
                    console.log(err);
                }
            });
        })
        $( "#price-slider" ).slider({
            range: true,
            min: 0,
            max: 500000,
            values: [ $('#min-price').val()?$('#min-price').val():0,$('#max-price').val()?$('#max-price').val():500000],
            slide: function( event, ui ) {
                $( "#min-price" ).val('' + ui.values[ 0 ]);
                $( "#max-price" ).val('' + ui.values[ 1 ]);
            }
        });
        $( "#min-price" ).val('' + $( "#price-slider" ).slider( "values", 0 ));   
        $( "#max-price" ).val('' + $( "#price-slider" ).slider( "values", 1 )); 
   </script>
@endsection
