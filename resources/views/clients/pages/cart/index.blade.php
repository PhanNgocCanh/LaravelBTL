@extends('clients.layouts.master')
@section('content')
        <!-- Breadcrumb Start -->
        @include('clients.pages.cart.breadcrumb')
        <!-- Breadcrumb End -->

        <!-- Page Section Content Start -->
        <section class="page-secton-wrapper section-space-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="wishlist-tiel">
                            <h2 class="mb-5 fw-bold">Giỏ hàng của bạn</h2>
                            @if(!empty($msg))
                                <h3 class="mb-5 ">{{$msg}}</h3>
                            @endif
                            @if(Session::has('message-noupdate'))
                            <div class="alert alert-warning d-flex align-items-center alert-dismissible" role="alert">
                                <i class="fa-solid fa-circle-exclamation mx-2"></i>
                                <div>
                                    {{Session::get('message-noupdate')}}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                        </div>
                        @if(!empty($dataCart))
                        <form action="#" class="cart-table">
                            <div class="table-content table-responsive">
                                <table class="table border">
                                    <thead>
                                        <tr>
                                            <th class="plantmore-product-remove">Xoá</th>
                                            <th class="plantmore-product-thumbnail">Ảnh</th>
                                            <th class="cart-product-name">Tên sản phẩm</th>
                                            <th class="plantmore-product-price">Giá</th>
                                            <th class="plantmore-product-quantity">Số lượng</th>                                          
                                            <th class="plantmore-product-subtotal">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($dataCart))
                                            @foreach($dataCart as $key => $item)                                       
                                                <tr>
                                                    <td class="plantmore-product-remove"><a href="{{route('clients.delete-item-cart',['MaSP' => $item['MaSP']])}}"><i class="icon-rt-close-outline"></i></a></td>
                                                    <td class="plantmore-product-thumbnail" style="width:120px;"><a href="#"><img src="{{asset('/images/'.$item['Anh'])}}" alt=""></a></td>
                                                    <td class="plantmore-product-name"><a href="#">{{$item['TenSP']}}</a></td>
                                                    <td class="plantmore-product-price"><span class="amount">{{$item['Gia']}}</span></td>
                                                    <td class="plantmore-product-quantity">
                                                        <form action="#" class="cart-quantity d-flex justify-content-center">
                                                            <div class="quantity">
                                                                <div class="cart-plus-minus justify-content-center">
                                                                    <a class="dec qtybutton" href="{{route('clients.update-cart',['MaSP' => $item['MaSP'],'type' => -1])}}"><p>-</p></a>
                                                                    <input class="cart-plus-minus-box" value="{{$item['SoLuong']}}" type="text">
                                                                    <a class="inc qtybutton" href="{{route('clients.update-cart',['MaSP' => $item['MaSP'],'type' => 1])}}"><p>+</p></a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>                                                   
                                                    <td class="product-subtotal"><span class="amount">{{$item['ThanhTien']}}</span></td>
                                                </tr>
                                            @endforeach
                                        @endif                                    
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="coupon-all mt-4">

                                        <div class="coupon2">
                                            <a href="{{route('home')}}" class="btn btn--primary continue-btn ms-2">Tiếp tục mua hàng</a>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 ml-auto">
                                    <div class="cart-page-total mt-4">
                                        <ul>
                                            <li>Tổng tiền: <span>{{!empty($Total) ? $Total : ''}} VND</span></li>
                                        </ul>
                                        <div class="button-box mt-3 text-end">
                                        @if(Session::has('message-login'))
                                        <div class="alert alert-warning d-flex align-items-center alert-dismissible" role="alert">
                                            <i class="fa-solid fa-circle-exclamation mx-2"></i>
                                            <h4 class="" style="color:red;font-size:12px;">{{Session::get('message-login')}} !</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <a href="{{route('clients.login')}}" class="proceed-checkout-btn btn btn--primary w-full">Đăng nhập ngay</a>
                                        @endif
                                            <a href="{{route('clients.checkout')}}" class="proceed-checkout-btn btn btn--primary w-full">Tiến hành thanh toán</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Section Content End -->
@endsection