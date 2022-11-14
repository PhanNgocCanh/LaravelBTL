@extends('clients.layouts.master')

@section('content')
<!-- Slider Main Start -->
<section class="hero-slider-one-active">
            <div class="single-hero-slider hero-slider-one">
                <a href="#" class="hero-slider-bg-image">
                    <img src="{{asset('clients/assets/images/hero/slider1_mixy1.webp')}}" alt="">
                </a>
                <div class="container">
                    <div class="single-hero-slider-inner">
                        <h5 class="sub-title">100% Thực phẩm hữu cơ</h5>
                        <h1 class="title">Thực phẩm hữu cơ tươi ngon</h1>
                        <h3 class="hero-price">
                            Giá chỉ <b> 18.000VND</b>
                        </h3>
                        <a class="slideshow-button" href="#">Mua ngay <i class="icon-rt-arrow-right-solid"></i></a>
                    </div>
                </div>
            </div>
            <div class="single-hero-slider hero-slider-one">
                <a href="#" class="hero-slider-bg-image">
                    <img src="{{asset('clients/assets/images/hero/slider2_mixy1.webp')}}" alt="">
                </a>
                <div class="container">
                    <div class="single-hero-slider-inner">
                        <h5 class="sub-title">100% Thực phẩm hữu cơ</h5>
                        <h1 class="title">Thực phẩm hữu cơ tươi ngon</h1>
                        <h3 class="hero-price">
                            Giá chỉ <b> 18.000VND</b>
                        </h3>
                        <a class="slideshow-button" href="#">Mua ngay <i class="icon-rt-arrow-right-solid"></i></a>
                    </div>
                </div>
            </div>

</section>
        <!-- Slider Main End -->

<!-- Banner Section Start -->
<div class="banner-section section-space-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <a href="shop.html" class="single-banner-area">
                    <div class="single-benner-image">
                        <img src="{{asset('clients/assets/images/banners/img1_banner1_mixy1.webp')}}" alt="">
                    </div>
                    <div class="banner-content">
                        <h2 class="banner-title">Bánh chocopice</h2>
                        <h2 class="banner-title2">Thơm ngon bổ dưỡng</h2>
                        <h2 class="banner-offer">
                            Giảm ngay 20%
                        </h2>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6">
                <a href="shop.html" class="single-banner-area sm-mt-30">
                    <div class="single-benner-image">
                        <img src="{{asset('clients/assets/images/banners/img1_banner1_mixy2.webp')}}" alt="">
                    </div>
                    <div class="banner-content">
                        <h2 class="banner-title">Bánh chocopice</h2>
                        <h2 class="banner-title2">Thơm ngon bổ dưỡng</h2>
                        <h2 class="banner-offer">
                            Giảm ngay 20%
                        </h2>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Banner Section End -->

<section class="product-item-section pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 position-relative">
                        <div class="section-title-wrap">
                            <h2 class="section-title">
                                Sản phẩm đang giảm giá
                            </h2>
                            <p>Các sản phẩm đang giảm giá mua ngay để có được những sản phẩm với giá tốt nhất!</p>
                        </div>
                    </div>
                </div>
                <div class="product-slider-active product-border-box">
                    @if(!empty($dataProductSale))
                        @foreach($dataProductSale as $key => $item)
                            @if($item->SoLuong > 0)
                            <div class="single-product-item">
                                <div class="single-product-item-image">
                                    <a href="{{route('clients.detail-product',['MaSP' => $item->MaSP])}}" class="prodcut-images">
                                        <img class="primary-image" src="{{asset('images/'.$item->Anh)}}" alt="">
                                    </a>
                                    <ul class="single-product-item-action">
                                        <li class="single-product-item-action-list">
                                            <a href="" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link" onclick="show('{{$item->MaSP}}')"><i class="icon-rt-eye2"></i></a>
                                        </li> 
                                        <li class="single-product-item-action-list product-cart">
                                            <a href="" class="single-product-item-action-link" onclick="addCart('{{$item->MaSP}}')"><i class="icon-rt-basket-outline"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="single-product-item-content">    
                                        <div class="single-product-item-rating">
                                                    <i class="icon-rt-star-solid select-star"></i>
                                                    <i class="icon-rt-star-solid select-star"></i>
                                                    <i class="icon-rt-star-solid select-star"></i>
                                                    <i class="icon-rt-star-solid select-star"></i>
                                                    <i class="icon-rt-star-solid"></i>
                                        </div>                               
                                    <h6 class="single-product-item-title mt-3"><a href="product-details-tab-vertical.html">{{$item->TenSP}}</a></h6>
                                    <div class="single-product-item-price d-flex">
                                        <p class="price">{{$item->Gia-($item->Gia*$item->GiamGia)/100}} VND</p>
                                        <p class="price-sale ms-3">{{$item->Gia}} VND</p>
                                    </div>                                  
                                </div>
                                <div class="percent-sale">{{$item->GiamGia}}%</div>
                            </div>  
                            @endif
                        @endforeach
                    @endif                 
                </div>
            </div>
