@extends('clients.layouts.master')

@section('content')
    <!-- Breadcrumb Start -->
    @include('clients.pages.checkout.breadcrumb')
    <!-- Breadcrumb End -->

    <!-- Page Section Content Start -->
    <section class="page-secton-wrapper section-space-ptb">
        <div class="container">
            <!-- checkout-details-wrapper start -->
            <div class="checkout-details-wrapper">
                    <form action="" method="POST" class="row">
                    @csrf
                        <div class="col-md-6">
                            <!-- billing-details-wrap start -->
                            <div class="billing-details-wrap">
                                    <h3 class="shoping-checkboxt-title">Thông tin cá nhân</h3>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Tên người nhận <span class="required">*</span></label>
                                                <input type="text" name="name" value="{{old('name')}}">
                                                @error('name')
                                                    <p style="color: red;">* {{$message}}</p>
                                                @enderror
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Số điện thoại<span class="required">*</span></label>
                                                <input type="text" name="sdt" value="{{old('sdt')}}">
                                                @error('sdt')
                                                    <p style="color: red;">* {{$message}}</p>
                                                @enderror
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Địa chỉ nhận hàng<span class="required">*</span></label>
                                                <input type="text" name="address" value="{{old('address')}}">
                                                @error('address')
                                                    <p style="color: red;">* {{$message}}</p>
                                                @enderror
                                            </p>
                                        </div>
                                        <div class="col-lg-4">
                                            <p class="single-form-row">
                                                <label>Ngày nhận hàng <span class="required">*</span></label>
                                                <input type="date" name="date" value="{{old('date')}}">
                                                @error('date')
                                                    <p style="color: red;">* {{$message}}</p>
                                                @enderror
                                            </p>
                                        </div>  
                                        <div class="col-lg-12">
                                            <p class="single-form-row">
                                                <label>Ghi chú<span class=""></span></label>
                                                <input type="text" name="note">
                                            </p>
                                        </div>                                
                                    </div>                               
                            </div>
                            <!-- billing-details-wrap end -->
                        </div>
                        <div class="col-md-6">
                            <!-- your-order-wrapper start -->
                            <div class="your-order-wrapper ms-lg-5">
                                <h3 class="shoping-checkboxt-title">Sản phẩm trong giỏ</h3>
                                <!-- your-order-wrap start-->
                                <div class="your-order-wrap">
                                    <!-- your-order-table start -->
                                    <div class="your-order-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Sản phẩm</th>
                                                    <th class="product-total">Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($cart))
                                                    @foreach($cart as $key => $item)
                                                        <tr class="cart_item">
                                                            <td class="product-name">
                                                                {{$item['TenSP']}} <strong class="product-quantity">[ {{$item['Gia']}} x {{$item['SoLuong']}} ]</strong>
                                                            </td>
                                                            <td class="product-total">
                                                                <span class="amount">{{$item['ThanhTien']}}</span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot>                                                                                            
                                                <tr class="order-total">
                                                    <th>Tổng tiền</th>
                                                    <td><strong><span class="amount">{{!empty($Total) ? $Total :'0'}}</span></strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- your-order-table end -->
    
                                    <!-- your-order-wrap end -->
                                    <div class="payment-method"> 
                                        <div class="row d-flex">
                                            <div class="col-md-8">
                                                <input type="radio" name="payment" id="paythe" value="Tiền mặt">
                                                <label for="paythe">Thanh toán bằng tiền mặt</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="radio" name="payment" id="paytien" value="Thẻ">
                                                <label for="paytien">Thanh toán bằng thẻ</label>
                                            </div>
                                        </div>                           
                                        <div class="order-button-payment ">
                                            <input type="submit" value="Thanh toán" />
                                        </div>
                                    </div>
                                    <!-- your-order-wrapper start -->
    
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
            <!-- checkout-details-wrapper end -->
        </div>
    </section>
    <!-- Page Section Content End -->

@endsection
