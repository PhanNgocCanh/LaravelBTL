@extends('clients.layouts.master')
<!-- Breadcrumb Start -->
@section('content')
        
        @include('clients.pages.detail-product.breadcrumb')

        <!-- Page Section Content Start -->
        <section class="product-details-secton section-space-pt">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Product Details Left -->
                        <div class="product-details-left">
                            <div class="product-details-images slider-lg-image-1">
                                <div class="lg-image">
                                    <a href="#" class="img-poppu" style="width:100%"><img src="{{asset('images/'.$dataDetailProduct->Anh)}}" alt="product image" style="width:100%;"></a>
                                </div>
                            </div>
                        </div>
                        <!--// Product Details Left -->
                    </div>
                    <div class="col-md-6">
                        <div class="product-details-view-content">
                            <h3 class="title">{{$dataDetailProduct->TenSP}}</h3>                         
                            <p class="product-details-view-desc">{{$dataDetailProduct->MoTa}}</p>
                            <div class="price-box">
                                @if($dataDetailProduct->GiamGia > 0)
                                    <span class="new-price">{{$dataDetailProduct->Gia-($dataDetailProduct->Gia*$dataDetailProduct->GiamGia)/100}}</span>–
                                    <span class="old-price">{{$dataDetailProduct->Gia}}</span>
                                @else
                                    <span class="new-price">{{$dataDetailProduct->Gia}}</span>
                                @endif
                            </div>
                            <div class="product-vareant">
                                <div class="pa_size">
                                    <label class="pa_size_label">Đơn vị tính</label>
                                    <span class="packet-swatch-vareant active swatch-1-kg" data-value="1-kg">{{$dataDetailProduct->TenDVT}}</span>
                                </div>
                                <div class="packet-swatch-vareant-price"></div>
                                <div class="stock in-stock">Còn hàng</div>
                            </div>

                            <div class="single-add-to-cart">
                                <form action="#" class="cart-quantity d-flex">
                                    <!-- <div class="quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="1" type="text">
                                        </div>
                                    </div> -->
                                    <button class="add-to-cart btn btn--primary md-2" type="submit" onclick="addCart('{{$dataDetailProduct->MaSP}}')">Thêm vào giỏ hàng</button>
                                </form>
                            </div>
                            <div class="share-product-socail-area">
                                <p>Chia sẻ:</p>
                                <ul class="single-product-share">
                                    <li><a href="#"><i class="icon-rt-4-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="icon-rt-logo-pinterest"></i></a></li>
                                    <li><a href="#"><i class="icon-rt-logo-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-description  pt-4">
                    <div class="row">
                        <div class="col-md-4 col-lg-3">
                            <div class="product-details-tab border-bottom-0 mt-md-4">
                                <ul role="tablist" class="nav justify-content-start">
                                    <li class="mb-3" role="presentation">
                                        <a data-bs-toggle="tab" role="tab" href="#additional-information">Thông tin thêm</a>
                                    </li>
                                    <li class="mb-3" role="presentation">
                                        <a data-bs-toggle="tab" role="tab" href="#reviews">Đánh giá</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8 col-ld-9">
                            <div class="product_details_tab_content tab-content">                              
                                <!-- Start Single Content -->
                                <div class="product_tab_content tab-pane" id="additional-information" role="tabpanel">
                                    <div class="product_additional-information mt-30">
                                        <table class="product-attributes_table">
                                            <tbody>
                                                @if(!empty($dataDetailProduct->ThanhPhan))
                                                <tr>
                                                    <th class="product-attributes-item__label">Thành phần</th>
                                                    <td class="product-attributes-item__value">
                                                        <p>{{$dataDetailProduct->ThanhPhan}}</p>
                                                    </td>
                                                </tr>
                                                @endif
                                                @if(!empty($dataDetailProduct->TenQG))
                                                <tr>
                                                    <th class="product-attributes-item__label">Xuất xứ</th>
                                                    <td class="product-attributes-item__value">
                                                        <p>{{$dataDetailProduct->TenQG}}</p>
                                                    </td>
                                                </tr>
                                                @endif
                                                @if(!empty($dataDetailProduct->BaoQuan))
                                                <tr>
                                                    <th class="product-attributes-item__label">Bảo quản</th>
                                                    <td class="product-attributes-item__value">
                                                        <p>Bảo quản nơi khô ráo, thoáng mát</p>
                                                    </td>
                                                </tr>
                                                @endif
                                                @if(!empty($dataDetailProduct->HDSD))
                                                <tr>
                                                    <th class="product-attributes-item__label">Hướng dẫn sử dụng</th>
                                                    <td class="product-attributes-item__value">
                                                        <p>{{$dataDetailProduct->HDSD}}</p>
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- End Single Content -->
                                <!-- Start Single Content -->
                                <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">
                                    <div class="review_address_inner mt-30">
                                        <!-- Start Single Review -->
                                        <div class="pro_review">
                                            <div class="review_thumb">
                                                <img alt="review images" src="{{asset('clients/assets/images/others/reviewer.jpg')}}">
                                            </div>
                                            <div class="review_details">
                                                <div class="review_info mb-10">
                                                    <h5><span class="user-name">mix83</span> - <span class="comment-date"> 09/09/2022</span></h5>

                                                </div>
                                                <p class="reviewer-text">Sản phẩm phẩm tuyệt vời .</p>
                                            </div>
                                        </div>
                                        <!-- End Single Review -->
                                        <!-- Start Single Review -->
                                        <div class="pro_review">
                                            <div class="review_thumb">
                                                <img alt="review images" src="{{asset('clients/assets/images/others/reviewer.jpg')}}">
                                            </div>
                                            <div class="review_details">
                                                <div class="review_info mb-10">
                                                    <h5> <span class="user-name">abc </span> - <span class="comment-date"> 12/10/2022</span></h5>

                                                </div>
                                                <p class="reviewer-text">Chất lượng quá tốt.</p>
                                            </div>
                                        </div>
                                        <!-- End Single Review -->
                                    </div>
                                    <!-- Start RAting Area -->
                                    <div class="rating_wrap mt-50">
                                        <h5 class="rating-title-1">Thêm đánh giá của bạn</h5>                                                     
                                    </div>
                                    <!-- End RAting Area -->
                                    <div class="comments-area comments-reply-area">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form action="#" class="comment-form-area">                                              
                                                    <div class="comment-form-comment mt-3">
                                                        <label>Bình luận ( * Bạn phải đăng nhập và đã từng mua hàng)</label>
                                                        <textarea class="comment-notes" required="required"></textarea>
                                                    </div>
                                                    <div class="comment-form-submit mt-3">
                                                        <input type="submit" value="Gửi đi" class="comment-submit">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Section Content End -->


        <!-- Product Item Section Start -->
        @include('clients.pages.detail-product.other-product',['dataProduct' => $dataProduct,'MaDM' => $dataDetailProduct->MaDM,'Product' => $dataDetailProduct->MaSP])
        <!-- Product Item Section End -->
@endsection