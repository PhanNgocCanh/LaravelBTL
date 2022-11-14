@extends('admin.layouts.master')

@section('content')
     <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sản phẩm</h1>    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 row">
            <h6 class="m-0 font-weight-bold text-primary col-md-4">Danh sách các sản phẩm</h6>
            <div class="d-flex justify-content-center mt-2">
                <form class="col-md-12" method="GET">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <select class="form-select" aria-label="Default select example" name="tinhtrang">
                                    <option value="">--Tình trạng--</option>                              
                                    <option value="1" {{request()->tinhtrang == '1' ? 'selected' : false}}>Còn hàng</option>
                                    <option value="2" {{request()->tinhtrang == '2' ? 'selected' : false}}>Hết hàng</option>                                   
                            </select> 
                        </div>
                        <div class="form-group col-md-3">
                            <select class="form-select" aria-label="Default select example" name="madm">
                                    <option value="">--Danh mục sản phẩm--</option>
                                    @if(!empty($dataDanhMuc))
                                        @foreach($dataDanhMuc as $key => $item)
                                            <option value="{{$item->MaDM}}" {{old('madm') == $item->MaDM || request()->madm == $item->MaDM ? 
                                                'selected' :false}}>{{$item->TenDM}}</option>                                   
                                        @endforeach
                                    @endif                                   
                            </select> 
                        </div>
                        <div class="form-group col-md-2">
                            <select class="form-select" aria-label="Default select example" name="maxx">
                                    <option value="">--Xuất xứ--</option>                               
                                    @if(!empty($dataXuatXu))
                                        @foreach($dataXuatXu as $key => $item)
                                            <option value="{{$item->MaXX}}" {{old('maxx') == $item->MaXX || request()->maxx==$item->MaXX ?
                                                'selected' :false}}>{{$item->TenQG}}</option>                                   
                                        @endforeach
                                    @endif                                   
                            </select> 
                        </div>
                        <div class="col-md-3">
                            <input type="search" class="form-control bg-light border-1 small" placeholder="Tìm kiếm..."
                                aria-label="Search" aria-describedby="basic-addon2" name="keywords" value="{{request()->keywords}}">
                        </div>
                        <div class="col-md-2">
                                <button class="btn btn-primary" type="submit">
                                    Tìm kiếm <i class="fas fa-search fa-sm"></i>
                                </button>
                        </div>
                    </div>
                </form>              
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã số</th>
                            <th>Tên sản phẩm</th>
                            <th style="width:100px;">Ảnh</th>                                           
                            <th style="width:110px">Số lượng</th>
                            <th style="width:130px">Đơn giá(VND)</th>
                            <th style="width:120px">Giảm giá(%)</th>
                            <th style="width:110px">Thông tin</th>
                            <th style="width:110px">Sửa</th>
                            <th style="width:110px">Xoá</th>

                        </tr>
                    </thead>                                   
                    <tbody>
                        @if(!empty($dataSanPham))
                            @foreach($dataSanPham as $key => $item)
                                <tr>
                                    <td>{{$item->MaSP}}</td>
                                    <td>{{$item->TenSP}}</td>
                                    <td><img style="width:60px;" src="{{asset('images/'.$item->Anh)}}" style="box-sizing:border-box;" alt=""> </td>
                                    <td style="text-align:center;">{{$item->SoLuong}}</td>
                                    <td>{{$item->Gia}}</td>
                                    <td style="text-align:center;">{{$item->GiamGia}}</td>
                                    <td style="width:110px"><button onclick="GetMa('{{$item->MaSP}}')" class="btn btn-primary" data-toggle="modal" data-target="#info-product">Xem<i class="fas fa-fw fa-eye pl-2"></i></button></td>
                                    <td style="width:110px"><button class="btn btn-primary"><a href="{{route('product.edit',['id'=>$item->MaSP])}}" class="link-button">Sửa</a><i class="fas fa-fw fa-pen pl-2"></i></button></td>
                                    <td style="width:110px"><button class="btn btn-primary"><a onclick="return confirm('Bạn có chắc chắn muốn xoá không ?')" href="{{route('product.delete',['id'=>$item->MaSP])}}" class="link-button">Xoá</a><i class="fas fa-fw fa-trash pl-2"></i></button></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="d-flex">
                    {{$dataSanPham->withQueryString()->links()}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.pages.product.modal-info')
    {{-- @include('admin.pages.product.modal-delete') --}}
@endsection
@section('script')
    <script>
        function GetMa(MaSP) {
            $.ajax({
                url: "/admin-area/product-modal/"+MaSP,
                method: "GET",
                data:{
                    _token:'{{ csrf_token() }}'},
                dataType: "json",
                contentType: "json",
                success: function (data) {
                console.log(data.TenDM);
                var html ='<p style="font-weight:bold;color:black;">Tên sản phẩm: '+data.TenSP+'</p>';                            
                html += '<p style="font-weight:bold;color:black;"> Danh Mục: ' +(data.TenDM?data.TenDM:'') + '</p>';       
                html += '<p style="font-weight:bold;color:black;"> Đơn vị tính: ' + (data.TenDVT?data.TenDVT:'') + '</p>';
                html += '<p style="font-weight:bold;color:black;"> Xuất xứ: ' + (data.TenQG?data.TenQG:'') + '</p>';
                html += '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">' +
                        '<thead><tr><th>Thành phần</th><th>Hướng dẫn sử dụng</th><th>Bảo quản</th><th>Mô tả</th></tr></thead>' +
                        '<tbody>';                
                        html += '<tr>';
                         html += '<td>' +(data.ThanhPhan?data.ThanhPhan:'') + '</td>';       
                        html += '<td>' + (data.HDSD?data.HDSD:'') + '</td>';
                        html += '<td>' + (data.BaoQuan?data.BaoQuan:'') + '</td>';
                        html += '<td>' + (data.MoTa?data.MoTa:'') + '</td>';
                        html += '</tr>' ;
                html += '</tbody></table>';
                $('.modal-body').html(html)
                },
                error: function(err){
                    console.log(err);
                      alert('Lỗi không lấy được dữ liệu!');
                }
            })
        };
    </script>
@endsection
