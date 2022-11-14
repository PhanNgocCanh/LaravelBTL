<div class="desktop-header header1 d-none d-lg-block">
            <div class="header-middle-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="logo">
                                <a href="{{route('home')}}"><img src="{{asset('clients/assets/images/logo.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="search-box">
                                <form class="search-field" method="GET" action="{{route('clients.search-product',['keywords' => request()->keywords])}}">
                                    <input type="text" class="search-field" name="keywords" placeholder="Tìm kiếm gì đó...">
                                    <button class="search-btn" type="submit"><i class="icon-rt-loupe"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="header-middle-right-area">
                                <div class="my-account">
                                    <a href="{{route('clients.login')}}" class="header-action-item"><i class="icon-rt-user"></i></a>
                                </div>
                                <div class="cart">
                                    <a href="{{route('clients.cart')}}" class="header-action-item">
                                        <i class="icon-rt-basket-outline"></i>                                          
                                            <span class="wishlist-count" id="num-cart">0</span>
                                    </a>
                                </div>
                                @if(Session::has('account'))
                                    <p style="font-size: 14px;">Xin chào {{Session::get('account')['tentk']}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom-area bg-secondary header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="categories-menu-wrap_box">
                                <div class="categories_menu">
                                    <div class="categories_title">
                                        <h5 class="categori_toggle"><i class="icon-rt-bars-solid"></i> Danh mục sản phẩm</h5>
                                    </div>
                                    <div class="categories_menu_toggle">
                                        <ul>
                                            @if(!empty($Category))
                                                @foreach($Category as $key => $item)
                                                   @if($key< 4) 
                                                        <li class="menu_item_children categorie_list"><a href="{{route('clients.product-category',['MaDM'=> $item->MaDM])}}">{{$item->TenDM}}</a></li>
                                                   @else
                                                        <li class="hide-child"><a href="{{route('clients.product-category',['MaDM'=> $item->MaDM])}}">{{$item->TenDM}}</a></li>
                                                   @endif                                
                                                @endforeach
                                            @endif
                                            <li class="categories-more-less ">
                                                <a class="more-default"><span class="c-more"></span>+ Thêm</a>
                                                <a class="less-show"><span class="c-more"></span>- Đóng</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="main-menu-area white_text">
                                <!--  Start Mainmenu Nav-->
                                <nav class="main-navigation">
                                    <ul>
                                        <li class="active"><a href="{{route('home')}}">Trang chủ</a>
                                        </li>

                                        <li><a href="#">Sản phẩm </a>
                                        </li>                                      
                                        <li><a href="#">Liên hệ</i></a>
                                        </li>
                                        <li><a href="{{route('clients.my-account')}}">Tài khoản của bạn</a>
                                        </li>
                                        <li><a href="#">Tin tức</a>
                                        </li>
                                        
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>