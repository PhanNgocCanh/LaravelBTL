@extends('clients.layouts.master')

@section('content')
    <!-- Breadcrumb Start -->
    @include('clients.pages.login.breadcrumb')
    <!-- Breadcrumb End -->

    <!-- Page Section Content Start -->
    <section class="page-secton-wrapper section-space-ptb">
        <div class="container">
            <div class="row gx-5 mx-auto justify-content-center">
                <div class="col-md-6">
                    <div class="title mb-3">
                        <h2 class="fw-bold">Đăng ký</h2>
                    </div>
                    <div class="content-modal-box  p-5 border">
                        <form action="#" class="account-form-box" method="POST">
                            @csrf
                            <div class="single-input">
                                <label for="reg_username">Tên người dùng *</label>
                                <input type="text" name="username" id="reg_username" value="{{old('username')}}">
                                @error('username')
                                     <p style="color: red;">* {{$message}}</p>           
                                @enderror
                            </div>
                            <div class="single-input">
                                <label for="reg_email">Email *</label>
                                <input type="email" name="email" id="reg_email" value="{{old('email')}}">
                                @error('email')
                                     <p style="color: red;">* {{$message}}</p>           
                                @enderror
                            </div>
                            <div class="single-input">
                                <label for="reg_password">Mật khẩu *</label>
                                <input type="password" name="password" id="reg_password" value="{{old('password')}}">
                                @error('password')
                                     <p style="color: red;">* {{$message}}</p>           
                                @enderror
                            </div>
                            <div class="single-input">
                                <label for="reg_password_re">Xác nhận mật khẩu *</label>
                                <input type="password" name="password_re" id="reg_password_re">
                                @if(Session::has('msg'))
                                     <p style="color: red;">* {{Session::get('msg')}}</p>           
                                @endif
                            </div>
                            <div class="button-box mt-4">
                                <button class="btn btn--primary" type="submit">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Section Content End -->
@endsection