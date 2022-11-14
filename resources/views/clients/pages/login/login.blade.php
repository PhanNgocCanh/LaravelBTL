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
                    <div class="title mb-3 text-center">
                        <h2 class="fw-bold">Đăng nhập</h2>
                    </div>
                    @if(Session::has('error'))
                    <div class="alert alert-danger d-flex align-items-center alert-dismissible" role="alert">
                        <i class="fa-solid fa-circle-exclamation mx-2"></i>
                        <div>
                            {{Session::get('error')}}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class=" content-modal-box p-5 border">
                        <form action="" class="account-form-box" method="POST">
                            @csrf
                            <div class="single-input">
                                <label for="email">Email *</label>
                                <input type="text" id="email" name="email" value="{{old('email')}}">
                                @error('email')
                                     <p style="color: red;">* {{$message}}</p>           
                                @enderror
                            </div>
                            <div class="single-input">
                                <label for="password">Mật khẩu *</label>
                                <input type="password" id="password" name="password">
                                @error('password')
                                     <p style="color: red;">* {{$message}}</p>           
                                @enderror
                            </div>
                            <div class="checkbox-wrap mt-10">
                                <label class="label-for-checkbox inline mt-15">
                                    <input class="input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember me</span>
                                </label>
                                <!-- <a href="#" class="mt-10">Quên mật khẩu?|</a> -->
                                |Chưa có tài khoản?
                                <a href="{{route('clients.register')}}" class="mt-10">Đăng ký</a>
                            </div>
                            <div class="button-box mt-4 d-flex justify-content-center" >
                                <button class="btn btn--primary px-3" type="submit">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Section Content End -->
@endsection