</section>
<section class="product-item-section pb-5">
    <div class="container">
        @if(!empty($dataProductCLient) && !empty($Category))
            @foreach($Category as $keyC => $itemC)
                @if(in_array($itemC->MaDM,$ExitProductInCategory))
                    <div class="row mt-2">
                        <div class="col-12 position-relative">
                            <div class="section-title-wrap">
                                <h2 class="section-title">                              
                                        {{$itemC->TenDM}}                             
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="product-slider-active product-border-box">
                        @foreach($dataProductCLient as $keyP => $itemP)
                            @if($itemP->MaDM == $itemC->MaDM && $itemP->SoLuong > 0)
                                <div class="single-product-item">
                                    <div class="single-product-item-image">
                                        <a href="{{route('clients.detail-product',['MaSP' => $itemP->MaSP])}}" class="prodcut-images">
                                            <img class="primary-image" src="{{asset('images/'.$itemP->Anh)}}" alt="">
                                        </a>
                                        <ul class="single-product-item-action">
                                            <li class="single-product-item-action-list">
                                                <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" class="single-product-item-action-link" onclick="show('{{$itemP->MaSP}}')"><i class="icon-rt-eye2"></i></a>
                                            </li> 
                                            <li class="single-product-item-action-list product-cart">
                                                <a href="" class="single-product-item-action-link" onclick="addCart('{{$itemP->MaSP}}')"><i class="icon-rt-basket-outline"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="single-product-item-content">
                                        <div class="single-product-item-rating">
                                            <i class="icon-rt-star-solid select-star"></i>
                                            <i class="icon-rt-star-solid select-star"></i>
                                            <i class="icon-rt-star-solid select-star"></i>
                                            <i class="icon-rt-star-solid select-star"></i>
                                            <i class="icon-rt-star-solid"></i>
                                        </div>
                                        <h6 class="single-product-item-title"><a href="#">{{$itemP->TenSP}}</a></h6>
                                        <div class="single-product-item-price">
                                            @if($itemP->GiamGia > 0)
                                                <p class="price">{{$itemP->Gia-($itemP->Gia*$itemP->GiamGia)/100}} VND</p>
                                                <p class="price-sale ms-3">{{$itemP->Gia}} VND</p>
                                            @else
                                                <p class="price">{{$itemP->Gia}} VND</p>
                                            @endif
                                        </div>
                                        @if($itemP->GiamGia >0)
                                                <div class="percent-sale">{{$itemP->GiamGia}}%</div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach                 
                    </div>
                @endif
            @endforeach
        @endif
    </div>
</section>

<p class="d-none success-order">{{Session::has('success-order')? Session::get('success-order'): ''}}</p>

@include('clients.partials.modal-product')
@endsection

@section('script')
   <script>
        $(document).ready(function() {
            var text = $('.success-order').text();
            toastr.options.closeButton = true;
            if(text != '') toastr.success(text);
        })
        function show(MaSP){
            $.ajax({
                url: "/admin-area/product-modal/"+MaSP,
                method: "GET",
                data:{
                    _token:'{{ csrf_token() }}'},
                dataType: "json",
                contentType: "json",
                success: function (data) {
                    console.log(data.MaSP);
                    var img = data.Anh;
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
                                                    '<a href="product-details-tab-vertical.html" class="img-poppu" style="width:100%"><img src="images/'+img+'" alt="product image" style="width:100%"></a>'+
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
                                                '<a class="add-to-cart btn btn--primary md:px-5" type="submit" onclick="addCart(\''+data.MaSP+'\')">Thêm vào giỏ</a>'+
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
   </script>
@endsection