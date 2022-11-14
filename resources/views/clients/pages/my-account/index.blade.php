@extends('clients.layouts.master')

@section('content')
    <!-- Breadcrumb Start -->
    @include('clients.pages.my-account.breadcrumb')
    <!-- Breadcrumb End -->

    <!-- Page Section Content Start -->
    <section class="page-secton-wrapper section-space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="account-dashboard">
                        <div class="dashboard-upper-info">
                            <div class="row align-items-center no-gutters">
                                <div class="col-lg-3 col-md-12">
                                    <div class="d-single-info">
                                        <p class="user-name">Xin chào <span>{{Session::has('account') ? Session::get('account')['tentk'] : 'Khách'}}</span></p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-12">
                                    <div class="d-single-info text-lg-center">
                                        <a href="{{route('clients.order-tracking')}}" class="view-cart btn btn--primary">Theo dõi đơn hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-2">
                                <!-- Nav tabs -->
                                <ul role="tablist" class="nav flex-column dashboard-list">
                                    <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Đổi mật khẩu</a></li>
                                    <li><a href="{{route('clients.my-account.log-out')}}" class="nav-link">Đăng xuất</a></li>
                                </ul>
                            </div>
                            <div class="col-md-12 col-lg-10">
                                <!-- Tab panes -->
                                <div class="tab-content dashboard-content">                                     
                                    <div class="tab-pane fade" id="account-details">
                                        <h3>Đổi mật khẩu</h3>
                                        <div class="login">
                                            <div class="login-form-container">
                                                <div class="account-login-form">
                                                    <form action="#">                                                           
                                                        <div class="account-input-box">
                                                            <label>Mật khẩu cũ</label>
                                                            <input type="password" name="old-pass">
                                                            <label>Mật khẩu mới</label>
                                                            <input type="password" name="new-pass">
                                                            <label>Nhập lại mật khẩu</label>
                                                            <input type="password" name="reenter_pass">                                                            
                                                        </div>                                                          
                                                        <div class="button-box">
                                                            <button class="btn default-btn btn btn--primary" type="submit">Lưu lại</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Section Content End -->

@endsection