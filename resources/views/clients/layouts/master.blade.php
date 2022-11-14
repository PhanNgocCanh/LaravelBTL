<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mixy - Siêu thị của mọi nhà </title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="Indise Template">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('clients/assets/images/favicon.png')}}">

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

    <!-- Fonts CSS -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin> -->
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&amp;family=Engagement&amp;family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('clients/assets/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('clients/assets/css/vendor/roadthemes-icon.css')}}">
    <!-- Plugins Css -->
    <link rel="stylesheet" href="{{asset('clients/assets/css/plugins/slick.css')}}">
    <link rel="stylesheet" href="{{asset('clients/assets/css/plugins/jquery-ui.min.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('clients/assets/css/plugins/magnific-popup.css')}}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('clients/assets/css/style.css')}}">

</head>

<body>

    <header class="header">
        @include('clients.partials.header')

        <!-- mobile -->
        <!-- <div class="mobile-header main-header m-header-1 d-block d-lg-none">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col mobile-header-start">
                        <div class="d-flex gap-2">
                            <div class="menu-mobile">
                                <a href="#moible-menu" class="m-menu-btn mobile-menu-active">
                                    <i class="icon-rt-bars-solid"></i>
                                </a>
                            </div>

                            <div class="m-menu-side" id="moible-menu">

                                <div class="mobile-menu-inner">
                                    <a href="#" class="side-close-icon"><i class="icon-rt-close-outline"></i></a>
                                    <ul class="mobile-lan-curr-nav align-items-center">
                                        <li class="language">English <i class="icon-rt-arrow-down"></i>
                                            <ul class="dropdown-list">
                                                <li><a href="#">English</a></li>
                                                <li><a href="#">French</a></li>
                                            </ul>
                                        </li>
                                        <li class="curreny-wrap">Currency <i class="icon-rt-arrow-down"></i>
                                            <ul class="dropdown-list curreny-list">
                                                <li><a href="#">$ USD</a></li>
                                                <li><a href="#"> € EURO</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="mobile-top-text-message">
                                        <p class="text-message">Free shipping on orders over $25. Read more.</p>
                                        <p class="text-message"> <i class="icon-rt-call-outline"></i> Need help? Call Us: <a href="tel:888554168">+8 88 55 4168</a></p>
                                    </div>
                                    <div class="mobile-tab-wrap">
                                        <div class="mobile-tab-menu">
                                            <ul class="nav" role="tablist">
                                                <li class="tab__item nav-item">
                                                    <a class="active" data-bs-toggle="tab" href="#menu_tab" role="tab">Menu</a>
                                                </li>
                                                <li class="tab__item nav-item">
                                                    <a data-bs-toggle="tab" href="#categories_tab" role="tab">Danh mục sản phẩm</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="menu_tab" role="tabpanel">
                                                <nav class="offcanvas-navigation">
                                                    <ul>
                                                        <li class="has-children">
                                                            <a href="index.html">Trang chủ</a>
                                                        </li>
                                                        <li class="has-children">
                                                            <a href="#">Sản phẩm</a>
                                                            <ul class="sub-menu">
                                                                <li class="has-children">
                                                                    <a href="#">LAYOUT</a>
                                                                    <ul class="sub-menu">
                                                                        <li><a href="shop.html">Shop Left Sidebar</a></li>
                                                                        <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                                                        <li><a href="shop-no-sidebar.html">Shop No Sidebar</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="has-children">
                                                                    <a href="#">FEATURES NEW</a>
                                                                    <ul class="sub-menu">
                                                                        <li><a class="position-relative d-block" href="shop-category-description-top.html">Category Description <span class="menu-label">On Top</span></a></li>
                                                                        <li><a class="position-relative d-block" href="shop-category-description-bottom.html">Category Description <span class="menu-label">On Bottom</span></a></li>
                                                                        <li><a href="shop-show-subcategories.html">Show sub categories</a></li>
                                                                        <li><a href="shop-show-loadmore.html">Load More Items</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="has-children">
                                                                    <a href="#">PRODUCT STYLE</a>
                                                                    <ul class="sub-menu">
                                                                        <li><a href="shop-product-1.html">Style 01</a></li>
                                                                        <li><a href="shop-product-2.html">Style 02</a></li>
                                                                        <li><a href="shop-product-3.html">Style 03</a></li>
                                                                        <li><a href="shop-product-4.html">Style 04</a></li>
                                                                        <li><a href="shop-product-5.html">Style 05</a></li>
                                                                        <li><a href="shop-product-6.html">Style 06</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="has-children">
                                                            <a href="#">Product</a>
                                                            <ul class="sub-menu">
                                                                <li class="has-children">
                                                                    <a href="#">PRODUCT GALLERY</a>
                                                                    <ul class="sub-menu">
                                                                        <li><a href="product-details.html">Simple product</a></li>
                                                                        <li><a href="product-details-image-top.html">Image Top</a></li>
                                                                        <li><a href="product-details-fluid.html">Full width</a></li>
                                                                        <li><a href="product-details-image-grid-1-column.html">Grid - 1 column</a></li>
                                                                        <li><a href="product-details-image-grid-2-column.html">Grid - 2 columns</a></li>
                                                                        <li><a href="product-details-vertical-thumbnails.html">Vertical Thumbnails</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="has-children">
                                                                    <a href="#">PRODUCT DETAILS</a>
                                                                    <ul class="sub-menu">
                                                                        <li><a href="product-details-countdown.html">Product details countdown</a></li>
                                                                        <li><a href="product-details-video-button.html">Video Button</a></li>
                                                                        <li><a href="product-details-video-in-gallery.html">Video In Gallery</a></li>
                                                                        <li><a href="product-details-accordion.html">Tab accordion</a></li>
                                                                        <li><a href="product-details-tab-vertical.html">Tab vertical</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="has-children">
                                                            <a href="#">Pages</a>
                                                            <ul class="sub-menu">
                                                                <li class="has-children">
                                                                    <a href="#">OTHER PAGE 1</a>
                                                                    <ul class="sub-menu">
                                                                        <li><a href="my-account.html">My account</a></li>
                                                                        <li><a href="checkout.html">Checkout</a></li>
                                                                        <li><a href="shopping-cart.html">Shopping Cart</a></li>
                                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="has-children">
                                                                    <a href="#">OTHER PAGE 2</a>
                                                                    <ul class="sub-menu">
                                                                        <li><a href="contact-us.html">Contact us</a></li>
                                                                        <li><a href="about-us.html">About us</a></li>
                                                                        <li><a href="error-404.html">404 page</a></li>
                                                                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="has-children">
                                                            <a href="#">Blogs</a>
                                                            <ul class="sub-menu">
                                                                <li class="has-children">
                                                                    <a href="#">BLOG TYPE</a>
                                                                    <ul class="sub-menu">
                                                                        <li><a href="blog.html">Blog grid</a></li>
                                                                        <li><a href="blog-mask.html">Blog mask</a></li>
                                                                        <li><a href="blog-list.html">Blog list</a></li>
                                                                        <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                                                        <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                                                        <li><a href="blog-no-sidebar.html">Blog No Sidebar</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="has-children">
                                                                    <a href="#">SINGLE POST</a>
                                                                    <ul class="sub-menu">
                                                                        <li><a href="blog-details.html">Post example #1</a></li>
                                                                        <li><a href="blog-details-2.html">Post example #2</a></li>
                                                                        <li><a href="blog-details-left-sidebar.html">Left Sidebar</a></li>
                                                                        <li><a href="blog-details.html">Right Sidebar</a></li>
                                                                        <li><a href="blog-details-no-sidebar.html">No Sidebar</a></li>
                                                                        <li><a href="blog-details-right-title.html">Right Title</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>

                                                    </ul>
                                                </nav>
                                            </div>
                                            <div class="tab-pane fade" id="categories_tab" role="tabpanel">
                                                <div class="categories_menu_toggle mobile_categories_menu_toggle">
                                                    <ul>
                                                        <li class="menu_item_children categorie_list"> <a href="#"><img src="{{asset('clients/assets/images/categories-icons/meat.svg')}}" alt="">Meats & Seafood<i class="icon-rt-arrow-right"></i></a>
                                                            <ul class="categories_mega_menu">
                                                                <li><a href="#">Fish</a></li>
                                                                <li><a href="#"> Shellfish</a></li>
                                                                <li><a href="#">Roe</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu_item_children"><a href="#"><img src="assets/images/categories-icons/coffee-cup.svg" alt=""> Beverages <i class="icon-rt-arrow-right"></i></a>
                                                            <ul class="categories_mega_menu">
                                                                <li><a href="#">Compound Butter</a></li>
                                                                <li><a href="#">Cultured Butter</a></li>
                                                                <li><a href="#">Whipped Butter</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu_item_children"><a href="#"><img src="assets/images/categories-icons/bread.svg" alt=""> Bread & Bakery <i class="icon-rt-arrow-right"></i></a>
                                                            <ul class="categories_mega_menu">
                                                                <li><a href="#">Mango</a></li>
                                                                <li><a href="#">Plumsor</a></li>
                                                                <li><a href="#">Raisins</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu_item_children"><a href="#"><img src="assets/images/categories-icons/snowflake.svg" alt=""> Frozen Foods<i class="icon-rt-arrow-right"></i></a>
                                                            <ul class="categories_mega_menu">
                                                                <li><a href="#">Mango</a></li>
                                                                <li><a href="#">Plumsor</a></li>
                                                                <li><a href="#">Raisins</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu_item_children"><a href="#"><img src="assets/images/categories-icons/cauliflower.svg" alt=""> Fresh Vegetables <i class="icon-rt-arrow-right"></i></a>
                                                            <ul class="categories_mega_menu">
                                                                <li><a href="#">Mango</a></li>
                                                                <li><a href="#">Plumsor</a></li>
                                                                <li><a href="#">Raisins</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="menu_item_children"><a href="#"><img src="assets/images/categories-icons/almond.svg" alt=""> Dry Fruits <i class="icon-rt-arrow-right"></i></a>
                                                            <ul class="categories_mega_menu">
                                                                <li><a href="#">Mango</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#"><img src="assets/images/categories-icons/egg.svg" alt="">Eggs & Dairy</a></li>
                                                        <li><a href="#">Snacks</a></li>
                                                        <li><a href="#">Pantry</a></li>
                                                        <li class="hide-child"><a href="shop.html">Fruits</a></li>
                                                        <li class="categories-more-less ">
                                                            <a class="more-default"><span class="c-more"></span>+ More Categories</a>
                                                            <a class="less-show"><span class="c-more"></span>- Less Categories</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="header-block search-block-mobile search-sidebar">
                                <button class="mobile-search-popup"><i class="icon-rt-loupe"></i></button>
                            </div>
                            <div class="popup-search-wrapper">
                                <a href="#" class="search-close-button"><i class="icon-rt-close-outline"></i></a>
                                <div class="search-box">
                                    <form action="#" class="search-form searchbox">
                                        <div class="input-wrapper">
                                            <input type="text" class="ajax_search search-field mixy_ajax_search" placeholder="Search...">
                                            <button class="search-submit" type="submit">
                                                <i class="icon-rt-loupe"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <div class="search_content">
                                        <div class="search-keywords-list">
                                            <p>Popular searches :</p>
                                            <ul class="header-search-popular">
                                                <li><a href="#">fruits</a></li>
                                                <li><a href="#">fresh</a></li>
                                                <li><a href="#">organic</a></li>
                                                <li><a href="#">tomato</a></li>
                                                <li><a href="#">meat</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mobile-header-mobile">
                        <div class="logo text-center">
                            <a href="index-2.html"><img src="assets/images/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col mobile-header-right">
                        <div class="header-middle-right-area">
                            <div class="my-account">
                                <a href="#" class="header-action-item" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon-rt-user"></i></a>
                            </div>
                            <div class="cart">
                                <a href="#miniCart" class="header-action-item toolbar-btn">
                                    <i class="icon-rt-basket-outline"></i>
                                    <span class="wishlist-count">3</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    </header>

    <main>
        <!-- Product Item Section Start -->
        @yield('content')
        <!-- Product Item Section End -->
        <!-- Newsletter Start -->
        <section class="newsletter-section bg-secondary">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6 order-md-1 order-lg-1">
                        <div class="newsletter-title-wrap">
                            <div class="newsletter-icons">
                                <i class="iconrt- icon-rt-mail-open-outline"></i>
                            </div>
                            <div class="newsletter-content">
                                <h2>Theo dõi chúng tôi</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6  mt-4 mt-md-0 order-md-2 order-lg-3">
                        <div class="newsletter-whatsapp-wrap">
                            <div class="newsletter-whatsapp-inner">
                                <div class="whatsapp-icons">
                                    <i class="iconrt- icon-rt-logo-whatsapp"></i>
                                </div>
                                <div class="whatsapp-content">
                                    <p>Hỗ trợ 24/7</p>
                                    <h2>0912345678</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 mt-4 mt-lg-0 order-md-3 order-lg-2">
                        <form action="#" class="newsletter-form">
                            <input type="email" placeholder="Địa chỉ Email..." required>
                            <button class="btn btn--primary submit-button fw-semibold" type="submit">Theo dõi!</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Newsletter End -->

        <!-- Our Feature Section Start -->
        <section class="our-feature-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-feature-item">
                            <div class="feature-icon feature-icon-1">
                                <i class="icon-rt-shipping-fast-solid"></i>
                            </div>
                            <div class="feature-content">
                                <h6 class="title">Giao Hàng nhanh chóng</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-feature-item">
                            <div class="feature-icon feature-icon-2">
                                <i class="icon-rt-money-bill-wave-solid"></i>
                            </div>
                            <div class="feature-content">
                                <h6 class="title">Giá siêu rẻ</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-feature-item">
                            <div class="feature-icon feature-icon-3">
                                <i class="icon-rt-gift-solid"></i>
                            </div>
                            <div class="feature-content">
                                <h6 class="title">Khuyến mại cực khủng</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-feature-item">
                            <div class="feature-icon feature-icon-4">
                                <i class="icon-rt-help-buoy-outline"></i>
                            </div>
                            <div class="feature-content">
                                <h6 class="title">Hỗ trợ 24/7</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Our Feature Section End -->

    </main>


    <footer class="footer-section border-top">
        @include('clients.partials.footer')
    </footer>

    <!-- Quick View Modal Start -->
    <!-- Login & Register Modal Start -->
    <div class="header-login-register-wrapper modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-logo">
                    <a href="#">
                        <img src="{{asset('clients/assets/images/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="modal-box-wrapper">
                    <div class="modal-tabs">
                        <ul class="nav" role="tablist">
                            <li class="tab__item nav-item active">
                                <a class="nav-link active" data-bs-toggle="tab" href="#tab_list_06" role="tab">Đăng nhập</a>
                            </li>
                            <li class="tab__item nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab_list_07" role="tab">Đăng ký</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content content-modal-box">
                        <div class="tab-pane fade show active" id="tab_list_06" role="tabpanel">
                            <form action="#" class="account-form-box">
                                <div class="single-input">
                                    <label for="username">Địa chỉ email *</label>
                                    <input type="text" id="username" name="username">
                                </div>
                                <div class="single-input">
                                    <label for="password">Mật khẩu *</label>
                                    <input type="password" id="password" name="password">
                                </div>
                                <div class="checkbox-wrap mt-10">
                                    <label class="label-for-checkbox inline mt-15">
                                        <input class="input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember me</span>
                                    </label>
                                    <a href="#" class=" mt-10">Quên mật khẩu?</a>
                                </div>
                                <div class="button-box mt-25">
                                    <a href="#" class="btn btn--full btn--primary">Đăng nhập</a>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="tab_list_07" role="tabpanel">

                            <form action="#" class="account-form-box">
                                <div class="single-input">
                                    <label for="reg_username">Email *</label>
                                    <input type="text" name="username" id="reg_username">
                                </div>
                                <div class="single-input">
                                    <label for="reg_email">Tên người dùng *</label>
                                    <input type="text" name="email address" id="reg_email">
                                </div>
                                <div class="single-input">
                                    <label for="reg_password">Mật khẩu *</label>
                                    <input type="password" name="username" id="reg_password">
                                </div>
                                <div class="button-box mt-25">
                                    <a href="#" class="btn btn--full btn--primary">Đăng ký</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JS Vendor, Plugins & Activation Script Files -->
    <!-- Vendors JS -->
    <script src="{{asset('clients/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('clients/assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('clients/assets/js/vendor/bootstrap.min.js')}}"></script>
    <!-- Plugins JS -->
    <script src="{{asset('clients/assets/js/plugins/slick.min.js')}}"></script>
    <script src="{{asset('clients/assets/js/plugins/jquery-ui.min.js')}}"></script>
    <!-- <script src="{{asset('clients/assets/js/plugins/jquery.zoom.min.js')}}"></script> -->
    <script src="{{asset('clients/assets/js/plugins/scrollup.js')}}"></script>
    <!-- <script src="{{asset('clients/assets/js/plugins/ajax.mail.js')}}"></script> -->
    <script src="https:////cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Activation JS -->
    <script src="{{asset('clients/assets/js/active.js')}}"></script>
    @yield('script')
    <script>
        $(document).ready(function(){
            $('#num-cart').text("{{!empty(Session::has('cart'))? count(Session::get('cart')) : 0}}");
        })
        function addCart(MaSP){
            $.ajax({
                url: '/clients/cart/'+MaSP,
                method:'GET',
                data:{
                    _token:'{{ csrf_token() }}'},
            }).done(function(res){
                $('#num-cart').text("{{!empty(Session::has('cart'))? count(Session::get('cart')) : 0}}");
            });
        }
    </script>
</body>
</html>