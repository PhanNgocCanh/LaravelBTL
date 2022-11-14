<section class="product-item-section section-space-pb pt-4">
    <div class="container">
        <div class="row">
            <div class="col-12 position-relative">
                <div class="section-title-wrap">
                    <h2 class="section-title">
                        Sản phẩm liên quan
                    </h2>
                </div>
            </div>
        </div>
        <div class="product-slider-active product-border-box">
            @foreach($dataProduct as $key => $item)
                @if($item->MaDM == $MaDM && $item->MaSP != $Product)
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
                                    <a href="#" class="single-product-item-action-link"><i class="icon-rt-basket-outline"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="single-product-item-content">                                   
                            <h6 class="single-product-item-title mt-3"><a href="product-details-tab-vertical.html">{{$item->TenSP}}</a></h6>
                            <div class="single-product-item-price d-flex">
                                @if($item->GiamGia > 0)
                                    <p class="price">{{$item->Gia-($item->Gia*$item->GiamGia)/100}} VND</p>
                                    <p class="price-sale ms-3">{{$item->Gia}} VND</p>
                                @else
                                    <p class="price">{{$item->Gia}} VND</p>
                                @endif
                            </div>                                  
                        </div>
                            @if($item->GiamGia >0)
                                <div class="percent-sale">{{$item->GiamGia}}%</div>
                            @endif
                    </div> 
                @endif
            @endforeach
        </div>
    </div>
</section>